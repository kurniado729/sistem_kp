<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bka extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Bka_model', 'bka');
	}

	public function index()
	{
//		$data['title'] = 'Surat BKA';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['bka'] = $this->bka->suratbka();
//
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('bka/index', $data);
//		$this->load->view('templates/footer');

		//konfigurasi pagination
		$config['base_url'] = site_url('bka/index'); //site url
		$config['total_rows'] = $this->db->count_all('surat_disposisi'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = '&raquo;';
		$config['prev_link']        = '&laquo;';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = 'Surat BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['bka'] = $this->bka->pagsuratbka($config['per_page'], $data['page'] );
		$data['surat_disposisi_belum_spt'] = $this->bka->getbelumspt();
		$data['hitung_surat_disposisi_belum_spt'] = $this->bka->hitungbelumspt();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bka/index', $data);
		$this->load->view('templates/footer');
	}

	public function spt()
	{
//		$data['title'] = 'Surat Perintah Tugas';
//		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['spt'] = $this->bka->suratspt();
//
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('bka/spt', $data);
//		$this->load->view('templates/footer');

		//konfigurasi pagination
		$config['base_url'] = site_url('bka/spt'); //site url
		$config['total_rows'] = $this->db->count_all('surat_disposisi'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = '&raquo;';
		$config['prev_link']        = '&laquo;';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = 'Surat Perintah Tugas';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['spt'] = $this->bka->pagspt($config['per_page'], $data['page'] );
		$data['surat_disposisi_belum_ajukan_spt'] = $this->bka->getdisposisibelumajukanspt();
		$data['hitung_surat_disposisi_belum_ajukan_spt'] = $this->bka->hitungdisposisibelumajukanspt();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bka/spt', $data);
		$this->load->view('templates/footer');
	}

//	public function viewdisposisimail($id)
//	{
//
//		$data['title'] = 'Surat BKA';
////		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$this->bka->viewdisposisimail($id);
//
//		$data['disposisi_bka'] = $this->bka->getdetailsuratdisposisi($id);
//
//		$this->load->library('pdf');
//
//		$this->pdf->setPaper('A4', 'potrait');
//		$this->pdf->filename = $data['disposisi_bka']['id_surat_disposisi'];
//		$this->pdf->load_view('bka/disposisibka', $data);
//
//	}

	public function viewpersetujuandisposisi($id)
	{
		$this->bka->viewpersetujuandisposisi($id);
	}

	public function addsuratperintahjalan($id)
	{
		$data['title'] = 'Surat BKA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['bka'] = $this->bka->getdetailsuratdisposisi($id);
		$data['surat_disposisi_belum_spt'] = $this->bka->getbelumspt();
		$data['hitung_surat_disposisi_belum_spt'] = $this->bka->hitungbelumspt();

		$this->form_validation->set_rules('platform', 'Pegawai', 'required');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('bka/addsuratperintahjalan', $data);
			$this->load->view('templates/footer');
		}else{

			$this->bka->addsuratperintahjalan($id);
			$this->session->set_flashdata('message', 'SPT berhasil ditambahkan');
			redirect('bka');
		}

	}

//	public function viewsuratperintahkerja($id)
//	{
//
////		$data['title'] = BKD';
////		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//
//		$data['spk'] = $this->bka->getdetailsuratdisposisi($id);
//
//		$this->load->library('pdf');
//
//		$this->pdf->setPaper('A4', 'potrait');
//		$this->pdf->filename = $data['spk']['id_surat_disposisi'];
//		$this->pdf->load_view('bka/viewsuratperintahkerja', $data);
//
//	}

	public function action(){
		$inpText = $this->input->post('query');
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

	public function action2(){
		$nama = $this->input->post('nama');
		$data= $this->bka->getpegawai($nama);

		echo json_encode($data);
	}

	public function viewspt($id)
	{
		$this->bka->viewspt($id);
	}

	public function ajukanspt($id)
	{
		$this->bka->ajukanspt($id);
		$this->session->set_flashdata('message', 'SPT berhasil diajukan');
		redirect('bka/spt');
	}

	public function searchbka()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('bka');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat BKD';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['bka']= $this->bka->searchbka($kategori, $keyword);
			$data['surat_disposisi_belum_spt'] = $this->bka->getbelumspt();
			$data['hitung_surat_disposisi_belum_spt'] = $this->bka->hitungbelumspt();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bka/index', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('bka');
			}
		}
	}

	public function searchspt()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari surat disoisisi</div>');
			redirect('bka/spt');
		} else {
			$kategori = $this->input->post('kategori');
			$keyword = htmlspecialchars($this->input->post('keyword'));
			$data['title'] = 'Surat Perintah Tugas';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['spt']= $this->bka->searchspt($kategori, $keyword);
			$data['surat_disposisi_belum_ajukan_spt'] = $this->bka->getdisposisibelumajukanspt();
			$data['hitung_surat_disposisi_belum_ajukan_spt'] = $this->bka->hitungdisposisibelumajukanspt();

			if($data){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('bka/spt', $data);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata kunci dalam kategori tersebut tidak ditemukan</div>');
				redirect('bka/spt');
			}
		}
	}

}
