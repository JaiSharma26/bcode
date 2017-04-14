<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('phpass');
		$this->load->model('login_model');
		$this->load->database();


	}

	private function signup_validate() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]|is_unique[users.username]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]',
                    array('required' => 'You must provide a %s.',
                    	   'min_length' => '%s must be 5 characters atleast')
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


	} //end signup_validation
	public function index() {

		if(isset($_POST) && !empty($_POST)) {

			$username_email = !empty($_POST['username_email']) ? $_POST['username_email'] : '';
			$password = !empty($_POST['password']) ? $_POST['password'] : '';

			$record = array('username' => $_POST['username_email'],'password' => $_POST['password']);
			$rec = $this->login_model->userLogin($record);

			//echo '<pre>'; print_r($rec); die;

			if(!empty($rec) && $this->phpass->check($this->input->post('password'), $rec->password)) {

				echo 'Login successfull. User Id: '.$rec->Id; die;

			} else {
				echo 'Login Failed! Please try again'; 
			} //endif
			exit();
			//echo '<pre>'; print_r($rec); die;


		} //endif

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/inc/footer');

	}
	public function register(){

		if(isset($_POST) && !empty($_POST)) {
			$valReg = self::signup_validate();
			if(is_array($valReg)) {

				$success = array('success' => 0, 'message' => $valReg);

				//echo json_encode($valReg); exit();
				echo json_encode($success); exit();
			} else {

				unset($_POST['passconf']);

				$_POST['password'] = $this->phpass->hash($_POST['password']);
				
				if($this->db->insert('users', $_POST)) {

					$success = array('success' => 1, 'message' => 'Record Inserted Successfully');
					echo json_encode($success); exit();
					
				} //endif

			}
		}

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/register');
		$this->load->view('frontend/inc/footer');
	}

}
