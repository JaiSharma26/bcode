<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobpost extends CI_Controller {

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

	public function edit() {
		if(isset($_POST) && !empty($_POST)) {
			$data['job'] = $this->jobs->getSingle($_POST['jobId']);
			$this->load->view('admin/editjob',$data);
		}
	}
	public function delete() {
		$this->job->delete($id);
	}

}