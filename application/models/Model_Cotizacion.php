<?php 
class Model_cotizacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	/* get the cotizacion data */
	public function getOrdersData($id = null)
	{
		if($id) {
			//$sql = "SELECT * FROM cotizacion WHERE id = ?";
			//$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		//$sql = "SELECT * FROM cotizacion ORDER BY id DESC";
		//$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getOrdersData2($id = null)
	{
		if($id) {
			/*$sql = "SELECT * FROM cotizacion WHERE  id = ? and(  estado_orden='0' or   estado_orden='1') ";
			$query = $this->db->query($sql, array($id));*/
			return $query->row_array();
		}

		/*$sql = "SELECT * FROM cotizacion WHERE estado_orden='0' or   estado_orden='1'  ORDER BY id DESC";
		$query = $this->db->query($sql);*/
		return $query->result_array();
	}

	public function getOrdersData3($id = null)
	{
		if($id) {
			/*$sql = "SELECT * FROM cotizacion WHERE  id = ? and(  estado_orden='3' and   paid_status='2') ";
			$query = $this->db->query($sql, array($id));*/
			return $query->row_array();
		}

		/*$sql = "SELECT * FROM cotizacion WHERE estado_orden='2' and   paid_status='2'  ORDER BY id DESC";
		$query = $this->db->query($sql);*/
		return $query->result_array();
	}

	// get the cotizacion item data
	public function getOrdersItemData($order_id = null)
	{
		if(!$order_id) {
			return false;
		}
		/*$sql = "SELECT * FROM orders_item WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));*/
		return $query->result_array();
	}


	public function create()
	{
		
		$bill_no = 'FISI-PED-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
			'codPedido' => $bill_no,
			'fecha' => strtotime(date('d-m-Y h:i:s a')),
    		'nombre_cli' => $this->input->post('customer_name'),
    		'direccion_cli' => $this->input->post('customer_address'),
			'telefono_cli' => $this->input->post('customer_phone'),
			'ruc_cli' => $this->input->post('RUC'),
    		'estado_pedido' => 0 ,
			'estado_pago' => 0 ,
			'cant_bruta' => $this->input->post('gross_amount_value'),
			'descuento' => $this->input->post('discount'),
			'cant_neta' => $this->input->post('net_amount_value'),
	    		
    	);

		$insert = $this->db->insert('cotizacion', $data);
		$order_id = $this->db->insert_id(); // id del pedido

		$this->load->model('model_products');

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'pedido_id' => $order_id,
    			'producto_id' => $this->input->post('product')[$x],
    			'cantidad' => $this->input->post('qty')[$x],
    			'pu' => $this->input->post('rate_value')[$x],
    			'monto' => $this->input->post('amount_value')[$x],
    		);

    		$this->db->insert('cotizacion_item', $items);

     	}

		return ($order_id) ? $order_id : false;
	}


	public function countOrderItem($order_id)
	{
		if($order_id) {
			/*$sql = "SELECT * FROM orders_item WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));*/
			return $query->num_rows();
		}
	}
	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 
			$data = array(
				'customer_name' => $this->input->post('customer_name'),
	    		'customer_address' => $this->input->post('customer_address'),
	    		'customer_phone' => $this->input->post('customer_phone'),
	    		'gross_amount' => $this->input->post('gross_amount_value'),
	    		'service_charge_rate' => $this->input->post('service_charge_rate'),
	    		'service_charge' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value'):0,
	    		'vat_charge_rate' => $this->input->post('vat_charge_rate'),
	    		'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
	    		'net_amount' => $this->input->post('net_amount_value'),
	    		'discount' => $this->input->post('discount'),
	    		'paid_status' => $this->input->post('paid_status'),
	    		'user_id' => $user_id
	    	);
			$this->db->where('id', $id);
			$update = $this->db->update('cotizacion', $data);
			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getOrdersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}
			// now remove the order item data 
			$this->db->where('order_id', $id);
			$this->db->delete('orders_item');
			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'order_id' => $id,
	    			'product_id' => $this->input->post('product')[$x],
	    			'qty' => $this->input->post('qty')[$x],
	    			'rate' => $this->input->post('rate_value')[$x],
	    			'amount' => $this->input->post('amount_value')[$x],
	    		);
				$this->db->insert('orders_item', $items);
				
	    		// now decrease the stock from the product
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];
	    		$update_product = array('qty' => $qty);
	    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
	    	}
			return true;
		}
	}



	public function updateEs($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 
			$data = array(
				'estado_orden'=>$this->input->post('estado_orden'),
				// 'customer_name' => $this->input->post('customer_name'),
	    		// 'customer_address' => $this->input->post('customer_address'),
	    		// 'customer_phone' => $this->input->post('customer_phone'),
	    		// 'gross_amount' => $this->input->post('gross_amount_value'),
	    		// 'service_charge_rate' => $this->input->post('service_charge_rate'),
	    		// 'service_charge' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value'):0,
	    		// 'vat_charge_rate' => $this->input->post('vat_charge_rate'),
	    		// 'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
	    		// 'net_amount' => $this->input->post('net_amount_value'),
	    		// 'discount' => $this->input->post('discount'),
	    		// 'paid_status' => $this->input->post('paid_status'),
	    		// 'user_id' => $user_id
	    	);
			$this->db->where('id', $id);
			$update = $this->db->update('cotizacion', $data);
			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getOrdersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}
			// now remove the order item data 
			$this->db->where('order_id', $id);
			$this->db->delete('orders_item');
			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'order_id' => $id,
	    			'product_id' => $this->input->post('product')[$x],
	    			'qty' => $this->input->post('qty')[$x],
	    			'rate' => $this->input->post('rate_value')[$x],
	    			'amount' => $this->input->post('amount_value')[$x],
	    		);
	    		$this->db->insert('orders_item', $items);
	    		// now decrease the stock from the product
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];
	    		$update_product = array('qty' => $qty);
	    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
	    	}
			return true;
		}
	}



	public function updateCancelar($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 
			$data = array(
				// 'estado_orden'=>$this->input->post('estado_orden'),
				// 'customer_name' => $this->input->post('customer_name'),
	    		// 'customer_address' => $this->input->post('customer_address'),
	    		// 'customer_phone' => $this->input->post('customer_phone'),
	    		// 'gross_amount' => $this->input->post('gross_amount_value'),
	    		// 'service_charge_rate' => $this->input->post('service_charge_rate'),
	    		// 'service_charge' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value'):0,
	    		// 'vat_charge_rate' => $this->input->post('vat_charge_rate'),
	    		// 'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
	    		// 'net_amount' => $this->input->post('net_amount_value'),
	    		// 'discount' => $this->input->post('discount'),
	    		 'paid_status' => $this->input->post('paid_status'),
	    		// 'user_id' => $user_id
	    	);
			$this->db->where('id', $id);
			$update = $this->db->update('cotizacion', $data);
			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getOrdersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}
			// now remove the order item data 
			$this->db->where('order_id', $id);
			$this->db->delete('orders_item');
			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'order_id' => $id,
	    			'product_id' => $this->input->post('product')[$x],
	    			'qty' => $this->input->post('qty')[$x],
	    			'rate' => $this->input->post('rate_value')[$x],
	    			'amount' => $this->input->post('amount_value')[$x],
	    		);
	    		$this->db->insert('orders_item', $items);
	    		// now decrease the stock from the product
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];
	    		$update_product = array('qty' => $qty);
	    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
	    	}
			return true;
		}
	}

	public function remove($id)
	{
		if($id) {

			$order = $this->model_orders->getOrdersData($id) ;
			
            if($order['estado_orden']==0){
				$this->db->where('id', $id);
				$delete = $this->db->delete('cotizacion');
				$this->db->where('order_id', $id);
				$delete_item = $this->db->delete('orders_item');
				return ($delete == true && $delete_item) ? true : false;

			}else{
				return false;
			}
		

		
		}
	}


	public function countTotalPaidOrders()
	{
		/*$sql = "SELECT * FROM cotizacion WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));*/
		//return $query->num_rows();
		return null;
	}
}