<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}
 

 		public function check_email($email){
 			$query = $this->db->get_where('users', array('email'=>$email));
 			return $query->row_array();
 		}
	}
?>