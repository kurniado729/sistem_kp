<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spt_model extends CI_Model
{
	public function pagpersetujuansptbkd($limit, $start)
	{
		$this->db->order_by('status', 'ASC');
		$this->db->order_by('file_spt_sudah_disetujui', 'ASC');
		$this->db->order_by('id_surat_spt', 'DESC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKD', 'status_pengajuan' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function pagpersetujuansptbka($limit, $start)
	{
		$this->db->order_by('status', 'ASC');
		$this->db->order_by('file_spt_sudah_disetujui', 'ASC');
		$this->db->order_by('id_surat_spt', 'DESC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKA', 'status_pengajuan' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function getuser()
	{
		$data = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		return $data->row_array();
	}

	public function getsptbkdbelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE  bagian = 'BKD' AND file_spt_sudah_disetujui IS NULL AND status_pengajuan = '1'";
		return $this->db->query($query)->result_array();
	}

	public function hitungsptbkdbelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND file_spt_sudah_disetujui IS NULL AND status_pengajuan = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsptbkabelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE  bagian = 'BKA' AND file_spt_sudah_disetujui IS NULL AND status_pengajuan = '1'";
		return $this->db->query($query)->result_array();
	}

	public function hitungsptbkabelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND file_spt_sudah_disetujui IS NULL AND status_pengajuan = '1'";
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
	public function viewspt($id){
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['spt']['id_surat_spt'];
		$this->pdf->load_view('surat_perintah_tugas/viewspt', $data);
	}

	public function acceptbkd($id){
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}

	public function rejectbkd($id){
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}

	public function acceptbka($id){
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}

	public function rejectbka($id){
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');

	}

	public function uploadsptbkd($id){
		$config ['upload_path'] = './assets/upload/spt';
		$config ['allowed_types'] = 'pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_spt')) {
			$this->session->set_flashdata('message', 'File yang diinputkan harus PDF');
			redirect('surat_perintah_tugas/uploadsptbkd/' . $id);
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
			$this->session->set_flashdata('message', 'File yang diinputkan harus PDF');
			redirect('surat_perintah_tugas/uploadsptbka/' . $id);
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_spt_sudah_disetujui', $file);
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}
	public function viewpersetujuanspt($id){
		$data['spt'] = $this->spt->getdetailspt($id);

		$file = $data['spt']['file_spt_sudah_disetujui'];

		$filename = "./assets/upload/spt/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}



}
