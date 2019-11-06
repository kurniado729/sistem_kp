<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
	public function getTU(){
		$query = "SELECT * FROM pegawai WHERE bagian = 'TU' AND hapus='0'";
		return $this->db->query($query)->result_array();
	}

	public function getBKA(){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKA' AND hapus='0'";
		return $this->db->query($query)->result_array();
	}

	public function getBKD(){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKD' AND hapus='0'";
		return $this->db->query($query)->result_array();
	}

	public function gettrash(){
		$query = "SELECT * FROM pegawai WHERE hapus = '1'";
		return $this->db->query($query)->result_array();
	}

	public function getdetailpegawai($id){
		$query = "SELECT * FROM pegawai WHERE id_pegawai = $id ";
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

}
