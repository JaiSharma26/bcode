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
		$this->load->model('job_posts','jobs');
		$this->load->helper('auth_helper');
	}

	public function index() {



	}

}