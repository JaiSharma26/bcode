<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('login_model');
		$this->load->library('phpass');
		$this->load->library('session');
	}

	public function index()
	{
		//echo $this->phpass->hash('admin@123'); die;
		$this->load->view('admin/login');

		if(isset($_POST) && !empty($_POST['login_username'])) {
			$record['username'] = $this->input->post('login_username');
			$record['password'] = $this->phpass->hash($this->input->post('login_password'));
			// Call method from model
			$rec = $this->login_model->checklogin($record);	
			$hashed = $rec->password;					// get hashed password from db
			if($this->phpass->check($this->input->post('login_password'), $hashed)) {
				$this->session->set_userdata(array('uid' => $rec->id));
				redirect('admin/home');
			} //endif
		} //endif
	}

	public function home()
	{
		if($this->session->userdata('uid') == '' || empty($this->session->userdata('uid'))) {
			redirect('admin'); exit();
		} //endif

		$this->load->view('admin/inc/header');
		$this->load->view('admin/index');
		$this->load->view('admin/inc/footer');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}
