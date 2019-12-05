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

	public function getuser(){
		$this->db->SELECT('*');
		$this->db->FROM('user');
		$this->db->WHERE('email', $this->session->userdata('email'));
		$data = $this->db->get();
		return $data->row_array();
	}

	public function getallpegawai(){
		$query = "SELECT * FROM pegawai";
		return $this->db->query($query)->result_array();
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
		$data = [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' => $this->input->post('nip'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'jabatan' => $this->input->post('jabatan'),
			'bagian' => $this->input->post('bagian')
		];

		$data = $this->pegawai->getallpegawai();
		$tidaksama = true;
		foreach ($data as $d) {
			unset($d['id_pegawai']);
			if ($d['nip'] == $this->input->post('nip')) {
				$tidaksama = false;
			}
		}
		if ($tidaksama) {
			$this->db->insert('pegawai', [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'nip' => $this->input->post('nip'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => $this->input->post('jabatan'),
				'bagian' => $this->input->post('bagian')
			]);
		} else {
			$this->session->set_flashdata('message', 'NIP yang diinputkan sudah ada');
			redirect('pegawai/addpegawaitu');
		}

	}

	public function addpegawaibkd(){

		$data = [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' => $this->input->post('nip'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'jabatan' => $this->input->post('jabatan'),
			'bagian' => $this->input->post('bagian')
		];

		$data = $this->pegawai->getallpegawai();
		$tidaksama = true;
		foreach ($data as $d) {
			unset($d['id_pegawai']);
			if ($d['nip'] == $this->input->post('nip')) {
				$tidaksama = false;
			}
		}
		if ($tidaksama) {
			$this->db->insert('pegawai', [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'nip' => $this->input->post('nip'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => $this->input->post('jabatan'),
				'bagian' => $this->input->post('bagian')
			]);
		} else {
			$this->session->set_flashdata('message', 'NIP yang diinputkan sudah ada');
			redirect('pegawai/addpegawaitu');
		}

	}

	public function addpegawaibka(){

		$data = [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' => $this->input->post('nip'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'jabatan' => $this->input->post('jabatan'),
			'bagian' => $this->input->post('bagian')
		];

		$data = $this->pegawai->getallpegawai();
		$tidaksama = true;
		foreach ($data as $d) {
			unset($d['id_pegawai']);
			if ($d['nip'] == $this->input->post('nip')) {
				$tidaksama = false;
			}
		}
		if ($tidaksama) {
			$this->db->insert('pegawai', [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'nip' => $this->input->post('nip'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'jabatan' => $this->input->post('jabatan'),
				'bagian' => $this->input->post('bagian')
			]);
		} else {
			$this->session->set_flashdata('message', 'NIP yang diinputkan sudah ada');
			redirect('pegawai/addpegawaitu');
		}

	}

	public function editpegawaitu($id){
		$nama_pegawai = $this->input->post('nama_pegawai');
		$nip = $this->input->post('nip');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');

		$this->db->set('nama_pegawai', $nama_pegawai);
		$this->db->set('nip', $nip);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('tanggal_lahir', $tanggal_lahir);
		$this->db->set('alamat', $alamat);
		$this->db->set('jabatan', $jabatan);
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');

	}

	public function editpegawaibkd($id){
		$nama_pegawai = $this->input->post('nama_pegawai');
		$nip = $this->input->post('nip');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');

		$this->db->set('nama_pegawai', $nama_pegawai);
		$this->db->set('nip', $nip);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('tanggal_lahir', $tanggal_lahir);
		$this->db->set('alamat', $alamat);
		$this->db->set('jabatan', $jabatan);
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');
	}

	public function editpegawaibka($id){
		$nama_pegawai = $this->input->post('nama_pegawai');
		$nip = $this->input->post('nip');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');

		$this->db->set('nama_pegawai', $nama_pegawai);
		$this->db->set('nip', $nip);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('tanggal_lahir', $tanggal_lahir);
		$this->db->set('alamat', $alamat);
		$this->db->set('jabatan', $jabatan);
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


