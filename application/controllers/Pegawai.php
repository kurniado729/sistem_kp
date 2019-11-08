<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Pegawai_model', 'pegawai');
	}

	public function index()
	{
		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pegawai'] = $this->pegawai->getTU();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/index', $data);
		$this->load->view('templates/footer');
	}

	public function pegawaibkd()
	{
		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pegawai'] = $this->pegawai->getBKD();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/pegawaibkd', $data);
		$this->load->view('templates/footer');
	}

	public function pegawaibka()
	{
		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pegawai'] = $this->pegawai->getBKA();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/pegawaibka', $data);
		$this->load->view('templates/footer');
	}

	public function trash()
	{
		$data['title'] = 'Trash';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['trash'] = $this->pegawai->gettrash();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/trash', $data);
		$this->load->view('templates/footer');
	}

	public function addpegawaitu(){

		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/addpegawaitu', $data);
			$this->load->view('templates/footer');
		}else{
			$this->db->insert('pegawai', [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'bagian' => $this->input->post('bagian')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New pegawai added!</div>');
			redirect('pegawai');
		}

	}

	public function addpegawaibkd(){

		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/addpegawaibkd', $data);
			$this->load->view('templates/footer');
		}else{
			$this->db->insert('pegawai', [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'bagian' => $this->input->post('bagian')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New pegawai added!</div>');
			redirect('pegawai/pegawaibkd');
		}

	}

	public function addpegawaibka(){

		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/addpegawaibka', $data);
			$this->load->view('templates/footer');
		}else{
			$this->db->insert('pegawai', [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'bagian' => $this->input->post('bagian')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New pegawai added!</div>');
			redirect('pegawai/pegawaibka');
		}

	}

	public function editpegawaitu($id)
	{
		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/editpegawaitu', $data);
			$this->load->view('templates/footer');
		}else{
			$nama_pegawai = $this->input->post('nama_pegawai');

			$this->db->set('nama_pegawai', $nama_pegawai);
			$this->db->where('id_pegawai', $id);
			$this->db->update('pegawai');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been updated!</div>');
			redirect('pegawai');
		}

	}

	public function editpegawaibkd($id)
	{
		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/editpegawaibkd', $data);
			$this->load->view('templates/footer');
		}else{
			$nama_pegawai = $this->input->post('nama_pegawai');

			$this->db->set('nama_pegawai', $nama_pegawai);
			$this->db->where('id_pegawai', $id);
			$this->db->update('pegawai');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been updated!</div>');
			redirect('pegawai/pegawaibkd');
		}

	}

	public function editpegawaibka($id)
	{
		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/editpegawaibka', $data);
			$this->load->view('templates/footer');
		}else{
			$nama_pegawai = $this->input->post('nama_pegawai');

			$this->db->set('nama_pegawai', $nama_pegawai);
			$this->db->where('id_pegawai', $id);
			$this->db->update('pegawai');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been updated!</div>');
			redirect('pegawai/pegawaibka');
		}

	}
	public function deletepegawaitu($id)
	{
		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

			$this->db->set('hapus', '1');
			$this->db->where('id_pegawai', $id);
			$this->db->update('pegawai');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been deleted!</div>');
			redirect('pegawai');
	}

	public function deletepegawaibkd($id)
	{
		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->db->set('hapus', '1');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been deleted!</div>');
		redirect('pegawai/pegawaibkd');
	}

	public function deletepegawaibka($id)
	{
		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->db->set('hapus', '1');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been deleted!</div>');
		redirect('pegawai/pegawaibka');
	}

	public function restorepegawai($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->db->set('hapus', '0');
		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been restored!</div>');
		redirect('pegawai/trash');
	}

	public function deletepermanentpegawai($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your pegawai has been permanent deleted!</div>');
		redirect('pegawai/trash');
	}

	public function downloadmail($id){

		$this->load->helper('download');
		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
		if($data['surat_masuk'])
		{
			$surat   = file_get_contents('./assets/upload/suratmasuk/'.$data['surat_masuk']['file_surat_masuk']);
		}
		$name   = $data['surat_masuk']['file_surat_masuk'];

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

	public function addsubmenu(){

		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->menu->getmenu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/addsubmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$data =[
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

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templates/footer');
		}else{
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

	public function disposisimail ($id){

		$data['title'] = 'Surat Disposisi';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['surat_masuk']['file_surat_masuk'];
		$this->pdf->load_view('surat_masuk/disposisi', $data);

	}

	public function searchpegawaitu()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari pegawai</div>');
			redirect('pegawai');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Pegawai TU';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['pegawai']= $this->pegawai->searchpegawaitu($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('pegawai');
			}
		}
	}

	public function searchpegawaibkd()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari pegawai</div>');
			redirect('pegawai');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Pegawai BKD';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['pegawai']= $this->pegawai->searchpegawaibkd($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/pegawaibkd', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('pegawai/pegawaibkd');
			}
		}
	}

	public function searchpegawaibka()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari pegawai</div>');
			redirect('pegawai');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Pegawai BKA';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['pegawai']= $this->pegawai->searchpegawaibka($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/pegawaibka', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('pegawai/pegawaibka');
			}
		}
	}

	public function searchtrash()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari pegawai</div>');
			redirect('pegawai');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Trash';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['trash']= $this->pegawai->searchtrash($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('pegawai/trash', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('pegawai/trash');
			}
		}
	}


}
