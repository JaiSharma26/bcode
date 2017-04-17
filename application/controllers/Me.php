<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Me extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('phpass');
		$this->load->model('login_model');
		$this->load->database();
	}

	public function profile() {
		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/profile');
		$this->load->view('frontend/inc/footer');
	}

}