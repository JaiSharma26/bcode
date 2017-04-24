<?php

class Job_posts extends CI_Model {

	 public function __construct()
     {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->library('session');
     }

     public function getAll() {

     	return $this->db->select('job_posts.*,users.Id,users.username')
     			->from('job_posts')
     			->join('users', 'job_posts.customerId = users.Id', 'left')
     			->get()->result();
     }
     public function getSingle($id) {
     	return $this->db->select('job_posts.*,users.Id,users.username')
     			->from('job_posts')
     			->join('users', 'job_posts.customerId = users.Id', 'left')
     			->where(['job_posts.job_Id' => $id])
     			->get()->row();	
     }


}