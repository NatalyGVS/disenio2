<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Orders';
		$this->load->model('model_mesas');
		$this->load->model('model_orders');
		$this->load->model('model_products');
		$this->load->model('model_company');
		$this->load->model('model_users');
	}
	/* 
	* It only redirects to the manage order page
	*/
	public function index()
	{   $this->data['mesas'] = $this->model_mesas->getActiveMesas(); 
		
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Manage Orders';
		$this->render_template('orders/index', $this->data);		
	}
	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/

	public function fetchMesasDataById($id) 
	{
		if($id) {
			$data = $this->model_mesas->getMesasData_PyO($id);
			echo json_encode($data);
		}

		return false;
	}

	public function fetchMesasData()
	{ 
		$result = array('data' => array());

		$data = $this->model_mesas->getMesasData_PyO();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			//if(in_array('updateMesas', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			//}

			//if(in_array('deleteMesas', $this->permission)) {
			
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			//}
				

			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}


	public function fetchOrdersData()
	{   

		$result = array('data' => array());
		$data = $this->model_orders->getOrdersData();
		foreach ($data as $key => $value) {
			$count_total_item = $this->model_orders->countOrderItem($value['id']);

			date_default_timezone_set("America/Lima");   
			$date = date('d-m-Y', $value['date_time']);
			$time = date('h:i a', $value['date_time']);
			$date_time = $date . ' ' . $time;
			// button
			$buttons = '';
			if(in_array('viewOrder', $this->permission)) {
				// $buttons .= '<a target="__blank" href="'.base_url('orders/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}
			if(in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="'.base_url('orders/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}
			if(in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if($value['paid_status'] == 1) {
				$paid_status = '<span class="label label-success">Pagado</span>';	
			}
			else {
				if ($value['paid_status'] == 2){
					$paid_status = '<span class="label label-warning">No Pagado</span>';
				}else{
					$paid_status = '<span class="label label-danger">ERROR</span>';
				}	

			}

			if($value['estado_orden'] == 0) {
				$estado_orden = '<span class="label label-default">En Espera</span>';	
			}
			else  

			{
				if($value['estado_orden'] == 1) {
					$estado_orden = '<span class="label label-warning">En Preparacion</span>';	
				}
			   else {
				if($value['estado_orden'] == 2) {
					$estado_orden = '<span class="label label-primary">En Despacho</span>';	
				} else  {
					$estado_orden = '<span class="label label-danger">NO IDENTIFICADO</span>';	
				}
			   }
			}

            $mesa = $this->model_mesas->getMesasData_PyO($value['id_mesa']) ;

			$usuario = $this->model_users->getUserData($value['user_id']) ;
			$result['data'][$key] = array(
				$value['bill_no'],
				
				$mesa['name'],
				$usuario['username'],
				$value['customer_name'],
				$date_time,
				$count_total_item,
				$value['net_amount'],
				$paid_status,
				$estado_orden ,
				$buttons
			);
		} // /foreach
		$this->data['mesas'] = $this->model_mesas->getActiveMesas(); 
		echo json_encode($result);
	}



	
	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{
		if(!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Agregar Orden';
		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$order_id = $this->model_orders->create();
        	
        	if($order_id) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('orders', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/create/', 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company; 
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
			$this->data['products'] = $this->model_products->getActiveProductData();   
			$this->data['mesas'] = $this->model_mesas->getActiveMesas();   	
            $this->render_template('orders/create', $this->data);
        }	
	}




	/*
	* It gets the product id passed from the ajax method.
	* It checks retrieves the particular product data from the product id 
	* and return the data into the json format.
	*/
	public function getProductValueById()
	{   $product_id = $this->input->post('product_id');
		
		if($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	* It gets the all the active product inforamtion from the product table 
	* This function is used in the order page, for the product selection in the table
	* The response is return on the json format.
	*/
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
	}
	public function getTableMesaRow()
	{
		$mesas = $this->model_mesas->getActiveMesas();
		echo json_encode($mesas);
		// $mesas = $this->model_mesas->getActiveCategory();
		// echo json_encode($mesas);
	}
	/*
	* If the validation is not valid, then it redirects to the edit orders page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function update($id)
	{
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}
		$this->data['page_title'] = 'Update Order';
		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_orders->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('orders', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
			
			$result = array();
        	$orders_data = $this->model_orders->getOrdersData($id);
    		$result['order'] = $orders_data;
    		$orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}
    		$this->data['order_data'] = $result;
			$this->data['products'] =  $this->model_products->getActiveProductData();   
            $this->render_template('orders/edit', $this->data);
        }
	}



	public function updateEstado($id)
	{
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		if(!$id) {
			redirect('dashboard', 'refresh');
		}
		$this->data['page_title'] = 'Update Order';
		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_orders->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('orders', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/estado/', 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
        	$result = array();
        	$orders_data = $this->model_orders->getOrdersData($id);
    		$result['order'] = $orders_data;
    		$orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}
    		$this->data['order_data'] = $result;
			$this->data['products'] =  $this->model_products->getActiveProductData();   
            $this->render_template('orders/estado', $this->data);
        }
	}


	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$order_id = $this->input->post('order_id');
        $response = array();
        if($order_id) {


			
            $delete = $this->model_orders->remove($order_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
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


	public function actualizar()
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$order_id = $this->input->post('order_id');
        $response = array();
        if($order_id) {
            $delete = $this->model_orders->remove($order_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
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


	/*
	* It gets the product id and fetch the order data. 
	* The order print logic is done here 
	*/
	/*IMPRIMIRRRRRRRRRRRR */
	public function printDiv($id)
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$order_data = $this->model_orders->getOrdersData($id);
			$orders_items = $this->model_orders->getOrdersItemData($id);
			$company_info = $this->model_company->getCompanyData(1);
			$order_date = date('d/m/Y', $order_data['date_time']);
			$paid_status = ($order_data['paid_status'] == 1) ? "Pagado" : "No Pagado";
			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>AdminLTE 2 | Invoice</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			</head>
			<body onload="window.print();">
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12" >
			        <h2 class="page-header">
			          '.$company_info['company_name'].'
			          <small class="pull-right">Date: '.$order_date.'</small>
			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
			      <div class="col-sm-4 invoice-col">
			        
			        <b>Nº Cuenta:</b> '.$order_data['bill_no'].'<br>
			        <b>Nombre:</b> '.$order_data['customer_name'].'<br>
			        <b>Direccion:</b> '.$order_data['customer_address'].' <br />
			        <b>Celular:</b> '.$order_data['customer_phone'].'
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			    <!-- Table row -->
			    <div class="row">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          <thead>
			          <tr>
			            <th>Lista de Productos</th>
			            <th>Precio</th>
			            <th>Cantidad</th>
			            <th>Monto</th>
			          </tr>
			          </thead>
			          <tbody>'; 
			          foreach ($orders_items as $k => $v) {
			          	$product_data = $this->model_products->getProductData($v['product_id']); 
			          	
			          	$html .= '<tr>
				            <td>'.$product_data['name'].'</td>
				            <td>'.$v['rate'].'</td>
				            <td>'.$v['qty'].'</td>
				            <td>'.$v['amount'].'</td>
			          	</tr>';
			          }
			          
			          $html .= '</tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">
			        <div class="table-responsive">
			          <table class="table">
			            <tr>
			              <th style="width:50%">Cantidad Bruta:</th>
			              <td>'.$order_data['gross_amount'].'</td>
			            </tr>';
			            if($order_data['service_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Service Charge ('.$order_data['service_charge_rate'].'%)</th>
				              <td>'.$order_data['service_charge'].'</td>
				            </tr>';
			            }
			            if($order_data['vat_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Vat Charge ('.$order_data['vat_charge_rate'].'%)</th>
				              <td>'.$order_data['vat_charge'].'</td>
				            </tr>';
			            }
			            
			            
			            $html .=' <tr>
			              <th>Descuento:</th>
			              <td>'.$order_data['discount'].'</td>
			            </tr>
			            <tr>
			              <th>Importe Neto:</th>
			              <td>'.$order_data['net_amount'].'</td>
			            </tr>
			            <tr>
			              <th>Estado de Pago:</th>
			              <td>'.$paid_status.'</td>
			            </tr>
			          </table>
			        </div>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';
			  echo $html;
		}
	}
}