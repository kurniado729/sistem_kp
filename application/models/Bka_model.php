<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bka_model extends CI_Model
{
	public function suratbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status = '1'";
		return $this->db->query($query)->result_array();
	}

	public function suratspt(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA'";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsuratdisposisi($id){
		$query = "SELECT * FROM surat_disposisi WHERE id_surat_disposisi = $id ";
		return $this->db->query($query)->row_array();
	}

	public function getpegawai($nama){
		$hasil = $this->db->query("SELECT * FROM pegawai WHERE bagian = 'BKA' AND nama_pegawai ='$nama'");
		return $hasil->result();
	}

	public function getdetailspt($id){
		$query = "SELECT * FROM surat_spt WHERE id_surat_spt = $id ";
		return $this->db->query($query)->row_array();
	}


}
