<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
	public function pagpegawaitu($limit, $start)
	{
		$this->db->order_by('id_pegawai', 'DESC');
		$data = $this->db->get_where('pegawai', ['bagian' => 'TU', 'hapus' => '0'], $limit, $start);
		return $data->result_array();
	}
	public function pagpegawaibkd($limit, $start)
	{
		$this->db->order_by('id_pegawai', 'DESC');
		$data = $this->db->get_where('pegawai', ['bagian' => 'BKD', 'hapus' => '0'], $limit, $start);
		return $data->result_array();
	}
	public function pagpegawaibka($limit, $start)
	{
		$this->db->order_by('id_pegawai', 'DESC');
		$data = $this->db->get_where('pegawai', ['bagian' => 'BKA', 'hapus' => '0'], $limit, $start);
		return $data->result_array();
	}
	public function pagtrash($limit, $start)
	{
		$this->db->order_by('id_pegawai', 'DESC');
		$data = $this->db->get_where('pegawai', ['hapus' => '1'], $limit, $start);
		return $data->result_array();
	}

	public function getTU(){
		$query = "SELECT * FROM pegawai WHERE bagian = 'TU' AND hapus='0' ORDER BY id_pegawai DESC";
		return $this->db->query($query)->result_array();
	}

	public function getBKA(){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKA' AND hapus='0' ORDER BY id_pegawai DESC";
		return $this->db->query($query)->result_array();
	}

	public function getBKD(){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKD' AND hapus='0' ORDER BY id_pegawai DESC";
		return $this->db->query($query)->result_array();
	}

	public function gettrash(){
		$query = "SELECT * FROM pegawai WHERE hapus = '1' ORDER BY id_pegawai DESC";
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

	public function searchpegawaitu($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('pegawai');
		$this->db->WHERE('bagian','TU');
		$this->db->WHERE('hapus','0');

		if ($kategori == 'nama_pegawai') {
			$this->db->LIKE('nama_pegawai', $keyword);
		}
		else{
			$this->db->LIKE('jabatan', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchpegawaibkd($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('pegawai');
		$this->db->WHERE('bagian','BKD');
		$this->db->WHERE('hapus','0');

		if ($kategori == 'nama_pegawai') {
			$this->db->LIKE('nama_pegawai', $keyword);
		}
		else{
			$this->db->LIKE('jabatan', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchpegawaibka($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('pegawai');
		$this->db->WHERE('bagian','BKA');
		$this->db->WHERE('hapus','0');

		if ($kategori == 'nama_pegawai') {
			$this->db->LIKE('nama_pegawai', $keyword);
		}
		else{
			$this->db->LIKE('jabatan', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchtrash($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('pegawai');
		$this->db->WHERE('hapus','1');

		if ($kategori == 'nama_pegawai') {
			$this->db->LIKE('nama_pegawai', $keyword);
		}
		else{
			$this->db->LIKE('jabatan', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function addpegawaitu(){
		$this->db->insert('pegawai', [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'bagian' => $this->input->post('bagian')
		]);
	}

	public function addpegawaibkd(){
		$this->db->insert('pegawai', [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'bagian' => $this->input->post('bagian')
		]);
	}

	public function addpegawaibka(){
		$this->db->insert('pegawai', [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'bagian' => $this->input->post('bagian')
		]);
	}

	public function editpegawaitu($id){
		$nama_pegawai = $this->input->post('nama_pegawai');

		$this->db->set('nama_pegawai', $nama_pegawai);
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');

	}

	public function editpegawaibkd($id){
		$nama_pegawai = $this->input->post('nama_pegawai');

		$this->db->set('nama_pegawai', $nama_pegawai);
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function editpegawaibka($id){
		$nama_pegawai = $this->input->post('nama_pegawai');

		$this->db->set('nama_pegawai', $nama_pegawai);
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function deletepegawaitu($id){
		$this->db->set('hapus', '1');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function deletepegawaibkd($id){
		$this->db->set('hapus', '1');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function deletepegawaibka($id){
		$this->db->set('hapus', '1');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function restorepegawai($id){
		$this->db->set('hapus', '0');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function deletepermanentpegawai($id){
		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');

	}


}


