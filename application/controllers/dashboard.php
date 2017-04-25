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
		$this->load->model('job_posts','jobs');
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
		        					 'status' => 'active',
		        					 'created_at' => date('Y-m-d H:i:s',time())
		        					);
		        	//print_r($record);
		        	$this->db->insert('job_posts',$record);
		        	echo 'success';
		        }
		}
	} //end submitjob

	// View jobs
	public function view($jobid = null){

		if($jobid === null || $jobid == '') {
			//$jobid = base64_decode($jobid);
			$data['jobs'] = $this->jobs->getAll();
			$this->load->view('frontend/inc/header',$data);
			$this->load->view('frontend/viewjobs.php');
			$this->load->view('frontend/inc/footer');
		} else {
			$data['job'] = $this->jobs->getSingle($jobid);
			$this->load->view('frontend/inc/header',$data);
			$this->load->view('frontend/single_job.php');
			$this->load->view('frontend/inc/footer');
		}


	} //end view

	// submit proposal

	public function submitproposal() {

		if(isset($_POST) && !empty($_POST)) {

			$this->form_validation->set_rules('proposal', 'Proposal', 'trim|required');
			$this->form_validation->set_rules('bid_amount', 'Amount', 'trim|required');

			if ($this->form_validation->run() == FALSE)
		    {
		        print_r($this->form_validation->error_array());
		    } else {

		    	$bid = array('jobId' => $_POST['jobid'],
		    				  'freelancerId' => $this->session->userdata('uid'),
		    				  'proposal' => $_POST['proposal'],
		    				  'amount' => $_POST['bid_amount'],
		    				  'created_at' => date('Y-m-d H:i:s',time())
		    				 );
		    	if($this->db->insert('proposal',$bid)) {
		    		return 'success'; exit();
		    	}
		    }


		} //endif

	}


}