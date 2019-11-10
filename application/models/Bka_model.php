<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bka_model extends CI_Model
{
	public function pagsuratbka($limit, $start)
	{
		$this->db->order_by('status_spt', 'ASC');
		$data = $this->db->get_where('surat_disposisi', ['tujuan' => 'BKA', 'status' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function pagspt($limit, $start)
	{
		$this->db->order_by('status_pengajuan', 'ASC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKA'], $limit, $start);
		return $data->result_array();
	}

	public function suratbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status = '1' ORDER BY status_spt";
		return $this->db->query($query)->result_array();
	}

	public function suratspt(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' ORDER BY status_pengajuan";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsuratdisposisi($id){
		$query = "SELECT * FROM surat_disposisi WHERE id_surat_disposisi = $id ";
		return $this->db->query($query)->row_array();
	}

	public function getpegawai($nama){
		$hasil = $this->db->query("SELECT * FROM pegawai WHERE bagian = 'BKA' AND nama_pegawai ='$nama'");
		return $hasil->result();
	}

	public function getdetailspt($id){
		$query = "SELECT * FROM surat_spt WHERE id_surat_spt = $id ";
		return $this->db->query($query)->row_array();
	}

	public function searchbka($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_disposisi');
		$this->db->WHERE('tujuan', 'BKA');
		$this->db->WHERE('status', '1');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchspt($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_spt');
		$this->db->WHERE('bagian', 'BKA');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}


}
