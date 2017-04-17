<?php

class Admin_user extends CI_Model {


	 public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->library('session');

        }

       public function getAll() {

       		$query = $this->db->select(['Id','name','username','email','type','active'])->from('users');
       		return $query->get()->result();

       }
       public function getSingle($id) {
          
          return $query = $this->db->from('users')->where(['Id' => $id])->get()->row();

       }

       public function deleteSingle($id) {
          $query = $this->db->where('Id', $id)->delete('users'); 
       }
       public function activeUser($rec) {
          return $query = $this->db->set('active',$rec['checked'])->where('Id',$rec['userId'])->update('users');
       }

}