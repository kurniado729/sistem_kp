<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrol_Spt_model extends CI_Model
{
	public function pagkontrolsptbkd($limit, $start)
	{
		$this->db->order_by('status_telat', 'ASC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKD', 'status_pengajuan' => '1', 'status' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function pagkontrolsptbka($limit, $start)
	{
		$this->db->order_by('file_spt_sudah_disetujui', 'ASC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKA', 'status_pengajuan' => '1', 'status' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function getuser()
	{
		$data = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		return $data->row_array();
	}

	public function getsptlengkapbkdbelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status = '1' AND file_spt_lengkap IS NULL";
		return $this->db->query($query)->result_array();
	}

	public function hitungsptlengkapbkdbelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status = '1' AND file_spt_lengkap IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsptlengkapbkabelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status = '1' AND file_spt_lengkap IS NULL";
		return $this->db->query($query)->result_array();
	}

	public function hitungsptlengkapbkabelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status = '1' AND file_spt_lengkap IS NULL";
		return count($this->db->query($query)->result_array());
	}


//	public function suratsptbkd(){
//		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0' ORDER BY file_spt_sudah_disetujui";
//		return $this->db->query($query)->result_array();
//	}
//
//	public function suratsptbka(){
//		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0' ORDER BY file_spt_sudah_disetujui";
//		return $this->db->query($query)->result_array();
//	}

	public function getdetailspt($id){
		$query = "SELECT * FROM surat_spt WHERE id_surat_spt = $id ";
		return $this->db->query($query)->row_array();
	}

	public function searchkontrolsptbkd($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_spt');
		$this->db->WHERE('bagian', 'BKD');
		$this->db->WHERE('status_pengajuan', '1');
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

	public function searchkontrolsptbka($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_spt');
		$this->db->WHERE('bagian', 'BKA');
		$this->db->WHERE('status_pengajuan', '1');
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

	public function viewspt($id){
		$data['spt'] = $this->kontrol->getdetailspt($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['spt']['id_surat_spt'];
		$this->pdf->load_view('surat_perintah_tugas/viewspt', $data);
	}

	public function uploadsptbkd($id){
		$config ['upload_path'] = './assets/upload/spt';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_spt')) {
			echo $this->upload->display_errors();
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_spt_sudah_disetujui', $file);
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}

	public function uploadsptbka($id){
		$config ['upload_path'] = './assets/upload/spt';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_spt')) {
			echo $this->upload->display_errors();
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_spt_sudah_disetujui', $file);
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}
	public function viewsptlengkap($id){
		$data['spt'] = $this->kontrol->getdetailspt($id);

		$file = $data['spt']['file_spt_lengkap'];

		$filename = "./assets/upload/sptlengkap/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}


	public function telat($id){
		$this->db->set('status_telat', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}

	public function uploadsptlengkap($id){
		$config ['upload_path'] = './assets/upload/sptlengkap';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_spt_lengkap')) {
			echo $this->upload->display_errors();
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_spt_lengkap', $file);
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}

	public function acceptsptbkdlengkap($id){
			$this->kontrol->getdetailspt($id);

			$this->db->set('status_telat', '0');
			$this->db->where('id_surat_spt', $id);
			$this->db->update('surat_spt');
	}


}
