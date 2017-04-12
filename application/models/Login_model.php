<?php

class Login_model extends CI_Model {


	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
        }

        public function checklogin($record) {

        	$query = $this->db->get_where('admin', array('username' => $record['username']));

        	return $query->row();
        }

}

?>