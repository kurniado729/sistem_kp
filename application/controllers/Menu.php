<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('menu/index'); //site url
		$config['total_rows'] = $this->db->count_all('user_menu'); //total row
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

		$data['title'] = 'Menu Management';
		$data['user'] = $this->menu->getuser();
		$data['menu'] = $this->menu->pagmenu($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');


	}

	public function addmenu(){

		$data['title'] = 'Menu Management';
		$data['user'] = $this->menu->getuser();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/addmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$this->menu->addmenu();
			$this->session->set_flashdata('message', 'data menu berhasil ditambahkan');
			redirect('menu');
		}

	}

	public function editmenu($id)
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->menu->getuser();
		$data['menu'] = $this->menu->getdetailmenu($id);

		$this->form_validation->set_rules('menu', 'Menu', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$this->menu->editmenu($id);
			$this->session->set_flashdata('message', 'data menu berhasil diedit');
			redirect('menu');
		}

	}

	public function deletemenu($id)
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->menu->getuser();
		$data['menu'] = $this->menu->getdetailmenu($id);

		$this->menu->deletemenu($id);
		$this->session->set_flashdata('message', 'data menu berhasil dihapus');
		redirect('menu');
	}


	public function submenu()
	{
		$config['base_url'] = site_url('menu/submenu'); //site url
		$config['total_rows'] = $this->db->count_all('user_sub_menu'); //total row
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

		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->menu->getuser();
		$data['submenu'] = $this->menu->pagsubmenu($config['per_page'], $data['page'] );
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('templates/footer');
	}

	public function addsubmenu(){

		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->menu->getuser();
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
			$this->menu->addsubmenu();
			$this->session->set_flashdata('message', 'data submenu berhasil ditambah');
			redirect('menu/submenu');
		}

	}

	public function editsubmenu($id)
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->menu->getuser();
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
			$this->menu->editsubmenu($id);
			$this->session->set_flashdata('message', 'data submenu berhasil diedit');
			redirect('menu/submenu');
		}

	}

	public function deletesubmenu($id)
{
	$data['title'] = 'SubMenu Management';
	$data['user'] = $this->menu->getuser();

	$this->menu->deletesubmenu($id);

	$this->session->set_flashdata('message', 'data submenu berhasil dihapus');
	redirect('menu/submenu');
}

	public function searchmenu()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari menu</div>');
			redirect('menu');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Menu Management';
			$data['user'] = $this->menu->getuser();
			$data['menu']= $this->menu->searchmenu($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('menu');
			}
		}
	}

	public function searchsubmenu()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari submenu</div>');
			redirect('submenu');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'SubMenu Management';
			$data['user'] = $this->menu->getuser();
			$data['submenu']= $this->menu->searchsubmenu($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/submenu', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('menu');
			}
		}
	}


}
