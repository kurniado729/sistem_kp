<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spt_model extends CI_Model
{
	public function pagpersetujuansptbkd($limit, $start)
	{
		$this->db->order_by('file_spt_sudah_disetujui', 'ASC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKD', 'status_pengajuan' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function pagpersetujuansptbka($limit, $start)
	{
		$this->db->order_by('file_spt_sudah_disetujui', 'ASC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKA', 'status_pengajuan' => '1' ], $limit, $start);
		return $data->result_array();
	}


	public function suratsptbkd(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1' ORDER BY file_spt_sudah_disetujui";
		return $this->db->query($query)->result_array();
	}

	public function suratsptbka(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1' ORDER BY file_spt_sudah_disetujui";
		return $this->db->query($query)->result_array();
	}

	public function getdetailspt($id){
		$query = "SELECT * FROM surat_spt WHERE id_surat_spt = $id ";
		return $this->db->query($query)->row_array();
	}

	public function searchpersetujuansptbkd($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_spt');
		$this->db->WHERE('bagian', 'BKD');
		$this->db->WHERE('status_pengajuan', '1');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchpersetujuansptbka($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_spt');
		$this->db->WHERE('bagian', 'BKA');
		$this->db->WHERE('status_pengajuan', '1');

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
