<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Masuk_model extends CI_Model
{
	public function pagsuratmasuk($limit, $start)
	{
		$this->db->order_by('disposisi', 'ASC');
		$data = $this->db->get_where('surat_masuk', ['hapus' => '0'], $limit, $start);
		return $data->result_array();
	}

	public function pagtrash($limit, $start)
	{
		$this->db->order_by('id_surat_masuk', 'DESC');
		$data = $this->db->get_where('surat_masuk', ['hapus' => '1'], $limit, $start);
		return $data->result_array();
	}

	public function getsuratmasuk(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '0' ORDER BY disposisi ";
		return $this->db->query($query)->result_array();
	}

	public function gettrash(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '1' ORDER BY id_surat_masuk DESC";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsuratmasuk($id){
		$query = "SELECT * FROM surat_masuk WHERE id_surat_masuk = $id ";
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

	public function searchsuratmasuk($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_masuk');
		$this->db->WHERE('hapus','0');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchtrash($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_masuk');
		$this->db->WHERE('hapus','1');

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
