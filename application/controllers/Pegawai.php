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
		//konfigurasi pagination
		$config['base_url'] = site_url('pegawai/index'); //site url
		$config['total_rows'] = $this->db->count_all('pegawai'); //total row
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

		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->pagpegawaitu($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/index', $data);
		$this->load->view('templates/footer');
	}

	public function pegawaibkd()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('pegawai/pegawaibkd'); //site url
		$config['total_rows'] = $this->db->count_all('pegawai'); //total row
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

		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->pagpegawaibkd($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/pegawaibkd', $data);
		$this->load->view('templates/footer');

	}

	public function pegawaibka()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('pegawai/pegawaibka'); //site url
		$config['total_rows'] = $this->db->count_all('pegawai'); //total row
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

		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->pagpegawaibka($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/pegawaibka', $data);
		$this->load->view('templates/footer');

	}

	public function trash()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('pegawai/trash'); //site url
		$config['total_rows'] = $this->db->count_all('pegawai'); //total row
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
		$data['user'] = $this->pegawai->getuser();
		$data['trash'] = $this->pegawai->pagtrash($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pegawai/trash', $data);
		$this->load->view('templates/footer');
	}

	public function addpegawaitu(){

		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->pegawai->getuser();

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/addpegawaitu', $data);
			$this->load->view('templates/footer');
		}else{

			$this->pegawai->addpegawaitu();
			$this->session->set_flashdata('message', 'data pegawai berhasil ditambahkan');
			redirect('pegawai');

		}

	}

	public function addpegawaibkd(){

		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->pegawai->getuser();

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/addpegawaibkd', $data);
			$this->load->view('templates/footer');
		}else{
			$this->pegawai->addpegawaibkd();
			$this->session->set_flashdata('message', 'data pegawai berhasil ditambahkan');
			redirect('pegawai/pegawaibkd');
		}

	}

	public function addpegawaibka(){

		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->pegawai->getuser();

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/addpegawaibka', $data);
			$this->load->view('templates/footer');
		}else{

			$this->pegawai->addpegawaibka();
			$this->session->set_flashdata('message', 'data pegawai berhasil ditambahkan');
			redirect('pegawai/pegawaibka');

		}

	}

	public function editpegawaitu($id)
	{
		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/editpegawaitu', $data);
			$this->load->view('templates/footer');
		}else{

			$this->pegawai->editpegawaitu($id);
			$this->session->set_flashdata('message', 'data pegawai berhasil diedit');
			redirect('pegawai');
		}

	}

	public function editpegawaibkd($id)
	{
		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/editpegawaibkd', $data);
			$this->load->view('templates/footer');
		}else{

			$this->pegawai->editpegawaibkd($id);
			$this->session->set_flashdata('message', 'data pegawai berhasil diedit');
			redirect('pegawai/pegawaibkd');
		}

	}

	public function editpegawaibka($id)
	{
		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->form_validation->set_rules('nama_pegawai', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pegawai/editpegawaibka', $data);
			$this->load->view('templates/footer');
		}else{

			$this->pegawai->editpegawaibka($id);
			$this->session->set_flashdata('message', 'data pegawai berhasil diedit');
			redirect('pegawai/pegawaibka');
		}

	}
	public function deletepegawaitu($id)
	{
		$data['title'] = 'Pegawai TU';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

			$this->pegawai->deletepegawaitu($id);
			$this->session->set_flashdata('message', 'data pegawai berhasil dihapus');
			redirect('pegawai');
	}

	public function deletepegawaibkd($id)
	{
		$data['title'] = 'Pegawai BKD';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->pegawai->deletepegawaibkd($id);
		$this->session->set_flashdata('message', 'data pegawai berhasil dihapus');
		redirect('pegawai/pegawaibkd');
	}

	public function deletepegawaibka($id)
	{
		$data['title'] = 'Pegawai BKA';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->pegawai->deletepegawaibka($id);
		$this->session->set_flashdata('message', 'data pegawai berhasil dihapus');
		redirect('pegawai/pegawaibka');
	}

	public function restorepegawai($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->pegawai->restorepegawai($id);
		$this->session->set_flashdata('message', 'data pegawai berhasil direstore');
		redirect('pegawai/trash');
	}

	public function deletepermanentpegawai($id)
	{
		$data['title'] = 'Surat Masuk';
		$data['user'] = $this->pegawai->getuser();
		$data['pegawai'] = $this->pegawai->getdetailpegawai($id);

		$this->pegawai->deletepermanentpegawai($id);
		$this->session->set_flashdata('message', 'data pegawai berhasil dihapus permanen');
		redirect('pegawai/trash');
	}

//	public function downloadmail($id){
//
//		$this->load->helper('download');
//		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
//		if($data['surat_masuk'])
//		{
//			$surat   = file_get_contents('./assets/upload/suratmasuk/'.$data['surat_masuk']['file_surat_masuk']);
//		}
//		$name   = $data['surat_masuk']['file_surat_masuk'];
//
//		force_download($name, $surat);
//	}


//	public function submenu()
//	{
//		$data['title'] = 'SubMenu Management';
//		$data['user'] = $this->pegawai->getuser();
//
//		$data['submenu'] = $this->menu->getsubmenu();
//
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('menu/submenu', $data);
//		$this->load->view('templates/footer');
//	}

//	public function addsubmenu(){
//
//		$data['title'] = 'SubMenu Management';
//		$data['user'] = $this->pegawai->getuser();
//		$data['menu'] = $this->menu->getmenu();
//
//		$this->form_validation->set_rules('title', 'Title', 'required');
//		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
//		$this->form_validation->set_rules('url', 'Url', 'required');
//		$this->form_validation->set_rules('icon', 'Icon', 'required');
//
//		if($this->form_validation->run() == false ){
//			$this->load->view('templates/header', $data);
//			$this->load->view('templates/sidebar', $data);
//			$this->load->view('templates/topbar', $data);
//			$this->load->view('menu/addsubmenu', $data);
//			$this->load->view('templates/footer');
//		}else{
//			$data =[
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
//		$data['user'] = $this->pegawai->getuser();
//		$data['submenu'] = $this->menu->getdetailsubmenu($id);
//		$data['menu'] = $this->menu->getmenu();
//
//		$this->form_validation->set_rules('title', 'Title', 'required');
//		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
//		$this->form_validation->set_rules('url', 'Url', 'required');
//		$this->form_validation->set_rules('icon', 'Icon', 'required');
//
//		if ($this->form_validation->run() == false ){
//			$this->load->view('templates/header', $data);
//			$this->load->view('templates/sidebar', $data);
//			$this->load->view('templates/topbar', $data);
//			$this->load->view('menu/editsubmenu', $data);
//			$this->load->view('templates/footer');
//		}else{
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
//		$data['user'] = $this->pegawai->getuser();
//		$data['submenu'] = $this->menu->getdetailsubmenu($id);
//
//		$this->db->where('id', $id);
//		$this->db->delete('user_sub_menu');
//
//		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been deleted!</div>');
//		redirect('menu/submenu');
//
//
//	}
//
//	public function disposisimail ($id){
//
//		$data['title'] = 'Surat Disposisi';
////		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['surat_masuk'] = $this->surat_masuk->getdetailsuratmasuk($id);
//
//		$this->load->library('pdf');
//
//		$this->pdf->setPaper('A4', 'potrait');
//		$this->pdf->filename = $data['surat_masuk']['file_surat_masuk'];
//		$this->pdf->load_view('surat_masuk/disposisi', $data);
//
//	}

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
