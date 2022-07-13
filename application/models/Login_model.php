<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function accountCheck(){
		$qury = $this->db->count_all('admin');
		if($qury == 0){
			return true;
		}else{
			return false;
		}
	}

	public function userCheck(){
		$akses = $this->input->post('akses');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$now = date('d-m-Y H:i:s');

		if($akses == 'user') {
			$kueri = $this->db->where('USERNAME', $username)->where('PASSWORD', md5($password))->get('anggota');
		} else {
			$kueri = $this->db->where('USERNAME', $username)->where('PASSWORD', md5($password))->get('admin');
		}
		if($kueri->num_rows() > 0){
			$data = array(
				'_id'		=> $akses == 'user' ? $kueri->row()->ID_ANGGOTA : $kueri->row()->ID_ADMIN,
				'username'	=> $kueri->row()->USERNAME,
				'logged_in'	=> true,
				'role'		=> $akses == 'user' ? 'user' : $kueri->row()->ROLE
			);
			
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */