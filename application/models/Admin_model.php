<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
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
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NOT NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdbelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdsudahdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NOT NULL AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkdbelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NOT NULL AND status = '0'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkasudahdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NOT NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkabelumdiupload(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NULL";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkasudahdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NOT NULL AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getsuratsptbkabelumdisetujui(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0' AND file_spt_sudah_disetujui IS NOT NULL AND status = '0'";
		return count($this->db->query($query)->result_array());
	}




}
