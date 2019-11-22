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
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_disposisi/index'); //site url
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

		$data['title'] = 'Persetujuan Disposisi';
		$data['user'] = $this->surat_disposisi->getuser();
		$data['surat_disposisi'] = $this->surat_disposisi->pagpersetujuandisposisi($config['per_page'], $data['page'] );
		$data['surat_disposisi_belum_ditujukan'] = $this->surat_disposisi->getsuratdisposisibelumditujukan();
		$data['hitung_surat_disposisi_belum_ditujukan'] = $this->surat_disposisi->hitungsuratdisposisibelumditujukan();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/index', $data);
		$this->load->view('templates/footer');
	}

	public function disposisibkd()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_disposisi/disposisibkd'); //site url
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

		$data['title'] = 'Disposisi BKD';
		$data['user'] = $this->surat_disposisi->getuser();
		$data['surat_disposisi'] = $this->surat_disposisi->pagdisposisibkd($config['per_page'], $data['page'] );
		$data['surat_disposisi_bkd_belum_disetujui'] = $this->surat_disposisi->getsuratdisposisibkdbelumdisetujui();
		$data['hitung_surat_disposisi_bkd_belum_disetujui'] = $this->surat_disposisi->hitungsuratdisposisibkdbelumdisetujui();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/disposisibkd', $data);
		$this->load->view('templates/footer');
	}

	public function disposisibka()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_disposisi/disposisibka'); //site url
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

		$data['title'] = 'Disposisi BKA';
		$data['user'] = $this->surat_disposisi->getuser();
		$data['surat_disposisi'] = $this->surat_disposisi->pagdisposisibka($config['per_page'], $data['page'] );
		$data['surat_disposisi_bka_belum_disetujui'] = $this->surat_disposisi->getsuratdisposisibkabelumdisetujui();
		$data['hitung_surat_disposisi_bka_belum_disetujui'] = $this->surat_disposisi->hitungsuratdisposisibkabelumdisetujui();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_disposisi/disposisibka', $data);
		$this->load->view('templates/footer');
	}

