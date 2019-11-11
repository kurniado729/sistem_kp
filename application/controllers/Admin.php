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
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//		$data['surat_masuk'] = $this->db->get_where('surat_masuk', ['hapus' => '0'])->result_array();
//		$data['pegawai_tu'] = $this->db->get_where('pegawai', ['hapus' => '0', 'bagian' => 'TU'])->result_array();
//		$data['pegawai_bkd'] = $this->db->get_where('pegawai', ['hapus' => '0', 'bagian' => 'BKD'])->result_array();
//		$data['pegawai_bka'] = $this->db->get_where('pegawai', ['hapus' => '0', 'bagian' => 'BKA'])->result_array();

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
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function addrole()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/addrole', $data);
			$this->load->view('templates/footer');
		}else{
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New role added!</div>');
			redirect('admin/role');
		}
	}

	public function roleaccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id ])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$role_id = $this->input->post('roleId');
		$menu_id = $this->input->post('menuId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);
		}else{
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access changed!</div>');
	}

	public function editrole($id)
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $id ])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editrole', $data);
			$this->load->view('templates/footer');
		}else{
			$role = $this->input->post('role');

			$this->db->set('role', $role);
			$this->db->where('id', $id);
			$this->db->update('user_role');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your role has been updated!</div>');
			redirect('admin/role');
		}

	}

	public function deleterole($id)
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $id ])->row_array();

//			$this->load->view('templates/header', $data);
//			$this->load->view('templates/sidebar', $data);
//			$this->load->view('templates/topbar', $data);
//			$this->load->view('menu/editmenu', $data);
//			$this->load->view('templates/footer');

		$this->db->where('id', $id);
		$this->db->delete('user_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your role has been deleted!</div>');
		redirect('admin/role');


	}

}
