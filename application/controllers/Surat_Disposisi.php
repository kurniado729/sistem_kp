<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Disposisi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Surat_Disposisi_model', 'surat_disposisi');
	}

	public function index()
	{
		$data['title'] = 'Persetujuan Disposisi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_disposisi'] = $this->surat_disposisi->getsuratdisposisi();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/index', $data);
		$this->load->view('templates/footer');
	}

	public function disposisibkd()
	{
		$data['title'] = 'Disposisi BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_disposisi'] = $this->surat_disposisi->getsuratdisposisibkd();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/disposisibkd', $data);
		$this->load->view('templates/footer');
	}

	public function disposisibka()
	{
		$data['title'] = 'Disposisi BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_disposisi'] = $this->surat_disposisi->getsuratdisposisibka();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/disposisibka', $data);
		$this->load->view('templates/footer');
	}

	public function disposisimail($id)
	{
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$pengirim = $data['surat_masuk']['pengirim'];
		$no_surat_masuk = $data['surat_masuk']['no_surat_masuk'];
		$tgl_surat_masuk = $data['surat_masuk']['tgl_surat_masuk'];
		$ringkasan = $data['surat_masuk']['ringkasan'];

		$this->db->insert('surat_disposisi', [
			'pengirim' => $pengirim,
			'no_surat_masuk' => $no_surat_masuk,
			'tgl_surat_masuk' => $tgl_surat_masuk,
			'ringkasan' => $ringkasan

		]);

		$this->db->set('disposisi', '1');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been created!</div>');
		redirect('surat_masuk');
	}

	public function disposisimailbkd($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('tujuan', 'BKD');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been created!</div>');
		redirect('surat_disposisi');
	}

	public function disposisimailbka($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('tujuan', 'BKA');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been created!</div>');
		redirect('surat_disposisi');
	}

	public function viewdisposisimail($id)
	{

//		$data['title'] = 'Disposisi BKD';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['surat_disposisi']['id_surat_disposisi'];
		$this->pdf->load_view('surat_disposisi/disposisi', $data);

	}

	public function formuploaddisposisibkd($id){
		$data['title'] = 'Disposisi BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/uploaddisposisibkd', $data);
		$this->load->view('templates/footer');
	}

	public function uploaddisposisibkd($id)
	{

		$data['title'] = 'Disposisi BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$config ['upload_path'] = './assets/upload/disposisi';
			$config ['allowed_types'] = 'doc|docx|gif|jpeg|jpg|pdf';
			$config ['max_size'] = 0;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file_surat_disposisi')) {
				echo $this->upload->display_errors();
			} else {
				$file = $this->upload->data('file_name');
			}

			$this->db->set('file_disposisi_sudah_disetujui', $file);
			$this->db->where('id_surat_disposisi', $id);
			$this->db->update('surat_disposisi');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Disposisi has uploaded!</div>');
			redirect('surat_disposisi/disposisibkd');
	}

	public function downloaddisposisibkd($id)
	{
		$this->load->helper('download');
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);
		if ($data['surat_disposisi']) {
			$surat = file_get_contents('./assets/upload/disposisi/' . $data['surat_disposisi']['file_disposisi_sudah_disetujui']);
		}
		$name = $data['surat_disposisi']['file_disposisi_sudah_disetujui'];

		force_download($name, $surat);
	}

	public function acceptbkd($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been accepted!</div>');
		redirect('surat_disposisi/disposisibkd');
	}

	public function rejectbkd($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been rejected!</div>');
		redirect('surat_disposisi/disposisibkd');
	}

	public function historydisposisibkd()
	{
		$data['title'] = 'History Disposisi BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_disposisi'] = $this->surat_disposisi->getshistorydisposisibkd();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/historydisposisibkd', $data);
		$this->load->view('templates/footer');
	}

	public function formuploaddisposisibka($id){
		$data['title'] = 'Disposisi BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/uploaddisposisibka', $data);
		$this->load->view('templates/footer');
	}

	public function uploaddisposisibka($id)
	{

		$data['title'] = 'Disposisi BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$config ['upload_path'] = './assets/upload/disposisi';
		$config ['allowed_types'] = 'doc|docx|gif|jpeg|jpg|pdf';
		$config ['max_size'] = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_surat_disposisi')) {
			echo $this->upload->display_errors();
		} else {
			$file = $this->upload->data('file_name');
		}

		$this->db->set('file_disposisi_sudah_disetujui', $file);
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Disposisi has uploaded!</div>');
		redirect('surat_disposisi/disposisibka');
	}

	public function downloaddisposisibka($id)
	{
		$this->load->helper('download');
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);
		if ($data['surat_disposisi']) {
			$surat = file_get_contents('./assets/upload/disposisi/' . $data['surat_disposisi']['file_disposisi_sudah_disetujui']);
		}
		$name = $data['surat_disposisi']['file_disposisi_sudah_disetujui'];

		force_download($name, $surat);
	}


	public function acceptbka($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '1');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been accepted!</div>');
		redirect('surat_disposisi/disposisibka');
	}

	public function rejectbka($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);

		$this->db->set('status', '0');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been rejected!</div>');
		redirect('surat_disposisi/disposisibka');
	}

	public function historydisposisibka()
	{
		$data['title'] = 'History Disposisi BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_disposisi'] = $this->surat_disposisi->getshistorydisposisibka();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/historydisposisibka', $data);
		$this->load->view('templates/footer');
	}

	public function viewpersetujuandisposisi($id)
	{
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);


		$file = $data['surat_disposisi']['file_disposisi_sudah_disetujui'];

		$filename = "./assets/upload/disposisi/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}
}
