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
        public function userLogin($record) {
                $query = $this->db->from('users');
                 $query->where(['username' => $record['username']])->or_where(['email'=> $record['username']]);
                 return $query->get()->row();


        }

}

?>