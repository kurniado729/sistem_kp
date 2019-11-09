<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkd extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Bkd_model', 'bkd');
	}

	public function index()
	{
		$data['title'] = 'Surat BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['bkd'] = $this->bkd->suratbkd();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bkd/index', $data);
		$this->load->view('templates/footer');
	}

	public function spt()
	{
		$data['title'] = 'Surat Perintah Tugas';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['spt'] = $this->bkd->suratspt();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bkd/spt', $data);
		$this->load->view('templates/footer');
	}

	public function viewdisposisimail($id)
	{

		$data['title'] = 'Surat BKD';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['disposisi_bkd'] = $this->bkd->getdetailsuratdisposisi($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['disposisi_bkd']['id_surat_disposisi'];
		$this->pdf->load_view('bkd/disposisibkd', $data);

	}

	public function viewpersetujuandisposisi($id)
	{
		$data['bkd'] = $this->bkd->getdetailsuratdisposisi($id);


		$file = $data['bkd']['file_disposisi_sudah_disetujui'];

		$filename = "./assets/upload/disposisi/".$file;
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		readfile($filename);
	}

	public function addsuratperintahjalan($id)
	{
		$data['title'] = 'Surat BKD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['bkd'] = $this->bkd->getdetailsuratdisposisi($id);

		$this->form_validation->set_rules('platform', 'Pegawai', 'required');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('bkd/addsuratperintahjalan', $data);
			$this->load->view('templates/footer');
		}else{

			$data = [
				'pengirim' => $this->input->post('pengirim'),
				'no_surat_masuk' => $this->input->post('no_surat_masuk'),
				'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
				'ringkasan' => $this->input->post('ringkasan'),
				'nama_pegawai' => $this->input->post('platform'),
				'nip_pegawai' => $this->input->post('id'),
				'jabatan' => $this->input->post('jabatan'),
				'bagian' => 'BKD'
			];

			$this->db->insert('surat_spt', $data);

			$this->db->set('status_spt', '1');
			$this->db->where('id_surat_disposisi', $id);
			$this->db->update('surat_disposisi');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your SPT has been created!</div>');
			redirect('bkd');
		}

	}

	public function viewsuratperintahkerja($id)
	{

//		$data['title'] = BKD';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['spk'] = $this->bkd->getdetailsuratdisposisi($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['spk']['id_surat_disposisi'];
		$this->pdf->load_view('bkd/viewsuratperintahkerja', $data);

	}

	public function action(){
		$inpText = $this->input->post('query');
		$query = "SELECT * FROM pegawai WHERE bagian = 'BKD' AND nama_pegawai LIKE '%$inpText%'";
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

	public function action2(){
		$nama = $this->input->post('nama');
		$data= $this->bkd->getpegawai($nama);

		echo json_encode($data);
	}

	public function viewspt($id)
	{
		$data['spt'] = $this->bkd->getdetailspt($id);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $data['spt']['id_surat_spt'];
		$this->pdf->load_view('bkd/viewspt', $data);

	}

	public function ajukanspt($id){
		$data['spt'] = $this->bkd->getdetailspt($id);

		$this->db->set('status_pengajuan', '1');
		$this->db->where('id_surat_spt', $id);
		$this->db->update('surat_spt');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your SPT has been diajukan!</div>');
		redirect('bkd/spt');
	}

	public function searchbkd()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('bkd');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat BKD';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['bkd']= $this->bkd->searchbkd($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bkd/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('bkd');
			}
		}
	}

	public function searchspt()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('bkd/spt');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat Perintah Tugas';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['spt']= $this->bkd->searchspt($kategori, $keyword);

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bkd/spt', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('bkd/spt');
			}
		}
	}
}