//	public function disposisimail($id)
//	{
//		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
//
//		$pengirim = $data['surat_masuk']['pengirim'];
//		$no_surat_masuk = $data['surat_masuk']['no_surat_masuk'];
//		$tgl_surat_masuk = $data['surat_masuk']['tgl_surat_masuk'];
//		$ringkasan = $data['surat_masuk']['ringkasan'];
//
//		$this->db->insert('surat_disposisi', [
//			'pengirim' => $pengirim,
//			'no_surat_masuk' => $no_surat_masuk,
//			'tgl_surat_masuk' => $tgl_surat_masuk,
//			'ringkasan' => $ringkasan
//
//		]);
//
//		$this->db->set('disposisi', '1');
//		$this->db->where('id_surat_masuk', $id);
//		$this->db->update('surat_masuk');
//
//		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been created!</div>');
//		redirect('surat_masuk');
//	}

	public function disposisimailbkd($id)
	{

		$this->surat_disposisi->disposisimailbkd($id);
		$this->session->set_flashdata('message', 'surat masuk berhasil didisposisi ke bkd');
		redirect('surat_disposisi');
	}

	public function disposisimailbka($id)
	{

		$this->surat_disposisi->disposisimailbka($id);
		$this->session->set_flashdata('message', 'surat masuk berhasil didisposisi ke bka');
		redirect('surat_disposisi');
	}

	public function viewdisposisimail($id)
	{
		$this->surat_disposisi->viewdisposisimail($id);
	}

	public function uploaddisposisibkd($id)
	{
		$data['title'] = 'Disposisi BKD';
		$data['user'] = $this->surat_disposisi->getuser();
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);
		$data['surat_disposisi_bkd_belum_disetujui'] = $this->surat_disposisi->getsuratdisposisibkdbelumdisetujui();
		$data['hitung_surat_disposisi_bkd_belum_disetujui'] = $this->surat_disposisi->hitungsuratdisposisibkdbelumdisetujui();

		$submit = $this->input->post('submit');

		if (!isset($submit)){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_disposisi/uploaddisposisibkd', $data);
			$this->load->view('templates/footer');
		} else {
			$this->surat_disposisi->uploaddisposisibkd($id);
			$this->session->set_flashdata('message', 'persetujuan disposisi berhasil di upload');
			redirect('surat_disposisi/disposisibkd');
		}
	}

	public function acceptbkd($id)
	{
		$this->surat_disposisi->acceptbkd($id);
		$this->session->set_flashdata('message', 'disposisi berhasil disetujui');
		redirect('surat_disposisi/disposisibkd');
	}

	public function rejectbkd($id)
	{
		$this->surat_disposisi->rejectbkd($id);
		$this->session->set_flashdata('message', 'disposisi berhasil ditolak');
		redirect('surat_disposisi/disposisibkd');
	}

	public function uploaddisposisibka($id)
	{
		$data['title'] = 'Disposisi BKA';
		$data['user'] = $this->surat_disposisi->getuser();
		$data['surat_disposisi'] = $this->surat_disposisi->getdetailsuratdisposisi($id);
		$data['surat_disposisi_bka_belum_disetujui'] = $this->surat_disposisi->getsuratdisposisibkabelumdisetujui();
		$data['hitung_surat_disposisi_bka_belum_disetujui'] = $this->surat_disposisi->hitungsuratdisposisibkabelumdisetujui();

		$submit = $this->input->post('submit');

		if (!isset($submit)){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_disposisi/uploaddisposisibka', $data);
			$this->load->view('templates/footer');
		} else {
			$this->surat_disposisi->uploaddisposisibka($id);
			$this->session->set_flashdata('message', 'persetujuan disposisi berhasil di upload');
			redirect('surat_disposisi/disposisibka');
		}
	}

	public function acceptbka($id)
	{
		$this->surat_disposisi->acceptbka($id);
		$this->session->set_flashdata('message', 'disposisi berhasil disetujui');
		redirect('surat_disposisi/disposisibka');
	}

	public function rejectbka($id)
	{

		$this->surat_disposisi->rejectbka($id);
		$this->session->set_flashdata('message', 'disposisi berhasil ditolak');
		redirect('surat_disposisi/disposisibka');
	}

	public function viewpersetujuandisposisi($id)
	{
		$this->surat_disposisi->viewpersetujuandisposisi($id);
	}

	public function searchdisposisi()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('surat_disposisi');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Persetujuan Disposisi';
			$data['user'] = $this->surat_disposisi->getuser();
			$data['surat_disposisi']= $this->surat_disposisi->searchdisposisi($kategori, $keyword);
			$data['surat_disposisi_belum_ditujukan'] = $this->surat_disposisi->getsuratdisposisibelumditujukan();
			$data['hitung_surat_disposisi_belum_ditujukan'] = $this->surat_disposisi->hitungsuratdisposisibelumditujukan();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_disposisi/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('surat_disposisi');
			}
		}
	}

	public function searchdisposisibkd()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('surat_disposisi/disposisibkd');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Disposisi BKD';
			$data['user'] = $this->surat_disposisi->getuser();
			$data['surat_disposisi']= $this->surat_disposisi->searchdisposisibkd($kategori, $keyword);
			$data['surat_disposisi_bkd_belum_disetujui'] = $this->surat_disposisi->getsuratdisposisibkdbelumdisetujui();
			$data['hitung_surat_disposisi_bkd_belum_disetujui'] = $this->surat_disposisi->hitungsuratdisposisibkdbelumdisetujui();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_disposisi/disposisibkd', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('surat_disposisi/disposisibkd');
			}
		}
	}

	public function searchdisposisibka()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('surat_disposisi/disposisibka');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Disposisi BKA';
			$data['user'] = $this->surat_disposisi->getuser();
			$data['surat_disposisi']= $this->surat_disposisi->searchdisposisibka($kategori, $keyword);
			$data['surat_disposisi_bka_belum_disetujui'] = $this->surat_disposisi->getsuratdisposisibkabelumdisetujui();
			$data['hitung_surat_disposisi_bka_belum_disetujui'] = $this->surat_disposisi->hitungsuratdisposisibkabelumdisetujui();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_disposisi/disposisibka', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('surat_disposisi/disposisibka');
			}
		}
	}
}
