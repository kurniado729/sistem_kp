<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bka_model extends CI_Model
{
	public function pagsuratbka($limit, $start)
	{
		$this->db->order_by('status_spt', 'ASC');
		$this->db->order_by('id_surat_disposisi', 'DESC');
		$data = $this->db->get_where('surat_disposisi', ['tujuan' => 'BKA', 'status' => '1' ], $limit, $start);
		return $data->result_array();
	}

	public function pagspt($limit, $start)
	{
		$this->db->order_by('status_pengajuan', 'ASC');
		$this->db->order_by('id_surat_spt', 'DESC');
		$data = $this->db->get_where('surat_spt', ['bagian' => 'BKA'], $limit, $start);
		return $data->result_array();
	}

	public function getuser(){
		$this->db->SELECT('*');
		$this->db->FROM('user');
		$this->db->WHERE('email', $this->session->userdata('email'));
		$data = $this->db->get();
		return $data->row_array();
	}

	public function action($inpText){
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKA' AND nama_pegawai LIKE '%$inpText%'";
		$result = $this->db->query($query);

		if($result->num_rows() > 0){
			$row ['isi']= $result->result_array();
			foreach ($row['isi'] as $pegawai){
//				echo " <a href='#' id='kontol' class='pilihan list-group-item list-group-item-action border-1'>". $pegawai['nama_pegawai'] ."</a> ";
				echo "<option class='one-test-one'>". $pegawai['nama_pegawai'] ."</option>";
			}
			echo '<br/>';
		}else{
			echo "<option class='one-test-one'>No Record</option>";
		}
	}

	public function suratbka(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status = '1' ORDER BY status_spt";
		return $this->db->query($query)->result_array();
	}

	public function suratspt(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' ORDER BY status_pengajuan";
		return $this->db->query($query)->result_array();
	}

	public function getbelumspt(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status_spt = '0' AND status = '1'";
		return $this->db->query($query)->result_array();
	}

	public function hitungbelumspt(){
		$query = "SELECT * FROM surat_disposisi WHERE tujuan = 'BKA' AND status_spt = '0'  AND status = '1'";
		return count($this->db->query($query)->result_array());
	}

	public function getdisposisibelumajukanspt(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0'";
		return $this->db->query($query)->result_array();
	}

	public function hitungdisposisibelumajukanspt(){
		$query = "SELECT * FROM surat_spt WHERE bagian = 'BKA' AND status_pengajuan = '0'";
		return count($this->db->query($query)->result_array());
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

	public function searchbka($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_disposisi');
		$this->db->WHERE('tujuan', 'BKA');
		$this->db->WHERE('status', '1');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function searchspt($kategori, $keyword)
	{

		$this->db->SELECT('*');
		$this->db->FROM('surat_spt');
		$this->db->WHERE('bagian', 'BKA');

		if ($kategori == 'pengirim') {
			$this->db->LIKE('pengirim', $keyword);
		}
		else{
			$this->db->LIKE('no_surat_masuk', $keyword);
		}
		$data = $this->db->get();
		return $data->result_array();
	}

	public function viewpersetujuandisposisi($id){

		$data['bka'] = $this->bka->getdetailsuratdisposisi($id);

		$file = $data['bka']['file_disposisi_sudah_disetujui'];

		$filename = "./assets/upload/disposisi/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}

	public function addsuratperintahjalan($id){
		$data = [
			'pengirim' => $this->input->post('pengirim'),
			'no_surat_masuk' => $this->input->post('no_surat_masuk'),
			'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
			'tgl_akhir_spt' => $this->input->post('tgl_akhir_spt'),
			'ringkasan' => $this->input->post('ringkasan'),
			'nama_pegawai' => $this->input->post('platform'),
			'nip_pegawai' => $this->input->post('nip'),
			'jabatan' => $this->input->post('jabatan'),
			'bagian' => 'BKA'
		];


		$this->db->insert('surat_spt', $data);

		$this->db->set('status_spt', '1');
		$this->db->where('id_surat_disposisi', $id);
		$this->db->update('surat_disposisi');
	}

	public function viewspt($id){
		$data['spt'] = $this->bka->getdetailspt($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['spt']['id_surat_spt'];
		$this->pdf->load_view('bka/viewspt', $data);
	}

	public function ajukanspt($id){
		$data['spt'] = $this->bka->getdetailspt($id);

		$this->db->set('status_pengajuan', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');
	}


}
