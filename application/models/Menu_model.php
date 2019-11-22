<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{

	public function pagmenu($limit, $start)
	{
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get('user_menu', $limit, $start);
		return $data->result_array();
	}

	public function pagsubmenu($limit, $start)
	{
//		$this->db->order_by('id', 'DESC');
//		$data = $this->db->get('user_sub_menu', $limit, $start);
//		return $data->result_array();

		$data = $this->db->select('*')
			->from('user_menu')
			->join('user_sub_menu', 'user_menu.id = user_sub_menu.menu_id')
			->limit($limit,$start)
			->get();
				return $data->result_array();
	}

	public function getuser(){
		$this->db->SELECT('*');
		$this->db->FROM('user');
		$this->db->WHERE('email', $this->session->userdata('email'));
		$data = $this->db->get();
		return $data->row_array();
	}

	public function getmenu(){
		$query = "SELECT * FROM user_menu ORDER BY id DESC";
		return $this->db->query($query)->result_array();
	}

	public function getdetailmenu($id){
		$query = "SELECT * FROM user_menu WHERE id = $id ";
		return $this->db->query($query)->row_array();
	}

	public function getsubmenu(){
		$query = "SELECT user_sub_menu.*, user_menu.menu
				FROM user_sub_menu JOIN user_menu
				ON user_sub_menu.menu_id = user_menu.id
				ORDER BY user_sub_menu.id DESC
				";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsubmenu($id){
		$query = "SELECT user_sub_menu.*, user_menu.menu
				FROM user_sub_menu JOIN user_menu
				ON user_sub_menu.menu_id = user_menu.id
				WHERE user_sub_menu.id = $id
				";
		return $this->db->query($query)->row_array();
	}
	public function searchmenu($kategori, $keyword)
	{
		$this->db->SELECT('*');
		$this->db->FROM('user_menu');
		if ($kategori == 'menu') {
			$this->db->LIKE('menu', $keyword);
		}
//		else{
//			$this->db->LIKE('cari', $keyword);
//		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchsubmenu($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('user_sub_menu');
		$this->db->JOIN('user_menu', 'user_sub_menu.menu_id = user_menu.id');

		if ($kategori == 'title') {
			$this->db->LIKE('user_sub_menu.title', $keyword);
		}
		else{
			$this->db->LIKE('user_menu.menu', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function addmenu(){
		$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
	}

	public function editmenu($id){
		$menu = $this->input->post('menu');
		$this->db->set('menu', $menu);
		$this->db->where('id', $id);
		$this->db->update('user_menu');
	}

	public function deletemenu($id){
		$this->db->where('id', $id);
		$this->db->delete('user_menu');
	}

	public function addsubmenu(){
		$data =[
			'title' => $this->input->post('title'),
			'menu_id' => $this->input->post('menu_id'),
			'url' => $this->input->post('url'),
			'icon' => $this->input->post('icon'),
			'is_active' => $this->input->post('is_active')

		];

		$this->db->insert('user_sub_menu', $data);
	}

	public function editsubmenu($id){
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
	}

	public function deletesubmenu($id){
		$this->db->where('id', $id);
		$this->db->delete('user_sub_menu');
	}

}
