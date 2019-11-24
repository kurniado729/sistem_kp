<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->user->getuser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->user->getuser();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		}else{
			$this->user->edit();
			$this->session->set_flashdata('message', 'user berhasil diedit');
			redirect('user');
		}

	}

	public function changepassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->user->getuser();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		}else{
			$this->user->changepassword();
			$this->session->set_flashdata('message', 'password berhasil diedit');
			redirect('user/changepassword');
		}

	}

}
