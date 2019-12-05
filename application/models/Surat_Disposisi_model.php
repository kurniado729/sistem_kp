<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Disposisi_model extends CI_Model
{
	public function getuser()
	{
		$data = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		return $data->row_array();
	}

	public function pagpersetujuandisposisi($limit, $start)
	{
		$this->db->order_by('tujuan', 'ASC');
		$data = $this->db->get('surat_disposisi', $limit, $start);
		return $data->result_array();
	}

	public function pagdisposisibkd($limit, $start)
	{
		$this->db->order_by('status', 'ASC');
		$this->db->order_by('file_disposisi_sudah_disetujui', 'ASC');
		$this->db->order_by('id_surat_disposisi', 'DESC');
		$data = $this->db->get_where('surat_disposisi', ['tujuan' => 'BKD'], $limit, $start);
		return $data->result_array();
	}

	public function pagdisposisibka($limit, $start)
	{
		$this->db->order_by('status', 'ASC');
		$this->db->order_by('file_disposisi_sudah_disetujui', 'ASC');
		$this->db->order_by('id_surat_disposisi', 'DESC');
		$data = $this->db->get_where('surat_disposisi', ['tujuan' => 'BKA'], $limit, $start);
		return $data->result_array();
	}

	public function getsuratdisposisi(){
		$query = "SELECT * FROM surat_disposisi ORDER BY tujuan";
		return $this->db->query($query)->result_array();
	}

	public function getsuratdisposisibelumditujukan(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan IS NULL ";
		return $this->db->query($query)->result_array();
	}

	public function hitungsuratdisposisibelumditujukan(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan IS NULL ";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibkdbelumdisetujui(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND file_disposisi_sudah_disetujui IS NULL ";
		return $this->db->query($query)->result_array();
	}

	public function hitungsuratdisposisibkdbelumdisetujui(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND file_disposisi_sudah_disetujui IS NULL ";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibkabelumdisetujui(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND file_disposisi_sudah_disetujui IS NULL ";
		return $this->db->query($query)->result_array();
	}

	public function hitungsuratdisposisibkabelumdisetujui(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND file_disposisi_sudah_disetujui IS NULL ";
		return count($this->db->query($query)->result_array());
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

	public function disposisimailbkd($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('tujuan', 'BKD');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function disposisimailbka($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('tujuan', 'BKA');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function viewdisposisimail($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['surat_disposisi']['id_surat_disposisi'];
		$this->pdf->load_view('surat_disposisi/disposisi', $data);
	}

	public function uploaddisposisibkd($id){
		$config ['upload_path'] = './assets/upload/disposisi';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_disposisi')) {
			$this->session->set_flashdata('message', 'File yang diinputkan harus PDF');
			redirect('surat_disposisi/uploaddisposisibkd/' . $id);
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_disposisi_sudah_disetujui', $file);
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function acceptbkd($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function rejectbkd($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}


	public function uploaddisposisibka($id){
		$config ['upload_path'] = './assets/upload/disposisi';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_disposisi')) {
			$this->session->set_flashdata('message', 'File yang diinputkan harus PDF');
			redirect('surat_disposisi/uploaddisposisibka/' . $id);
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_disposisi_sudah_disetujui', $file);
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function acceptbka($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function rejectbka($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function viewpersetujuandisposisi($id){
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$file = $data['surat_disposisi']['file_disposisi_sudah_disetujui'];

		$filename = "./assets/upload/disposisi/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}

}

//$data['user'] = $this->user->getuser();
//$image_user = $data['user']['image'];
//


