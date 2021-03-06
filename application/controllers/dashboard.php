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
		$this->load->helper('url');
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

	// View jobs for freelancer
	public function view($jobid = null){

		if($jobid === null || $jobid == '') {
			//$jobid = base64_decode($jobid);
			$data['jobs'] = $this->jobs->getAll();
			$this->load->view('frontend/inc/header',$data);
			$this->load->view('frontend/viewjobs');
			$this->load->view('frontend/inc/footer');
		} else {
			$data['job'] = $this->jobs->getSingle($jobid);
			$this->load->view('frontend/inc/header',$data);
			$this->load->view('frontend/single_job');
			$this->load->view('frontend/inc/footer');
		}


	} //end view
	// view my jobs
	public function myjobs($jobId = null) {
			//echo $jobId; die;
			if($jobId != null || $jobId != '') {
				$data['job'] = $this->jobs->getbyUser($this->session->userdata('uid'),$jobId);
				$data['proposals'] = $this->jobs->proposals($jobId);
				$this->load->view('frontend/inc/header',$data);
				$this->load->view('frontend/single_job');
				$this->load->view('frontend/inc/footer');				
			} else {
				$data['jobs'] = $this->jobs->getbyUser($this->session->userdata('uid'));
				//echo '<pre>'; print_r($data); die;
				$this->load->view('frontend/inc/header',$data);
				$this->load->view('frontend/viewjobs');
				$this->load->view('frontend/inc/footer');
			} //endif			

	}

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

	// submit approval
	public function approval(){

			if(isset($_POST) && !empty($_POST)) {
				$approvalArr = array(
									  'jobId' => $_POST['jobid'],
									  'userId' => $_POST['userid'],
									  'customerId' => $this->session->userdata('uid'),
									  'status' => $_POST['status'],
									  'approval_message' => $_POST['approval_msg'],
									  'extra_guidelines' => $_POST['extra_guidlines'],
									  'created_at' => date('Y-m-d H:i:s',time())
									);
				if($this->db->insert('proposal_approval',$approvalArr)) {
					$this->db->set(['status'=>'approve'])
							->where('job_Id',$_POST['jobid'])
							->update('job_posts');
						echo json_encode(array('success' => 'true','message' => 'record inserted successfully'));
				} //endif

			} //endif

	} //end approval

	public function activejobs() {

		$data['activejobs'] = $this->jobs->activejobs();

		//echo '<pre>'; print_r($activejobs); die;

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/activejobs',$data);
		$this->load->view('frontend/inc/footer');

	} //end active

	public function finishjob() {

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/finishjobs');
		$this->load->view('frontend/inc/footer');		

	} //end finishjob

	public function canceljob() {

	} //end canceljob


}