<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Perintah_Tugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Spt_model', 'spt');
	}

	public function index()
	{
		$data['title'] = 'Persetujuan SPT BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['spt'] = $this->spt->suratsptbkd();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_perintah_tugas/index', $data);
		$this->load->view('templates/footer');
	}

	public function sptbka()
	{
		$data['title'] = 'Persetujuan SPT BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['spt'] = $this->spt->suratsptbka();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_perintah_tugas/sptbka', $data);
		$this->load->view('templates/footer');
	}

	public function viewspt($id)
	{
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['spt']['id_surat_spt'];
		$this->pdf->load_view('surat_perintah_tugas/viewspt', $data);

	}

	public function acceptbkd($id)
	{
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your SPT has been accepted!</div>');
		redirect('surat_perintah_tugas');
	}

	public function rejectbkd($id)
	{
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your SPT has been rejected!</div>');
		redirect('surat_perintah_tugas');
	}

	public function acceptbka($id)
	{
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your SPT has been accepted!</div>');
		redirect('surat_perintah_tugas/sptbka');
	}

	public function rejectbka($id)
	{
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your SPT has been rejected!</div>');
		redirect('surat_perintah_tugas/sptbka');
	}

	public function formuploadsptbkd($id){
		$data['title'] = 'Persetujuan SPT BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_perintah_tugas/uploadsptbkd', $data);
		$this->load->view('templates/footer');
	}

	public function uploadsptbkd($id)
	{

		$data['title'] = 'Persetujuan SPT BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$config ['upload_path'] = './assets/upload/spt';
		$config ['allowed_types'] = 'doc|docx|gif|jpeg|jpg|pdf';
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

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New SPT has uploaded!</div>');
		redirect('surat_perintah_tugas');
	}

	public function formuploadsptbka($id){
		$data['title'] = 'Persetujuan SPT BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['spt'] = $this->spt->getdetailspt($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_perintah_tugas/uploadsptbka', $data);
		$this->load->view('templates/footer');
	}

	public function uploadsptbka($id)
	{

		$data['title'] = 'Persetujuan SPT BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$config ['upload_path'] = './assets/upload/spt';
		$config ['allowed_types'] = 'doc|docx|gif|jpeg|jpg|pdf';
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

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New SPT has uploaded!</div>');
		redirect('surat_perintah_tugas/sptbka');
	}

	public function viewpersetujuanspt($id)
	{
		$data['spt'] = $this->spt->getdetailspt($id);


		$file = $data['spt']['file_spt_sudah_disetujui'];

		$filename = "./assets/upload/spt/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}

	public function searchpersetujuansptbkd()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('surat_perintah_tugas');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Persetujuan SPT BKD';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['spt']= $this->spt->searchpersetujuansptbkd($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_perintah_tugas/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('surat_perintah_tugas');
			}
		}
	}

	public function searchpersetujuansptbka()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('surat_perintah_tugas/sptbka');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Persetujuan SPT BKA';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['spt']= $this->spt->searchpersetujuansptbka($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_perintah_tugas/sptbka', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('surat_perintah_tugas/sptbka');
			}
		}
	}

}
