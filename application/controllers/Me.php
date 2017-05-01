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
	}

	public function profile() {
		//echo APPPATH; die;
		nologin(site_url());

		if(isset($_POST) && !empty($_POST)) {

				//echo '<pre>'; print_r($_POST); die;
				$validate = self::profile_validation($_POST);
				if(is_array($validate)) {
						$success = array('success' => 0, 'message' => $validate);
						echo json_encode($success); exit();
				} else {
					 //echo 'working'; exit();
					//$_POST['userId'] = $this->session->userdata('uid');
					//$_POST['expertise'] = json_encode(explode(',',$_POST['expertise']));
					$avatar = self::avatarUpload(); // upload avatar
					//print_r($_POST); exit();
					if($avatar['error'] != '' || !empty($avatar['error'])) {
						echo json_encode(array('success' => 0, 'message' => $avatar))	; exit();
					} //endif

					if(isset($_POST['freelancer_submit'])) {

						unset($_POST['freelancer_submit']);
						unset($_POST['name']);

						$_POST['expertise'] = json_encode(explode(',',$_POST['expertise']));
						$_POST['userId'] = $this->session->userdata('uid');
						$_POST['created_at'] = date('Y-m-d H:i:s',time());

						if($this->db->insert('profile_freelancer', $_POST)) {
								$success = array('success' => 1, 'message' => 'Record Inserted Successfully');
								echo json_encode($success); exit();						
						} //endif
					} else if(isset($_POST['customer_submit'])) {
						unset($_POST['customer_submit']);
						if($this->db->insert('profile_customer', $_POST)) {
								$_POST['userId'] = $this->session->userdata('uid');
								$_POST['created_at'] = date('Y-m-d H:i:s',time());
								$success = array('success' => 1, 'message' => 'Record Inserted Successfully');
								echo json_encode($success); exit();						
						} //endif
					} //endif

				}
		}

		$this->load->view('frontend/inc/header');
		$this->load->view('frontend/profile');
		$this->load->view('frontend/inc/footer');
	}

	private function avatarUpload()
	{
                $config['upload_path']          = APPPATH.'../uploads/avatar/';
                $config['allowed_types']        = 'gif|jpg|png';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('avatar'))
                {
                        return $error = array('error' => $this->upload->display_errors());

                        //return $response = json_encode('success' => 0, 'message' => $error);

                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        return $data = array('upload_data' => $this->upload->data());
                        //return $response = json_encode('success' => 1, 'message' => 'Avatar uploaded successfully');

                        //$this->load->view('upload_success', $data);
                }
        }	

}