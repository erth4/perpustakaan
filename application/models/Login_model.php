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

	public function generateID(){
		$query = $this->db->order_by('ID_ANGGOTA', 'DESC')->limit(1)->get('anggota')->row('ID_ANGGOTA');
		$lastNo = substr($query, 3);
		$next = $lastNo + 1;
		$kd = 'AGT';
		return $kd.sprintf('%03s', $next);
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

	public function userRegister(){
		$data = array(
			'ID_ANGGOTA'	=> $this->generateID(),
			'USERNAME'		=> $this->input->post('username'),
			'PASSWORD'		=> md5($this->input->post('password')),
			'FULL_NAME'		=> $this->input->post('nama'),
			'GENDER'		=> $this->input->post('gender'),
			'TELP'			=> $this->input->post('telp'),
			'D_CREATED'		=> date('Ymd')
			 );

		$this->db->insert('anggota', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */