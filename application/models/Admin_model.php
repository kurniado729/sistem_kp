<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function getuser(){
		$this->db->SELECT('*');
		$this->db->FROM('user');
		$this->db->WHERE('email', $this->session->userdata('email'));
		$data = $this->db->get();
		return $data->row_array();
	}

	public function getpegawaitu (){
		$query = "SELECT * FROM pegawai WHERE bagian = 'TU' AND hapus = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getpegawaibkd (){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKD' AND hapus = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getpegawaiBKA (){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKA' AND hapus = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getrole(){
		$query = "SELECT * FROM user_role";
		return $this->db->query($query)->result_array();
	}

	public function getdetailrole($id){
		$query = "SELECT * FROM user_role WHERE id = $id";
		return $this->db->query($query)->row_array();
	}

	public function getroleaccess($role_id){
		$query = "SELECT * FROM user_role where id = $role_id";
		return $this->db->query($query)->row_array();
	}

	public function getmenu(){
		$query = "SELECT * FROM user_menu WHERE id != 1";
		return $this->db->query($query)->result_array();
	}


	public function getsuratmasuk(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '0' ";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratmasuksudahdisposisi(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '0' AND disposisi = '1' ";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratmasukbelumdisposisi(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '0' AND disposisi = '0' ";
		return count($this->db->query($query)->result_array());
	}

	public function gettrash(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratbkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsudahsptbkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND status = '1' AND status_spt = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratbelumsptbkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND status = '1' AND status_spt = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsudahdiajukansptbkd(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratbelumdiajukansptbkd(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsudahsptbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status = '1' AND status_spt = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratbelumsptbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status = '1' AND status_spt = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsudahdiajukansptbka(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratbelumdiajukansptbka(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisi(){
		$query = "SELECT * FROM surat_disposisi";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibelumuploadbkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND file_disposisi_sudah_disetujui IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisisudahuploadbkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND file_disposisi_sudah_disetujui IS NOT NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisisudahsetujuibkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND file_disposisi_sudah_disetujui IS NOT NULL AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibelumsetujuibkd(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKD' AND file_disposisi_sudah_disetujui IS NOT NULL AND status = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibelumuploadbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND file_disposisi_sudah_disetujui IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisisudahuploadbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND file_disposisi_sudah_disetujui IS NOT NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisisudahsetujuibka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND file_disposisi_sudah_disetujui IS NOT NULL AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratdisposisibelumsetujuibka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND file_disposisi_sudah_disetujui IS NOT NULL AND status = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratspt(){
		$query = "SELECT * FROM surat_spt WHERE status_pengajuan = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkd(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbka(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdsudahdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NOT NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdbelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdsudahdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NOT NULL AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdbelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NOT NULL AND status = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkasudahdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NOT NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkabelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkasudahdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NOT NULL AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkabelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1' AND file_spt_sudah_disetujui IS NOT NULL AND status = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function addrole(){
		$this->db->insert('user_role', ['role' => $this->input->post('role')]);
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
	}

	public function editrole($id){
		$role = $this->input->post('role');

		$this->db->set('role', $role);
		$this->db->where('id', $id);
		$this->db->update('user_role');
	}

	public function deleterole($id){
		$this->db->where('id', $id);
		$this->db->delete('user_role');
	}




}
