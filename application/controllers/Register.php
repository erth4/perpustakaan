<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index(){
		$this->load->view('register_view');
	}

	public function doregister(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[anggota.USERNAME]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == true) {
			if($this->Login_model->userRegister() == true){
				redirect('login');
			}else{
				$this->session->set_flashdata('announce', 'Invalid username or password');
				redirect('register');
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('register');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */