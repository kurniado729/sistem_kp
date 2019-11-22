<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrol_Spt extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Kontrol_Spt_model', 'kontrol');
	}

	public function index()
	{

		//konfigurasi pagination
		$config['base_url'] = site_url('kontrol_spt/index'); //site url
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

		$data['title'] = 'SPT BKD';
		$data['user'] = $this->kontrol->getuser();
		$data['spt'] = $this->kontrol->pagkontrolsptbkd($config['per_page'], $data['page'] );
		$data['spt_lengkap_bkd_belum_diupload'] = $this->kontrol->getsptlengkapbkdbelumdiupload();
		$data['hitung_spt_lengkap_bkd_belum_diupload'] = $this->kontrol->hitungsptlengkapbkdbelumdiupload();
		$data['pagination'] = $this->pagination->create_links();

		foreach ($data['spt'] as $s) {
			if ($s['status_telat'] == NULL) {
				if ($s['tgl_akhir_spt'] == date('d-m-Y')) {
					$this->kontrol->telat($s['id_surat_spt']);
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kontrol_spt/index', $data);
		$this->load->view('templates/footer');
	}

	public function kontrolsptbka()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('kontrol_spt/kontrolsptbka'); //site url
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

		$data['title'] = 'SPT BKA';
		$data['user'] = $this->kontrol->getuser();
		$data['spt'] = $this->kontrol->pagkontrolsptbka($config['per_page'], $data['page'] );
		$data['spt_lengkap_bka_belum_diupload'] = $this->kontrol->getsptlengkapbkabelumdiupload();
		$data['hitung_spt_lengkap_bka_belum_diupload'] = $this->kontrol->hitungsptlengkapbkabelumdiupload();
		$data['pagination'] = $this->pagination->create_links();

		foreach ($data['spt'] as $s) {
			if ($s['status_telat'] == NULL) {
				if ($s['tgl_akhir_spt'] == date('d-m-Y')) {
					$this->kontrol->telat($s['id_surat_spt']);
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kontrol_spt/kontrolsptbka', $data);
		$this->load->view('templates/footer');
	}

	public function viewspt($id)
	{
		$this->kontrol->viewspt($id);
	}

	public function viewpersetujuanspt($id)
	{
		$this->kontrol->viewpersetujuanspt($id);
	}

	public function uploadsptbkdlengkap($id)
	{
		$data['title'] = 'SPT BKD';
		$data['user'] = $this->kontrol->getuser();
		$data['spt'] = $this->kontrol->getdetailspt($id);
		$data['spt_lengkap_bkd_belum_diupload'] = $this->kontrol->getsptlengkapbkdbelumdiupload();
		$data['hitung_spt_lengkap_bkd_belum_diupload'] = $this->kontrol->hitungsptlengkapbkdbelumdiupload();

		$submit = $this->input->post('submit');

		if (!isset($submit)){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kontrol_spt/uploadsptlengkapbkd', $data);
			$this->load->view('templates/footer');
		} else {
			$this->kontrol->uploadsptlengkap($id);
			$this->session->set_flashdata('message', 'spt lengkap berhasil di upload');
			redirect('kontrol_spt');
		}
	}

	public function uploadsptbkalengkap($id)
	{
		$data['title'] = 'SPT BKA';
		$data['user'] = $this->kontrol->getuser();
		$data['spt'] = $this->kontrol->getdetailspt($id);
		$data['spt_lengkap_bka_belum_diupload'] = $this->kontrol->getsptlengkapbkabelumdiupload();
		$data['hitung_spt_lengkap_bka_belum_diupload'] = $this->kontrol->hitungsptlengkapbkabelumdiupload();

		$submit = $this->input->post('submit');

		if (!isset($submit)){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kontrol_spt/uploadsptlengkapbka', $data);
			$this->load->view('templates/footer');
		} else {
			$this->kontrol->uploadsptlengkap($id);
			$this->session->set_flashdata('message', 'spt lengkap berhasil di upload');
			redirect('kontrol_spt/kontrolsptbka');
		}
	}

	public function viewsptlengkap($id)
	{
		$this->kontrol->viewsptlengkap($id);
	}

	public function acceptsptbkdlengkap($id)
	{
		$this->kontrol->acceptsptbkdlengkap($id);
		$this->session->set_flashdata('message', 'spt tidak telat');
		redirect('kontrol_spt');
	}

	public function acceptsptbkalengkap($id)
	{
		$this->kontrol->acceptsptbkdlengkap($id);
		$this->session->set_flashdata('message', 'spt tidak telat');
		redirect('kontrol_spt/kontrolsptbka');
	}

	public function searchkontrolsptbkd()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('kontrol_spt');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'SPT BKD';
			$data['user'] = $this->kontrol->getuser();
			$data['spt']= $this->kontrol->searchkontrolsptbkd($kategori, $keyword);
			$data['spt_lengkap_bkd_belum_diupload'] = $this->kontrol->getsptlengkapbkdbelumdiupload();
			$data['hitung_spt_lengkap_bkd_belum_diupload'] = $this->kontrol->hitungsptlengkapbkdbelumdiupload();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('kontrol_spt/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('kontrol_spt');
			}
		}
	}

	public function searchkontrolsptbka()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('kontrol_spt/kontrolsptbka');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'SPT BKA';
			$data['user'] = $this->kontrol->getuser();
			$data['spt']= $this->kontrol->searchkontrolsptbka($kategori, $keyword);
			$data['spt_lengkap_bka_belum_diupload'] = $this->kontrol->getsptlengkapbkabelumdiupload();
			$data['hitung_spt_lengkap_bka_belum_diupload'] = $this->kontrol->hitungsptlengkapbkabelumdiupload();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('kontrol_spt/kontrolsptbka', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('kontrol_spt/kontrolsptbka');
			}
		}
	}
}
