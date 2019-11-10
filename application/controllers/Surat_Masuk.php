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
//		$data['title'] = 'Surat Masuk';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['surat_masuk'] = $this->surat_masuk->getsuratmasuk();
//
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('surat_masuk/index', $data);
//		$this->load->view('templates/footer');

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
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_masuk'] = $this->surat_masuk->pagsuratmasuk($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('surat_masuk/index', $data);
		$this->load->view('templates/footer');
	}

	public function trash()
	{
//		$data['title'] = 'Trash';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['trash'] = $this->surat_masuk->gettrash();
//
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('surat_masuk/trash', $data);
//		$this->load->view('templates/footer');

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
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['trash'] = $this->surat_masuk->pagtrash($config['per_page'], $data['page'] );
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
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('no_surat_masuk', 'No Surat', 'required');
		$this->form_validation->set_rules('tgl_surat_masuk', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_masuk/addmail', $data);
			$this->load->view('templates/footer');
		} else {
			$config ['upload_path'] = './assets/upload/suratmasuk';
			$config ['allowed_types'] = 'doc|docx|gif|jpeg|jpg|pdf';
			$config ['max_size'] = 0;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file_surat_masuk')) {
				echo $this->upload->display_errors();
			} else {
				$file = $this->upload->data('file_name');
			}

			$this->db->insert('surat_masuk', [
				'file_surat_masuk' => $file,
				'pengirim' => $this->input->post('pengirim'),
				'no_surat_masuk' => $this->input->post('no_surat_masuk'),
				'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
				'ringkasan' => $this->input->post('ringkasan'),
				'disposisi' => '0',
				'hapus' => '0'
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Mail added!</div>');
			redirect('surat_masuk');
		}

	}

	public function editmail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('no_surat_masuk', 'No Surat', 'required');
		$this->form_validation->set_rules('tgl_surat_masuk', 'Tanggal Surat', 'required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('surat_masuk/editmail', $data);
			$this->load->view('templates/footer');
		} else {

			$config ['allowed_types'] = 'doc|docx|gif|jpeg|jpg|pdf|';
			$config ['max_size'] = '2048';
			$config ['upload_path'] = './assets/upload/suratmasuk/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file_surat_masuk')) {
				$surat_lama = $data['surat_masuk']['file_surat_masuk'];
				if ($surat_lama) {
					unlink(FCPATH . 'assets/upload/suratmasuk/' . $surat_lama);
				}

				$file_surat_masuk = $this->upload->data('file_name');
				$this->db->set('file_surat_masuk', $file_surat_masuk);

			} else {
				echo $this->upload->display_errors();
			}

			$pengirim = $this->input->post('pengirim');
			$no_surat_masuk = $this->input->post('no_surat_masuk');
			$tgl_surat_masuk = $this->input->post('tgl_surat_masuk');
			$ringkasan = $this->input->post('ringkasan');

			$this->db->set('pengirim', $pengirim);
			$this->db->set('no_surat_masuk', $no_surat_masuk);
			$this->db->set('tgl_surat_masuk', $tgl_surat_masuk);
			$this->db->set('ringkasan', $ringkasan);
			$this->db->where('id_surat_masuk', $id);
			$this->db->update('surat_masuk');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been updated!</div>');
			redirect('surat_masuk');
		}

	}

	public function deletemail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->db->set('hapus', '1');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been deleted!</div>');
		redirect('surat_masuk');
	}

	public function restoremail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->db->set('hapus', '0');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been restored!</div>');
		redirect('surat_masuk/trash');
	}

	public function deletepermanentmail($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->db->where('id_surat_masuk', $id);
		$this->db->delete('surat_masuk');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been permanent deleted!</div>');
		redirect('surat_masuk/trash');
	}

	public function downloadmail($id)
	{

		$this->load->helper('download');
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
		if ($data['surat_masuk']) {
			$surat = file_get_contents('./assets/upload/suratmasuk/' . $data['surat_masuk']['file_surat_masuk']);
		}
		$name = $data['surat_masuk']['file_surat_masuk'];

		force_download($name, $surat);
	}


	public function submenu()
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['submenu'] = $this->menu->getsubmenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('templates/footer');
	}

	public function addsubmenu()
	{

		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->menu->getmenu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/addsubmenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')

			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New sub menu added!</div>');
			redirect('menu/submenu');
		}

	}

	public function editsubmenu($id)
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->menu->getdetailsubmenu($id);
		$data['menu'] = $this->menu->getmenu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templates/footer');
		} else {
			$title = $this->input->post('title');
			$menu_id = $this->input->post('menu_id');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is_active = $this->input->post('is_active');

			$this->db->set('title', $title);
			$this->db->set('menu_id', $menu_id);
			$this->db->set('url', $url);
			$this->db->set('menu_id', $menu_id);
			$this->db->set('icon', $icon);
			$this->db->set('is_active', $is_active);
			$this->db->where('id', $id);
			$this->db->update('user_sub_menu');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your submenu has been updated!</div>');
			redirect('menu/submenu');
		}

	}

	public function deletesubmenu($id)
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->menu->getdetailsubmenu($id);

//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('menu/deletesubmenu', $data);
//		$this->load->view('templates/footer');

		$this->db->where('id', $id);
		$this->db->delete('user_sub_menu');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been deleted!</div>');
		redirect('menu/submenu');


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
			'ringkasan' => $ringkasan,
			'tujuan' => NULL

		]);

		$this->db->set('disposisi', '1');
		$this->db->where('id_surat_masuk', $id);
		$this->db->update('surat_masuk');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail disposisi has been created!</div>');
		redirect('surat_masuk');
	}

	public function viewmail($id)
	{
		$data['title'] = 'Surat Masuk';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);


		$file = $data['surat_masuk']['file_surat_masuk'];

		$filename = "./assets/upload/suratmasuk/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);


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
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['surat_masuk']= $this->surat_masuk->searchsuratmasuk($kategori, $keyword);

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
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['trash']= $this->surat_masuk->searchtrash($kategori, $keyword);

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
