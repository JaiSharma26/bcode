<?php

class Admin_user extends CI_Model {


	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
        }

       public function getUser() {

       		$query = $this->db->select(['Id','name','username','email'])->from('users');
       		return $query->get()->result();

       }
}