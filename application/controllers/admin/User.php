<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('login_model');
		$this->load->library('phpass');
		$this->load->library('session');
	}

	

}