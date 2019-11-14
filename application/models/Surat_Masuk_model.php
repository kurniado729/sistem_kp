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

	public function addmail(){
		$config ['upload_path'] = './assets/upload/suratmasuk';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_masuk')) {
			echo $this->upload->display_errors();
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->insert('surat_masuk', [
			'file_surat_masuk' => $file,
			'pengirim' => $this->input->post('pengirim'),
			'no_surat_masuk' => $this->input->post('no_surat_masuk'),
			'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
			'ringkasan' => $this->input->post('ringkasan'),
			'disposisi' => '0',
			'hapus' => '0'
		]);
	}

	public function editmail($id){
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = '2048';
		$config ['upload_path'] = './assets/upload/suratmasuk/';

		$this->load->library('upload', $config);

		$data = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id]);
		foreach($data->result_array() AS $sm) {
			$file = $sm['file_surat_masuk'];
		}

		if ($this->upload->do_upload('file_surat_masuk')) {
			$surat_lama = $file;
			if ($surat_lama) {
				unlink(FCPATH . 'assets/upload/suratmasuk/' . $surat_lama);
			}

			$file_surat_masuk = $this->upload->data('file_name');
			$this->db->set('file_surat_masuk', $file_surat_masuk);

		} else {
			echo $this->upload->display_errors();
		}

		$pengirim = $this->input->post('pengirim');
		$no_surat_masuk = $this->input->post('no_surat_masuk');
		$tgl_surat_masuk = $this->input->post('tgl_surat_masuk');
		$ringkasan = $this->input->post('ringkasan');

		$this->db->set('pengirim', $pengirim);
		$this->db->set('no_surat_masuk', $no_surat_masuk);
		$this->db->set('tgl_surat_masuk', $tgl_surat_masuk);
		$this->db->set('ringkasan', $ringkasan);
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');
	}

	public function deletemail($id){
		$this->db->set('hapus', '1');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');
	}

	public function restoremail($id){
		$this->db->set('hapus', '0');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');
	}

	public function deletepermanentmail($id){
		$this->db->where('id_surat_masuk', $id);
		$this->db->delete('surat_masuk');
	}

	public function disposisimail($id){
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$pengirim = $data['surat_masuk']['pengirim'];
		$no_surat_masuk = $data['surat_masuk']['no_surat_masuk'];
		$tgl_surat_masuk = $data['surat_masuk']['tgl_surat_masuk'];
		$ringkasan = $data['surat_masuk']['ringkasan'];

		$this->db->insert('surat_disposisi', [
			'pengirim' => $pengirim,
			'no_surat_masuk' => $no_surat_masuk,
			'tgl_surat_masuk' => $tgl_surat_masuk,
			'ringkasan' => $ringkasan,
			'tujuan' => NULL

		]);

		$this->db->set('disposisi', '1');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');
	}

	public function viewmail($id){
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);


		$file = $data['surat_masuk']['file_surat_masuk'];

		$filename = "./assets/upload/suratmasuk/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}

}
