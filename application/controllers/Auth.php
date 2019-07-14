<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('model_auth');
    $this->load->model('model_groups');
    $this->load->model('model_users');
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login(){

		$this->logged_in();

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
           	$email_exists = $this->model_auth->check_email($this->input->post('email'));

           	if($email_exists == TRUE) {
           		$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

           		if($login) {

           			$logged_in_sess = array(
           				'id' => $login['id'],
				        'username'  => $login['username'],
				        'email'     => $login['email'],
				        'logged_in' => TRUE
					);

					$this->session->set_userdata($logged_in_sess);
           			redirect('dashboard', 'refresh');
           		}
           		else {

           		$this->data['errors'] = 'contraseña es incorrecta';
           			$this->load->view('login', $this->data);

           		}
           	}
           	else {
           		$this->data['errors'] = 'El email no existe.';

           		$this->load->view('login', $this->data);
           	}	
        }
        else {
            $this->load->view('login');
        }	
	}

public function password_hash($pass = '')
  {
    if($pass) {
      $password = password_hash($pass, PASSWORD_DEFAULT);
      return $password;
    }
  }

  public function register(){
       $this->model_auth->createIfNotExists();
  		$this->logged_in();
  		$this->form_validation->set_rules('firstname', 'Firtname', 'required');
      $this->form_validation->set_rules('lastname', 'Lastname', 'required');
      $this->form_validation->set_rules('phone', 'Phone', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
  		$this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
          $data = array(
            'username' => $this->input->post('username'),
            'password' => $password,
            'email' => $this->input->post('email'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
          );

          $create = $this->model_users->create($data, $this->input->post('groups'));
          if($create == true) {
            $this->session->set_flashdata('success', 'Successfully created');
          redirect('auth/login', 'refresh');
          }
          else {
            $this->session->set_flashdata('errors', 'Ha ocurrido un error.');
            $this->load->view('register');
          }
        }
        else {
            $this->load->view('register');
        }	
	}
	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}

}
