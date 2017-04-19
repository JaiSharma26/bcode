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
		$this->load->helper('auth_helper');
	}


	private function profile_validation($record) {

		foreach(array_keys($record) as $flds) {
			$this->form_validation->set_rules($flds, ucfirst($flds), 'trim|required');	
		} //endforeach

		if ($this->form_validation->run() == FALSE)
        {
           return $this->form_validation->error_array();
        } else {
          return true;
        }

		/*
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('expertise', 'Expertise', 'trim|required');
		$this->form_validation->set_rules('experience', 'Experience', 'trim|required');
		if ($this->form_validation->run() == FALSE)
        {
           return $this->form_validation->error_array();
        } else {
          return true;
        }
        */

	}

	public function profile() {

		nologin(site_url());
		if(isset($_POST) && !empty($_POST)) {
				$validate = self::profile_validation($_POST);
				if(is_array($validate)) {
						$success = array('success' => 0, 'message' => $validate);
						echo json_encode($success); exit();
				} else {
					 echo 'working'; exit();
				}
		}

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/profile');
		$this->load->view('frontend/inc/footer');
	}

}