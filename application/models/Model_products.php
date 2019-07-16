<?php 
class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM productosnew where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM productosnew ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getInsumoData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM insumos where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM insumos ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	 public function getActiveProductData()
	 {
	 	$sql = "SELECT * FROM productosnew  ORDER BY id DESC";
	 	$query = $this->db->query($sql, array(1));
	 	return $query->result_array();
	 }

	public function getActiveInsumoData()
	{
	    $sql = "SELECT * FROM insumos where cantidad > 0  ORDER BY id DESC"; 
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}


		// get the orders item data
		public function getProductsItemData($producto_id = null)
		{
			if(!$producto_id) {
				return false;
			}
			$sql = "SELECT * FROM producto_insumo WHERE producto_id = ?";
			$query = $this->db->query($sql, array($producto_id));
			return $query->result_array();
		}


/*
	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('productosnew', $data);
			return ($insert == true) ? true : false;
		}
	}
 */
	public function create()
	{    
		$upload_image = $this->upload_image();
		
		// $user_id = $this->session->userdata('id');
		// $bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
				'nombre' => $this->input->post('product_name'),
				'precio_unitario' => $this->input->post('precio'),
                'category_id' => $this->input->post('category_id'),
                'material' => $this->input->post('material'),
				'unidad_medida' => $this->input->post('unidad_medida'),
                'descripcion' => $this->input->post('descripcion')    
				, 'image' => $upload_image  
    	);

		$insert = $this->db->insert('productosnew', $data);   
	
		$order_id = $this->db->insert_id();

		$this->load->model('model_products');

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'producto_id' => $order_id,
    			'insumo_id' => $this->input->post('product')[$x],
    			'cantidad' => $this->input->post('qty')[$x],
    			
    		);
			// $this->db->insert('producto_insumo', $items);

			// now decrease the stock from the insumogetInsumoData
			
			$product_data = $this->model_products->getInsumoData($this->input->post('product')[$x]); // id del insumo
			
    		$qty = (int) $product_data['cantidad'] - (int) $this->input->post('qty')[$x];
			if($qty>=0){ // lo descuenta de insumos
				$update_product = array('cantidad' => $qty);
		
				$this->db->where('id', $this->input->post('product')[$x]);
				$this->db->update('insumos', $update_product);
					// $this->model_products->update($update_product, $this->input->post('product')[$x]); 
			} // no lo descuenta de insumos
			else {
				//ELIMINAR PRODUCTO YA CREADO
				$this->db->where('id', $order_id);
				$delete = $this->db->delete('productosnew');
				return false;
			}

			// SI ESTA BIEN RECIEN AGREGA A LA TABLA PRODUCTO_INSUMO
			$this->db->insert('producto_insumo', $items);
    	
		}
		////
	    

		/////
		
		return ($order_id) ? $order_id : false;
	}


	public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images/product_image';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('product_image'))
        {  // NO SELECCIONO FOTO
            $error = $this->upload->display_errors();
			// return $error;
			
			return 'assets/images/product_image/defecto.jpg';
        }
        else  // si SELECCIONO FOTO
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['product_image']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
	}
	

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('productosnew', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('productosnew');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM productosnew";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}