<?php 
class Model_pedidos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->not_logged_in();
		// $this->load->model('model_proveedores');
	}
	/* get the pedidos data */
	public function getPedidosData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM pedidos WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$sql = "SELECT * FROM pedidos ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProveedores($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM proveedores WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$sql = "SELECT * FROM pedidos ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getInsumosProveedoresData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM insumo_proveedor WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$sql = "SELECT * FROM insumo_proveedor ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getOrdersData2($id = null)
	{
		if($id) {
			/*$sql = "SELECT * FROM pedidos WHERE  id = ? and(  estado_orden='0' or   estado_orden='1') ";
			$query = $this->db->query($sql, array($id));*/
			return $query->row_array();
		}

		/*$sql = "SELECT * FROM pedidos WHERE estado_orden='0' or   estado_orden='1'  ORDER BY id DESC";
		$query = $this->db->query($sql);*/
		return $query->result_array();
	}

	public function getOrdersData3($id = null)
	{
		if($id) {
			/*$sql = "SELECT * FROM pedidos WHERE  id = ? and(  estado_orden='3' and   paid_status='2') ";
			$query = $this->db->query($sql, array($id));*/
			return $query->row_array();
		}

		/*$sql = "SELECT * FROM pedidos WHERE estado_orden='2' and   paid_status='2'  ORDER BY id DESC";
		$query = $this->db->query($sql);*/
		return $query->result_array();
	}

	// get the pedidos item data
	public function getOrdersItemData($order_id = null)
	{
		if(!$order_id) {
			return false;
		}
		$sql = "SELECT * FROM pedidos_item WHERE pedido_id = ?";
		$query = $this->db->query($sql, array($order_id));
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

		$insert = $this->db->insert('pedidos', $data);
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

    		$this->db->insert('pedidos_item', $items);

     	}

		return ($order_id) ? $order_id : false;
	}


	public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM pedidos_item WHERE _id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function countCantInsumosxProducto($producto_id)
	{
		if($producto_id) {
			$sql = "SELECT * FROM producto_insumo WHERE producto_id = ?";
			$query = $this->db->query($sql, array($producto_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
		
			// fetch the order data 
			$data = array(
				'nombre_cli' => $this->input->post('customer_name'),
	    		'direccion_cli' => $this->input->post('customer_address'),
	    		'telefono_cli' => $this->input->post('customer_phone'),
	    		'ruc_cli' => $this->input->post('RUC'),
	    		'cant_bruta' => $this->input->post('gross_amount_value'),
	    		'descuento' => $this->input->post('discount'),
				'cant_neta' => $this->input->post('net_amount_value')
			
	    	);
			$this->db->where('id', $id);
			$update = $this->db->update('pedidos', $data);
			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
/*
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
			} */

			// now remove the pedidos item data 
			$this->db->where('pedido_id', $id);
			$this->db->delete('pedidos_item');

			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'pedido_id' => $id,
	    			'producto_id' => $this->input->post('product')[$x],
	    			'cantidad' => $this->input->post('qty')[$x],
	    			'pu' => $this->input->post('rate_value')[$x],
	    			'monto' => $this->input->post('amount_value')[$x],
	    		);
				$this->db->insert('pedidos_item', $items);
				
				// DISMINUIRAN LOS INSUMOS CUADNO EL JP LO ACEPTE 
				/*
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];
	    		$update_product = array('qty' => $qty);
	    		$this->model_products->update($update_product, $this->input->post('product')[$x]); */
	    	}
			return true;
		}
	}

	public function getProveedoresData($id = null) // MESAS DEL RESTAURANTE
	{
		if($id) {
			$sql = "SELECT * FROM proveedores WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		  $sql = "SELECT * FROM proveedores";
		  $query = $this->db->query($sql);
		  return $query->result_array();
	}
	
	public function updateRechazado($id)
	{
		if($id) {
		
			// fetch the order data 
			$data = array(
				'estado_pedido' =>"2" ,

			
	    	);
			$this->db->where('id', $id);
			$update = $this->db->update('pedidos', $data);

			return true;
		}
	}

	public function updateAprobado($id)
	{
		if($id) {
		
			// fetch the order data 
			$data = array(
				'estado_pedido' =>"3" ,
	    	);
			$this->db->where('id', $id);
			$update = $this->db->update('pedidos', $data);

			// *********
			$conexion = mysqli_connect( "localhost","root","");
			$db = mysqli_select_db( $conexion, "disenio2" );
			// $consulta = "SELECT * FROM insumos";

			//  $consulta = "INSERT INTO `cotizacion`(`id_pedido`) VALUES (5)";
			//  $resultado = mysqli_query( $conexion, $consulta );
	   		

			// *******

	// 		// $sql= "CALL cotizarProveedor($pedido['id'] ,$proveedor['id'] )";
		

					// $this->load->model('model_proveedores');
					$data = $this->getProveedoresData();
			        $pedido= $this->getPedidosData($id);
			
				foreach ($data as $key => $value) {
					
					// $consulta = "INSERT INTO `cotizacion`(`id_pedido`, `id_proveedor`, `fecha_cotizacion`,) 
					$consulta = "INSERT INTO `cotizacion`(`id_pedido`,`id_proveedor`) 
									 VALUES (" .$pedido['id']. ","   .$value['id'].    " ) ";

											//    VALUES (" .$value['id']." ) ";
											   
					$resultado = mysqli_query( $conexion, $consulta );

				
				} 

			

/*
 		// saber los productos por cada pedido y la cantidad
		$prod_ped = $this->model_pedidos->getOrdersItemData($id);
		$cont = count($prod_ped);
		
		for($x = 0; $x < $cont; $x++) {

			$producto= countCantInsumosxProducto($prod_ped['producto_id']);
			$contInsumos = count($producto);
			for($x = 0; $x < $contInsumos; $x++) { 
				
				$items = array(
					'id_pedido' => $prod_ped['id'],
					'producto_id' => $prod_ped['producto_id'],
					'cantidad_prod' => $prod_ped['cantidad'],
					'insumo_id' => $producto['insumo_id'],
					'cantidad_insumo' => $producto['cantidad'],
					

					// 'cantidad' => $this->input->post('qty')[$x],
					);

			}
		
		} */

// saber los insumos por cada producto


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
			$update = $this->db->update('pedidos', $data);
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

			$order = $this->model_pedidos->getPedidosData($id) ;
			
            if($order['estado_pedido']==0){
				$this->db->where('id', $id);
				$delete = $this->db->delete('pedidos');

				$this->db->where('pedido_id', $id);
				$delete_item = $this->db->delete('pedidos_item');
				return ($delete == true && $delete_item) ? true : false;

			}else{
				return false;
			}
		

		
		}
	}


	public function countTotalPaidOrders()
	{
		/*$sql = "SELECT * FROM pedidos WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));*/
		//return $query->num_rows();
		return null;
	}
}