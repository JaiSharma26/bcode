<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('phpass');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('auth_helper');
	}

	public function postjob() {
		nologin(site_url());
		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/postjob.php');
		$this->load->view('frontend/inc/footer');
	} //end postjob


	public function submitjob() {
		if(isset($_POST) && !empty($_POST)) {
				$this->form_validation->set_rules('job_title', 'Title', 'trim|required');
				$this->form_validation->set_rules('skills', 'Skills', 'trim|required');
				$this->form_validation->set_rules('description', 'Job description', 'trim|required');

				if ($this->form_validation->run() == FALSE)
		        {
		            print_r($this->form_validation->error_array());
		        } else {
		           //return true;
		        	//echo 'fine';
		        	$record = array('title' => $_POST['job_title'],
		        					'skills' => json_encode(explode(',',$_POST['skills'])),
		        					 'description' => $_POST['description'],
		        					 'customerId' => $this->session->userdata('uid'),
		        					 'created_at' => date('Y-m-d H:i:s',time())
		        					);
		        	//print_r($record);
		        	$this->db->insert('job_posts',$record);
		        	echo 'success';
		        }
		}
	} //end submitjob


}