<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spt_model extends CI_Model
{
	public function suratsptbkd(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKD' AND status_pengajuan = '1'";
		return $this->db->query($query)->result_array();
	}

	public function suratsptbka(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '1'";
		return $this->db->query($query)->result_array();
	}

	public function getdetailspt($id){
		$query = "SELECT * FROM surat_spt WHERE id_surat_spt = $id ";
		return $this->db->query($query)->row_array();
	}


}
