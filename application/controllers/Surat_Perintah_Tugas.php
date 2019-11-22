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
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_perintah_tugas/index'); //site url
		$config['total_rows'] = $this->db->count_all('surat_spt'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = '&raquo;';
		$config['prev_link']        = '&laquo;';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = 'Persetujuan SPT BKD';
		$data['user'] = $this->spt->getuser();
		$data['spt'] = $this->spt->pagpersetujuansptbkd($config['per_page'], $data['page'] );
		$data['spt_bkd_belum_disetujui'] = $this->spt->getsptbkdbelumdisetujui();
		$data['hitung_spt_bkd_belum_disetujui'] = $this->spt->hitungsptbkdbelumdisetujui();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_perintah_tugas/index', $data);
		$this->load->view('templates/footer');
	}

	public function sptbka()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_perintah_tugas/sptbka'); //site url
		$config['total_rows'] = $this->db->count_all('surat_spt'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = '&raquo;';
		$config['prev_link']        = '&laquo;';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = 'Persetujuan SPT BKA';
		$data['user'] = $this->spt->getuser();
		$data['spt'] = $this->spt->pagpersetujuansptbka($config['per_page'], $data['page'] );
		$data['spt_bka_belum_disetujui'] = $this->spt->getsptbkabelumdisetujui();
		$data['hitung_spt_bka_belum_disetujui'] = $this->spt->hitungsptbkabelumdisetujui();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_perintah_tugas/sptbka', $data);
		$this->load->view('templates/footer');
	}

	public function viewspt($id)
	{
		$this->spt->viewspt($id);
	}

	public function acceptbkd($id)
	{
		$this->spt->acceptbkd($id);
		$this->session->set_flashdata('message', 'SPT berhasil disetujui');
		redirect('surat_perintah_tugas');
	}

	public function rejectbkd($id)
	{
		$this->spt->rejectbkd($id);
		$this->session->set_flashdata('message', 'SPT berhasil ditolak');
		redirect('surat_perintah_tugas');
	}

	public function acceptbka($id)
	{
		$this->spt->acceptbka($id);
		$this->session->set_flashdata('message', 'SPT berhasil disetujui');
		redirect('surat_perintah_tugas/sptbka');
	}

	public function rejectbka($id)
	{
		$this->spt->rejectbka($id);
		$this->session->set_flashdata('message', 'SPT berhasil diajukanditolak');
		redirect('surat_perintah_tugas/sptbka');
	}

	public function uploadsptbkd($id)
	{
		$data['title'] = 'Persetujuan SPT BKD';
		$data['user'] = $this->spt->getuser();
		$data['spt'] = $this->spt->getdetailspt($id);
		$data['spt_bka_belum_disetujui'] = $this->spt->getsptbkabelumdisetujui();
		$data['hitung_spt_bka_belum_disetujui'] = $this->spt->hitungsptbkabelumdisetujui();

		$submit = $this->input->post('submit');

		if (!isset($submit)){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_perintah_tugas/uploadsptbkd', $data);
			$this->load->view('templates/footer');
		} else {
			$this->spt->uploadsptbkd($id);
			$this->session->set_flashdata('message', 'persetujuan SPT berhasil diupload');
			redirect('surat_perintah_tugas');
		}
	}

	public function uploadsptbka($id)
	{
		$data['title'] = 'Persetujuan SPT BKA';
		$data['user'] = $this->spt->getuser();
		$data['spt'] = $this->spt->getdetailspt($id);
		$data['spt_bka_belum_disetujui'] = $this->spt->getsptbkabelumdisetujui();
		$data['hitung_spt_bka_belum_disetujui'] = $this->spt->hitungsptbkabelumdisetujui();

		$submit = $this->input->post('submit');

		if (!isset($submit)){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_perintah_tugas/uploadsptbka', $data);
			$this->load->view('templates/footer');
		} else {
			$this->spt->uploadsptbka($id);
			$this->session->set_flashdata('message', 'persetujuan SPT berhasil diupload');
			redirect('surat_perintah_tugas/sptbka');
		}
	}

	public function viewpersetujuanspt($id)
	{
		$this->spt->viewpersetujuanspt($id);
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
			$data['user'] = $this->spt->getuser();
			$data['spt']= $this->spt->searchpersetujuansptbkd($kategori, $keyword);
			$data['spt_bkd_belum_disetujui'] = $this->spt->getsptbkdbelumdisetujui();
			$data['hitung_spt_bkd_belum_disetujui'] = $this->spt->hitungsptbkdbelumdisetujui();

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
			$data['user'] = $this->spt->getuser();
			$data['spt']= $this->spt->searchpersetujuansptbka($kategori, $keyword);
			$data['spt_bka_belum_disetujui'] = $this->spt->getsptbkabelumdisetujui();
			$data['hitung_spt_bka_belum_disetujui'] = $this->spt->hitungsptbkabelumdisetujui();

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
