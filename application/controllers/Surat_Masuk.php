<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Masuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Surat_Masuk_model', 'surat_masuk');
	}

	public function index()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_masuk/index'); //site url
		$config['total_rows'] = $this->db->count_all('surat_masuk'); //total row
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

		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->surat_masuk->getuser();
		$data['surat_masuk'] = $this->surat_masuk->pagsuratmasuk($config['per_page'], $data['page'] );

		//untuk pesan topbar
		$data['surat_masuk_belum_disposisi'] = $this->surat_masuk->getsuratmasukbelumdisposisi();
		$data['hitung_surat_masuk_belum_disposisi'] = $this->surat_masuk->hitungsuratmasukbelumdisposisi();
		//sampe sini

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_masuk/index', $data);
		$this->load->view('templates/footer');
	}

	public function trash()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('surat_masuk/trash'); //site url
		$config['total_rows'] = $this->db->count_all('surat_masuk'); //total row
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

		$data['title'] = 'Trash';
		$data['user'] = $this->surat_masuk->getuser();
		$data['trash'] = $this->surat_masuk->pagtrash($config['per_page'], $data['page'] );
		$data['surat_masuk_belum_disposisi'] = $this->surat_masuk->getsuratmasukbelumdisposisi();
		$data['hitung_surat_masuk_belum_disposisi'] = $this->surat_masuk->hitungsuratmasukbelumdisposisi();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_masuk/trash', $data);
		$this->load->view('templates/footer');
	}

	public function addmail()
	{

		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->surat_masuk->getuser();
		$data['surat_masuk_belum_disposisi'] = $this->surat_masuk->getsuratmasukbelumdisposisi();
		$data['hitung_surat_masuk_belum_disposisi'] = $this->surat_masuk->hitungsuratmasukbelumdisposisi();

		$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
		$this->form_validation->set_rules('no_surat_masuk', 'No Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_surat_masuk', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_masuk/addmail', $data);
			$this->load->view('templates/footer');
		} else {
			$this->surat_masuk->addmail();
			$this->session->set_flashdata('message', 'data surat masuk berhasil ditambahkan');
			redirect('surat_masuk');
		}

	}

	public function editmail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->surat_masuk->getuser();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
		$data['surat_masuk_belum_disposisi'] = $this->surat_masuk->getsuratmasukbelumdisposisi();
		$data['hitung_surat_masuk_belum_disposisi'] = $this->surat_masuk->hitungsuratmasukbelumdisposisi();

		$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
		$this->form_validation->set_rules('no_surat_masuk', 'No Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_surat_masuk', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_masuk/editmail', $data);
			$this->load->view('templates/footer');
		} else {
			$this->surat_masuk->editmail($id);
			$this->session->set_flashdata('message', 'data surat masuk berhasil diedit');
			redirect('surat_masuk');
		}

	}

	public function deletemail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->surat_masuk->getuser();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->surat_masuk->deletemail($id);
		$this->session->set_flashdata('message', 'data surat masuk berhasil dihapus');
		redirect('surat_masuk');
	}

	public function restoremail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->surat_masuk->getuser();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->surat_masuk->restoremail($id);
		$this->session->set_flashdata('message', 'data surat masuk berhasil direstore');
		redirect('surat_masuk/trash');
	}

	public function deletepermanentmail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->surat_masuk->getuser();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->surat_masuk->deletepermanentmail($id);
		$this->session->set_flashdata('message', 'data surat masuk berhasil dihapus permanen');
		redirect('surat_masuk/trash');
	}

//	public function downloadmail($id)
//	{
//
//		$this->load->helper('download');
//		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
//		if ($data['surat_masuk']) {
//			$surat = file_get_contents('./assets/upload/suratmasuk/' . $data['surat_masuk']['file_surat_masuk']);
//		}
//		$name = $data['surat_masuk']['file_surat_masuk'];
//
//		force_download($name, $surat);
//	}

