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
}
