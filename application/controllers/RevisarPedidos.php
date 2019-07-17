<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RevisarPedidos extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Pedidos';
		
		$this->load->model('model_pedidos');
	
		$this->load->model('model_products');
		$this->load->model('model_company');
		$this->load->model('model_users');
	}
	/* 
	* It only redirects to the manage pedidos page
	*/
	public function index()
	{   
		
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['page_title'] = 'Revisar Pedidoss';
		$this->render_template('revisarPedidos/index', $this->data);		
	}
	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/

	

	public function fetchPedidosData()
	{   

		$result = array('data' => array());
		$data = $this->model_pedidos->getPedidosData();


		foreach ($data as $key => $value) {
		

			 date_default_timezone_set("America/Lima");   
			 $date = date('d-m-Y', $value['fecha']);
			 $time = date('h:i a', $value['fecha']);
			 $date_time = $date . ' ' . $time;


			// button
			$buttons = '';
			if(in_array('viewOrder', $this->permission)) {
				// $buttons .= '<a target="__blank" href="'.base_url('orders/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}
			if(in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="'.base_url('revisarPedidos/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';
				
			}
			if(in_array('updateOrder', $this->permission)) {
				// $buttons .= ' <a href="'.base_url('revisarPedidos/view/'.$value['id']).'" class="btn btn-default"><i class="fa fa-check"></i></a>';
				$buttons .= ' <button type="button" class="btn btn-default" onclick="aprobarFunc('.$value['id'].')" data-toggle="modal" data-target="#aprobarModal"><i class="fa fa-check"></i></button>';

			}
			if(in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-close"></i></button>';
			}

			

			if($value['estado_pago'] == 1) {
				$estado_pago = '<span class="label label-success">Pagado</span>';	
			}
			else {
				if ($value['estado_pago'] == 0){
					$estado_pago = '<span class="label label-warning">No Pagado</span>';
				}else{
					$estado_pago = '<span class="label label-danger">ERROR</span>';
				}	

			}


			switch ($value['estado_pedido']) {
				case "0":
				$estado_pedido = '<span class="label label-warning">En Espera</span>';
					break;
				case "1":
				$estado_pedido = '<span class="label label-default">En Anulado</span>';
					break;
				case 2:
				$estado_pedido = '<span class="label label-danger">Rechazado</span>';
					break;
				case 3:
				$estado_pedido = '<span class="label label-success">Aprobado</span>';
					break;

				case 4:
				$estado_pedido = '<span class="label label-info">En compra de Insumos</span>';
					break;

				case 5:
				$estado_pedido = '<span class="label label-primary">En Produccion</span>';
					break;
				case 6:
				$estado_pedido = '<span class="label label-success">Listo</span>';
					break;
				case 7:
				$estado_pedido = '<span class="label label-default">En Recogido</span>';
					break; 
				default:
				$estado_pedido = '<span class="label label-default">OTRO</span>';
			}
            			
			$result['data'][$key] = array(
				$value['codPedido'],
				$date_time,
				 $value['nombre_cli'], 
				//  $value['direccion_cli'],
				//  $value['telefono_cli'],
				 $value['ruc_cli'],
				
				//  $estado_pago,
				//  $value['cant_bruta'],
				//  $value['descuento'],
				 $value['cant_neta'],
				 $estado_pedido,
				$buttons
			);
		} // /foreach
		
		echo json_encode($result);
	}



	
	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{
		// if(!in_array('createOrder', $this->permission)) {
        //     redirect('dashboard', 'refresh');
        // }
		$this->data['page_title'] = 'Agregar Pedido';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$order_id = $this->model_pedidos->create();
        	
        	if($order_id) {
				$this->session->set_flashdata('success', 'Creado Satisfactoriamente');
				redirect('revisarPedidos/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Ocurrio un error!!!!');
        		redirect('revisarPedidos/create', 'refresh');
        	}
        }
        else {
            // false case
        	 $company = $this->model_company->getCompanyData(1);
        	 $this->data['company_data'] = $company; 
        	 $this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	 $this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
			 $this->data['products'] = $this->model_products->getActiveProductData();   
            $this->render_template('revisarPedidos/create', $this->data);
        }	
	}




	/*
	* It gets the product id passed from the ajax method.
	* It checks retrieves the particular product data from the product id 
	* and return the data into the json format.
	*/
	public function getPedidosValueById()
	{   $product_id = $this->input->post('product_id');
		
		if($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	* It gets the all the active product inforamtion from the product table 
	* This function is used in the pedidos page, for the product selection in the table
	* The response is return on the json format.
	*/
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
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
        	
        	$update = $this->model_pedidos->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Actualizado Satisfactoriamente');
        		redirect('revisarPedidos', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error!!!');
        		redirect('revisarPedidos/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
			
			$result = array();
        	$orders_data = $this->model_pedidos->getPedidosData($id);
    		$result['order'] = $orders_data;
    		$orders_item = $this->model_pedidos->getOrdersItemData($orders_data['id']);
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}
    		$this->data['order_data'] = $result;
			$this->data['products'] =  $this->model_products->getActiveProductData();   
            $this->render_template('revisarPedidos/edit', $this->data);
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
        	
        	$update = $this->model_pedidos->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('pedidos', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('pedidos/estado/', 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;
        	$result = array();
        	$orders_data = $this->model_pedidos->getOrdersData($id);
    		$result['order'] = $orders_data;
    		$orders_item = $this->model_pedidos->getOrdersItemData($orders_data['id']);
    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}
    		$this->data['order_data'] = $result;
			$this->data['products'] =  $this->model_products->getActiveProductData();   
            $this->render_template('pedidos/estado', $this->data);
        }
	}
 

	public function remove() //actualizar re chazado
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$order_id = $this->input->post('order_id');
        $response = array();
        if($order_id) {
			
					// $delete = $this->model_pedidos->remove($order_id);
					$update = $this->model_pedidos->updateRechazado($order_id);

					if($update == true) {
						$response['success'] = true;
						$response['messages'] = "Eliminado exitosamente"; 
					}
					else {
						$response['success'] = false;
						$response['messages'] = "Error en la base de datos";
					}
				}
				else {
					$response['success'] = false;
					$response['messages'] = "Refersh the page again!!";
				}
				echo json_encode($response); 
	}
	public function aprobar() //actualizar re chazado
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$order_id = $this->input->post('order_id');
        $response = array();
        if($order_id) {
			
					// $delete = $this->model_pedidos->remove($order_id);
					$update = $this->model_pedidos->updateAprobado($order_id);

					if($update == true) {
						$response['success'] = true;
						$response['messages'] = "Eliminado exitosamente"; 
					}
					else {
						$response['success'] = false;
						$response['messages'] = "Error en la base de datos";
					}
				}
				else {
					$response['success'] = false;
					$response['messages'] = "Refersh the page again!!";
				}
				echo json_encode($response); 
	}


	/*
	* It gets the product id and fetch the pedidos data. 
	* The pedidos print logic is done here 
	*/
	/*IMPRIMIRRRRRRRRRRRR */
	public function printDiv($id)
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$order_data = $this->model_pedidos->getOrdersData($id);
			$orders_items = $this->model_pedidos->getOrdersItemData($id);
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