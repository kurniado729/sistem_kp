<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Disposisi_model extends CI_Model
{
	public function getsuratdisposisi(){
		$query = "SELECT * FROM surat_disposisi ORDER BY tujuan";
		return $this->db->query($query)->result_array();
	}

	public function getsuratdisposisibkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' ORDER BY file_disposisi_sudah_disetujui";
		return $this->db->query($query)->result_array();
	}

	public function getsuratdisposisibka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' ORDER BY file_disposisi_sudah_disetujui";
		return $this->db->query($query)->result_array();
	}

	public function gettrash(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '1'";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsuratdisposisi($id){
		$query = "SELECT * FROM surat_disposisi WHERE id_surat_disposisi = $id ";
		return $this->db->query($query)->row_array();
	}

	public function getsubmenu(){
		$query = "SELECT user_sub_menu.*, user_menu.menu
				FROM user_sub_menu JOIN user_menu
				ON user_sub_menu.menu_id = user_menu.id
				";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsubmenu($id){
		$query = "SELECT user_sub_menu.*, user_menu.menu
				FROM user_sub_menu JOIN user_menu
				ON user_sub_menu.menu_id = user_menu.id
				WHERE user_sub_menu.id = $id
				";
		return $this->db->query($query)->row_array();
	}

	public function getshistorydisposisibkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND status IS NOT NULL";
		return $this->db->query($query)->result_array();
	}

	public function getshistorydisposisibka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status IS NOT NULL";
		return $this->db->query($query)->result_array();
	}

	public function searchdisposisi($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_disposisi');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchdisposisibkd($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_disposisi');
		$this->db->WHERE('tujuan', 'BKD');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchdisposisibka($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_disposisi');
		$this->db->WHERE('tujuan', 'BKA');

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
