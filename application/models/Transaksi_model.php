<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function getTotal(){
		return $this->db->count_all('peminjaman');
	}

	public function getPeminjaman(){
		$this->db->join('anggota', 'anggota.ID_ANGGOTA = peminjaman.ID_ANGGOTA', 'left');
		$this->db->join('admin', 'admin.ID_ADMIN = peminjaman.ID_ADMIN', 'left');
		$this->db->where('peminjaman.STATS', 'Belum Kembali');

		if($this->session->userdata('role') == 'user') {
			$this->db->where('anggota.ID_ANGGOTA', $this->session->userdata('_id'));
		}

		$this->db->order_by('peminjaman.ID_PINJAM', 'ASC');
		return $this->db->get('peminjaman')->result();
	}

	public function getPengembalian(){
		$this->db->join('anggota', 'anggota.ID_ANGGOTA = peminjaman.ID_ANGGOTA', 'left');
		$this->db->join('admin', 'admin.ID_ADMIN = peminjaman.ID_ADMIN', 'left');
		$this->db->where('peminjaman.STATS', 'Sudah Kembali');

		if($this->session->userdata('role') == 'user') {
			$this->db->where('anggota.ID_ANGGOTA', $this->session->userdata('_id'));
		}

		$this->db->order_by('peminjaman.ID_PINJAM', 'ASC');

		return $this->db->get('peminjaman')->result();
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */