<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


	}

	private function signup_validate() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required',
                    array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');


         if ($this->form_validation->run() == FALSE)
         {
            //$this->load->view('myform');
            //return false;
            //return validation_errors();
            return $this->form_validation->error_array();

         } else {
            //$this->load->view('formsuccess');
            return true;
         }


	}

	public function index() {

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/inc/footer');

	}
	public function register(){

		if(isset($_POST) && !empty($_POST)) {
			$valReg = self::signup_validate();
			if(is_array($valReg)) {
				echo json_encode($valReg); exit();
			}
		}

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/register');
		$this->load->view('frontend/inc/footer');
	}

}
