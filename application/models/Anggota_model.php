<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	public function insert($id_petugas){
		$data = array(
			'ID_ANGGOTA'	=> $this->generateID(),
			'ID_ADMIN'		=> $id_petugas,
			'USERNAME'		=> $this->input->post('username'),
			'PASSWORD'		=> md5($this->input->post('password')),
			'FULL_NAME'		=> $this->input->post('nama_lengkap'),
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

	public function update($id){

		if(!empty($this->input->post('password'))) {
			$data = array(
				'USERNAME'			=> $this->input->post('username'),
				'PASSWORD'			=> md5($this->input->post('password')),
				'FULL_NAME'			=> $this->input->post('nama_lengkap'),
				'GENDER'		=> $this->input->post('gender'),
				'TELP'		=> $this->input->post('telp')
			);
		} else {
			$data = array(
				'USERNAME'			=> $this->input->post('username'),
				'FULL_NAME'			=> $this->input->post('nama_lengkap'),
				'GENDER'		=> $this->input->post('gender'),
				'TELP'		=> $this->input->post('telp')
			);
		}

		
		$this->db->where('ID_ANGGOTA', $id);
		$update = $this->db->update('anggota', $data);
		if($update){
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

	public function getList(){
		return $query = $this->db->order_by('id_anggota','ASC')->get('anggota')->result();
	}

	public function getCount(){
		return $this->db->count_all('anggota');
	}

	public function getDetail($id){
		return $this->db->where('ID_ANGGOTA', $id)->get('anggota')->row();
	}

	public function checkAvailability($id){
		$query = $this->db->where('ID_ANGGOTA', $id)->get('anggota');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('ID_ANGGOTA', $id)->delete('anggota');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Anggota_model.php */
/* Location: ./application/models/Anggota_model.php */