<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkd extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Bkd_model', 'bkd');
	}

	public function index()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('bkd/index'); //site url
		$config['total_rows'] = $this->db->count_all('surat_disposisi'); //total row
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

		$data['title'] = 'Surat BKD';
		$data['bkd'] = $this->bkd->pagsuratbkd($config['per_page'], $data['page'] );
		$data['user'] = $this->bkd->getuser();
		//sini
		$data['surat_disposisi_belum_spt'] = $this->bkd->getbelumspt();
		$data['hitung_surat_disposisi_belum_spt'] = $this->bkd->hitungbelumspt();
		//sini
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bkd/index', $data);
		$this->load->view('templates/footer');
	}

	public function spt()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('bkd/spt'); //site url
		$config['total_rows'] = $this->db->count_all('surat_disposisi'); //total row
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

		$data['title'] = 'Surat Perintah Tugas';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['spt'] = $this->bkd->pagspt($config['per_page'], $data['page'] );
		$data['surat_disposisi_belum_ajukan_spt'] = $this->bkd->getdisposisibelumajukanspt();
		$data['hitung_surat_disposisi_belum_ajukan_spt'] = $this->bkd->hitungdisposisibelumajukanspt();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bkd/spt', $data);
		$this->load->view('templates/footer');
	}

	public function viewpersetujuandisposisi($id)
	{
		$this->bkd->viewpersetujuandisposisi($id);
	}

	public function addsuratperintahjalan($id)
	{
		$data['title'] = 'Surat BKD';
		$data['user'] = $this->bkd->getuser();
		$data['bkd'] = $this->bkd->getdetailsuratdisposisi($id);
		$data['surat_disposisi_belum_spt'] = $this->bkd->getbelumspt();
		$data['hitung_surat_disposisi_belum_spt'] = $this->bkd->hitungbelumspt();


		$this->form_validation->set_rules('platform', 'Pegawai', 'required');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('bkd/addsuratperintahjalan', $data);
			$this->load->view('templates/footer');
		}else{
			$this->bkd->addsuratperintahjalan($id);
			$this->session->set_flashdata('message', 'SPT berhasil ditambahkan');
			redirect('bkd');
		}

	}

	public function action(){
		$inpText = $this->input->post('query');
		$this->bkd->action($inpText);
	}

	public function action2(){
		$nama = $this->input->post('nama');
		$data= $this->bkd->getpegawai($nama);

		echo json_encode($data);
	}

	public function viewspt($id)
	{
		$this->bkd->viewspt($id);
	}

	public function ajukanspt($id){
		$this->bkd->ajukanspt($id);
		$this->session->set_flashdata('message', 'SPT berhasil diajukan');
		redirect('bkd/spt');
	}

	public function searchbkd()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('bkd');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat BKD';
			$data['user'] = $this->bkd->getuser();
			$data['bkd']= $this->bkd->searchbkd($kategori, $keyword);
			$data['surat_disposisi_belum_spt'] = $this->bkd->getbelumspt();
			$data['hitung_surat_disposisi_belum_spt'] = $this->bkd->hitungbelumspt();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bkd/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('bkd');
			}
		}
	}

	public function searchspt()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('bkd/spt');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat Perintah Tugas';
			$data['user'] = $this->bkd->getuser();
			$data['spt']= $this->bkd->searchspt($kategori, $keyword);
			$data['$surat_disposisi_belum_ajukan_spt'] = $this->bkd->getdisposisibelumajukanspt();
			$data['hitung_surat_disposisi_belum_ajukan_spt'] = $this->bkd->hitungdisposisibelumajukanspt();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bkd/spt', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('bkd/spt');
			}
		}
	}
}
