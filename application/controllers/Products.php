<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Products';

		$this->load->model('model_products');
		// $this->load->model('model_brands');
		$this->load->model('model_category');
        $this->load->model('model_users');
		// $this->load->model('model_stores');
		// $this->load->model('model_attributes');
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index()
	{
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->render_template('products/index', $this->data);	
	}


    public function fetchProductData()
	{
		$result = array('data' => array());

		$data = $this->model_products->getProductData();

		foreach ($data as $key => $value) {

            // $store_data = $this->model_stores->getStoresData($value['store_id']);
			// button
            $buttons = '';
            if(in_array('updateProduct', $this->permission)) {
    			 $buttons .= '<a href="'.base_url('products/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            if(in_array('deleteProduct', $this->permission)) { 
    			 $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }
            
           
            // $img = '' ; 
               $img = '<img src="'.base_url($value['image']).'" alt="'.$value['nombre'].'" class="img-circle" width="50" height="50" />';

            //    $idCategoria= intval($value['category_id']);
            //    $idCategoria= intval("6");

            // $idCategoria= array_values($value['category_id'])[0];
            //    $categoria = $this->model_category->getCategoryData($value['category_id']) ;
            // $categoria = $this->model_category->getCategoryData($idCategoria) ;
            if($value['material']==1) {
                $material = '<span class="label label-default" style= "font-size: 15px;">Material de Laton</span>';
            }
            else{
                if ($value['material'] == 2){
                    $material = '<span class="label label-info " style= "font-size: 15px;">Material de Acero</span>';
				}else if ($value['material'] == 3){
                    $material = '<span class="label label-warning " style= "font-size: 15px;">Material de Cobre</span>';
				}	
            }

           $categoria = $this->model_category->getCategoryData($value['category_id']) ;

           if($value['unidad_medida']==1) {
            $medida = '<p class="" style= "font-size: 15px;">Medidas en Kilogramo (Kg)</p>';
        }
        else{
            if ($value['unidad_medida'] == 2){
                $medida = '<p class=" " style= "font-size: 15px;">Medidas en Litro (L)</p>';
            }else {
                if ($value['unidad_medida'] == 0){
                    $medida = '<p class=" " style= "font-size: 15px;">Unidad (u)</p>';
                }

            }
        }


			$result['data'][$key] = array(
                 $value['id'],
				$img,
                $value['nombre'],
                $value['precio_unitario'],
                $categoria['nombre'],
                
                $material,
                $medida,
 
				$buttons
			);
		} // /foreach

		echo json_encode($result);
    }	
    
	public function create()
	{
		if(!in_array('createProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
        $this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
        
        $this->form_validation->set_rules('material', 'material', 'trim|required');
        $this->form_validation->set_rules('unidad_medida', 'unidad_medida', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {
          // true case
            $order_id = $this->model_products->create();  

            if($order_id) {
				
                redirect('products', 'refresh');
                $this->session->set_flashdata('success', 'Creado Satisfactoriamente');
        	}
        	else {
        	
                redirect('products/', 'refresh');
                $this->session->set_flashdata('error', 'Ocurrio Error!!!');
            }
       
        }
        else {
            // false case
            $this->data['products'] = $this->model_products->getActiveInsumoData();   
            
            $category = $this->model_category->getCategory();
            $this->data['category'] = $this->model_category->getCategory();
            $this->render_template('products/create', $this->data);
        }	
	}


    public function getTableProductRow()
	{
		$products = $this->model_products->getActiveInsumoData();
		echo json_encode($products);
    }

    
    
    public function getProductValueById()
	{   $product_id = $this->input->post('insumo_id');
		
		if($product_id) {
			$product_data = $this->model_products->getInsumoData($product_id);
			echo json_encode($product_data);
		}
    }


      public function getInsumoValueById()
    {   $product_id = $this->input->post('insumo_id');
        // $product_id = $this->input->post('product_id');
		
		if($product_id) {
			$product_data = $this->model_products->getInsumoData($product_id);
			echo json_encode($product_data);
		}
	}
    
    /*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
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
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['product_image']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }

    /*
    * If the validation is not valid, then it redirects to the edit product page 
    * If the validation is successfully then it updates the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
	public function update($product_id)
	{      
        // if(!in_array('updateProduct', $this->permission)) {
        //     redirect('dashboard', 'refresh');
        // }

        if(!$product_id) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
        $this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
       
        $this->form_validation->set_rules('material', 'material', 'trim|required');
        $this->form_validation->set_rules('unidad_medida', 'unidad_medida', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            // true case
            
            $data = array(
                'nombre' => $this->input->post('product_name'),
                'category_id' => $this->input->post('category'),
                'material' => $this->input->post('material'),
                'unidad_medida' => $this->input->post('unidad_medida'),
                'descripcion' => $this->input->post('descripcion'),
                'precio_unitario' => $this->input->post('precio'),
            );

            
            if($_FILES['product_image']['size'] > 0) {
                $upload_image = $this->upload_image();
                $upload_image = array('image' => $upload_image);
                
                $this->model_products->update($upload_image, $product_id);
            }

            $update = $this->model_products->update($data, $product_id);
            if($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('products/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('products/update/'.$product_id, 'refresh');
            }
        }
        else {

       
            $this->data['category'] = $this->model_category->getCategoryData();         
            $product_data = $this->model_products->getProductData($product_id);
            $this->data['product_data'] = $product_data;
            //
            $result = array();
           
        	$orders_data = $this->model_products->getProductData($product_id);
    		$result['order'] = $orders_data;
    		$orders_item = $this->model_products->getProductsItemData($orders_data['id']);
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}
    		$this->data['order_data'] = $result;



            //

            $this->data['products'] = $this->model_products->getActiveInsumoData();   
            $this->render_template('products/edit', $this->data); 
        }   
	}

    /*
    * It removes the data from the database
    * and it returns the response into the json format
    */
	public function remove()
	{
        if(!in_array('deleteProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
        $product_id = $this->input->post('product_id');

        $response = array();
        if($product_id) {
            $delete = $this->model_products->remove($product_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Eliminado con exito"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
	}

}