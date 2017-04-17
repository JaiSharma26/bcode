<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->library('phpass');
		$this->load->library('session');
		$this->load->model('Admin_user','users');
	}

	public function edit() {

		if(isset($_POST['userId']) && !empty($_POST['userId'])) {

			$user = $this->users->getSingle($_POST['userId']);
			
			$data['user'] = $user;
			//echo '<pre>'; print_r($user); die;
			$this->load->view('admin/edituser.php',$data);

		} //endif		
	}

	public function delete() {

		if(isset($_POST['userId']) && !empty($_POST['userId'])) {

			if($this->users->deleteSingle($_POST['userId'])) {

				$this->load->view('admin/users');

			} //endif


		} //endif

	}

	public function activeuser() {

		if(isset($_POST['userId']) && !empty($_POST['userId'])) {

			if($this->users->activeUser($_POST)) {

				return true;

			}

		} //endif

	} //end activeuser

}