//
//	public function submenu()
//	{
//		$data['title'] = 'SubMenu Management';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['submenu'] = $this->menu->getsubmenu();
//
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('menu/submenu', $data);
//		$this->load->view('templates/footer');
//	}
//
//	public function addsubmenu()
//	{
//
//		$data['title'] = 'SubMenu Management';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//		$data['menu'] = $this->menu->getmenu();
//
//		$this->form_validation->set_rules('title', 'Title', 'required');
//		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
//		$this->form_validation->set_rules('url', 'Url', 'required');
//		$this->form_validation->set_rules('icon', 'Icon', 'required');
//
//		if ($this->form_validation->run() == false) {
//			$this->load->view('templates/header', $data);
//			$this->load->view('templates/sidebar', $data);
//			$this->load->view('templates/topbar', $data);
//			$this->load->view('menu/addsubmenu', $data);
//			$this->load->view('templates/footer');
//		} else {
//			$data = [
//				'title' => $this->input->post('title'),
//				'menu_id' => $this->input->post('menu_id'),
//				'url' => $this->input->post('url'),
//				'icon' => $this->input->post('icon'),
//				'is_active' => $this->input->post('is_active')
//
//			];
//
//			$this->db->insert('user_sub_menu', $data);
//			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New sub menu added!</div>');
//			redirect('menu/submenu');
//		}
//
//	}
//
//	public function editsubmenu($id)
//	{
//		$data['title'] = 'SubMenu Management';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//		$data['submenu'] = $this->menu->getdetailsubmenu($id);
//		$data['menu'] = $this->menu->getmenu();
//
//		$this->form_validation->set_rules('title', 'Title', 'required');
//		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
//		$this->form_validation->set_rules('url', 'Url', 'required');
//		$this->form_validation->set_rules('icon', 'Icon', 'required');
//
//		if ($this->form_validation->run() == false) {
//			$this->load->view('templates/header', $data);
//			$this->load->view('templates/sidebar', $data);
//			$this->load->view('templates/topbar', $data);
//			$this->load->view('menu/editsubmenu', $data);
//			$this->load->view('templates/footer');
//		} else {
//			$title = $this->input->post('title');
//			$menu_id = $this->input->post('menu_id');
//			$url = $this->input->post('url');
//			$icon = $this->input->post('icon');
//			$is_active = $this->input->post('is_active');
//
//			$this->db->set('title', $title);
//			$this->db->set('menu_id', $menu_id);
//			$this->db->set('url', $url);
//			$this->db->set('menu_id', $menu_id);
//			$this->db->set('icon', $icon);
//			$this->db->set('is_active', $is_active);
//			$this->db->where('id', $id);
//			$this->db->update('user_sub_menu');
//
//			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your submenu has been updated!</div>');
//			redirect('menu/submenu');
//		}
//
//	}
//
//	public function deletesubmenu($id)
//	{
//		$data['title'] = 'SubMenu Management';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//		$data['submenu'] = $this->menu->getdetailsubmenu($id);
//
////		$this->load->view('templates/header', $data);
////		$this->load->view('templates/sidebar', $data);
////		$this->load->view('templates/topbar', $data);
////		$this->load->view('menu/deletesubmenu', $data);
////		$this->load->view('templates/footer');
//
//		$this->db->where('id', $id);
//		$this->db->delete('user_sub_menu');
//
//		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been deleted!</div>');
//		redirect('menu/submenu');
//
//
//	}

	public function disposisimail($id)
	{
		$this->surat_masuk->disposisimail($id);
		$this->session->set_flashdata('message', 'surat masuk berhasil didisposisi');
		redirect('surat_masuk');
	}

	public function viewmail($id)
	{
		$data['title'] = 'Surat Masuk';
		$this->surat_masuk->viewmail($id);
	}

	public function searchsuratmasuk()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari pegawai</div>');
			redirect('surat_masuk');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat Masuk';
			$data['user'] = $this->surat_masuk->getuser();
			$data['surat_masuk']= $this->surat_masuk->searchsuratmasuk($kategori, $keyword);
			$data['surat_masuk_belum_disposisi'] = $this->surat_masuk->getsuratmasukbelumdisposisi();
			$data['hitung_surat_masuk_belum_disposisi'] = $this->surat_masuk->hitungsuratmasukbelumdisposisi();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_masuk/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('pegawai');
			}
		}
	}

	public function searchtrash()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari pegawai</div>');
			redirect('surat_masuk');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Trash';
			$data['user'] = $this->surat_masuk->getuser();
			$data['trash']= $this->surat_masuk->searchtrash($kategori, $keyword);
			$data['surat_masuk_belum_disposisi'] = $this->surat_masuk->getsuratmasukbelumdisposisi();
			$data['hitung_surat_masuk_belum_disposisi'] = $this->surat_masuk->hitungsuratmasukbelumdisposisi();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('surat_masuk/trash', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('pegawai');
			}
		}
	}


}
