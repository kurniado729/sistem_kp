<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->admin->getuser();

		$data['pegawaitu'] = $this->admin->getpegawaitu();
		$data['pegawaibkd'] = $this->admin->getpegawaibkd();
		$data['pegawaibka'] = $this->admin->getpegawaibka();

		$data['surat_masuk'] = $this->admin->getsuratmasuk();
		$data['surat_masuk_sudah_disposisi'] = $this->admin->getsuratmasuksudahdisposisi();
		$data['surat_masuk_belum_disposisi'] = $this->admin->getsuratmasukbelumdisposisi();
		$data['trash'] = $this->admin->gettrash();

		$data['surat_bkd'] = $this->admin->getsuratbkd();
		$data['surat_sudah_spt_bkd'] = $this->admin->getsuratsudahsptbkd();
		$data['surat_belum_spt_bkd'] = $this->admin->getsuratbelumsptbkd();
		$data['surat_sudah_diajukan_spt_bkd'] = $this->admin->getsuratsudahdiajukansptbkd();
		$data['surat_belum_diajukan_spt_bkd'] = $this->admin->getsuratbelumdiajukansptbkd();

		$data['surat_bka'] = $this->admin->getsuratbka();
		$data['surat_sudah_spt_bka'] = $this->admin->getsuratsudahsptbka();
		$data['surat_belum_spt_bka'] = $this->admin->getsuratbelumsptbka();
		$data['surat_sudah_diajukan_spt_bka'] = $this->admin->getsuratsudahdiajukansptbka();
		$data['surat_belum_diajukan_spt_bka'] = $this->admin->getsuratbelumdiajukansptbka();

		$data['surat_disposisi'] = $this->admin->getsuratdisposisi();
		$data['surat_disposisi_bkd'] = $this->admin->getsuratdisposisibkd();
		$data['surat_disposisi_bkd_belum_upload'] = $this->admin->getsuratdisposisibelumuploadbkd();
		$data['surat_disposisi_bkd_sudah_upload'] = $this->admin->getsuratdisposisisudahuploadbkd();
		$data['surat_disposisi_bkd_sudah_disetujui'] = $this->admin->getsuratdisposisisudahsetujuibkd();
		$data['surat_disposisi_bkd_belum_disetujui'] = $this->admin->getsuratdisposisibelumsetujuibkd();
		$data['surat_disposisi_bka'] = $this->admin->getsuratdisposisibkd();
		$data['surat_disposisi_bka_belum_upload'] = $this->admin->getsuratdisposisibelumuploadbka();
		$data['surat_disposisi_bka_sudah_upload'] = $this->admin->getsuratdisposisisudahuploadbka();
		$data['surat_disposisi_bka_sudah_disetujui'] = $this->admin->getsuratdisposisisudahsetujuibka();
		$data['surat_disposisi_bka_belum_disetujui'] = $this->admin->getsuratdisposisibelumsetujuibka();

		$data['surat_spt'] = $this->admin->getsuratspt();
		$data['surat_spt_bkd'] = $this->admin->getsuratsptbkd();
		$data['surat_spt_bka'] = $this->admin->getsuratsptbka();
		$data['surat_spt_bkd_sudah_upload'] = $this->admin->getsuratsptbkdsudahdiupload();
		$data['surat_spt_bkd_belum_upload'] = $this->admin->getsuratsptbkdbelumdiupload();
		$data['surat_spt_bkd_sudah_disetujui'] = $this->admin->getsuratsptbkdsudahdisetujui();
		$data['surat_spt_bkd_belum_disetujui'] = $this->admin->getsuratsptbkdbelumdisetujui();
		$data['surat_spt_bka_sudah_upload'] = $this->admin->getsuratsptbkasudahdiupload();
		$data['surat_spt_bka_belum_upload'] = $this->admin->getsuratsptbkabelumdiupload();
		$data['surat_spt_bka_sudah_disetujui'] = $this->admin->getsuratsptbkasudahdisetujui();
		$data['surat_spt_bka_belum_disetujui'] = $this->admin->getsuratsptbkabelumdisetujui();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);

		if ($data['user']['role_id'] == '1'){
			$this->load->view('admin/index', $data);
		} elseif ($data['user']['role_id'] == '3'){
			$this->load->view('admin/index_tu', $data);
		}elseif ($data['user']['role_id'] == '4'){
			$this->load->view('admin/index_bkd', $data);
		}elseif ($data['user']['role_id'] == '5'){
			$this->load->view('admin/index_bka', $data);
		}elseif ($data['user']['role_id'] == '6'){
			$this->load->view('admin/index_kepala', $data);
		}else{
			var_dump('error');
		}
		$this->load->view('templates/footer', $data);
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->admin->getuser();
		$data['role'] = $this->admin->getrole();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function addrole()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->admin->getuser();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/addrole', $data);
			$this->load->view('templates/footer');
		}else{
			$this->admin->addrole();
			$this->session->set_flashdata('message', 'role berhasil ditambah');
			redirect('admin/role');
		}
	}

	public function roleaccess($role_id)
	{
		if($this->session->userdata('role_id') != '1'){
			redirect('auth/blocked');
		}

		$data['title'] = 'Role Access';
		$data['user'] = $this->admin->getuser();
		$data['role'] = $this->admin->getroleaccess($role_id);
		$data['menu'] = $this->admin->getmenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$this->admin->changeaccess();
		$this->session->set_flashdata('message', 'access berhasil diedit');
	}

	public function editrole($id)
	{
		$data['title'] = 'Role';
		$data['user'] = $this->admin->getuser();
		$data['role'] = $this->admin->getdetailrole($id);

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editrole', $data);
			$this->load->view('templates/footer');
		}else{
			$this->admin->editrole($id);
			$this->session->set_flashdata('message', 'role berhasil diedit');
			redirect('admin/role');
		}

	}

	public function deleterole($id)
	{
		$data['title'] = 'Role';
		$data['user'] = $this->admin->getuser();
		$data['role'] = $this->admin->getdetailrole($id);

		$this->admin->deleterole($id);
		$this->session->set_flashdata('message', 'role berhasil dihapus');
		redirect('admin/role');
	}

}
