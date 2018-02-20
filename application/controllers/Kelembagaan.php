<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Kelembagaan_model');
				$this->load->library('public_function');
  }


	public function index()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$params = array(
			"page_option"	=> "index",
			"session_data"=> $SESSION,
			"button_add"	=> array("state"=>true, "url"=>"#form-awal"),
			"data"				=> $this->Kelembagaan_model->get_last_entries("permohonan_awal_proposal")
		);

		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', $params);
		$this->load->view('lembaga/beranda_page', $params);
		$this->load->view('public/content_footer');
	}

	public function riwayat()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"riwayat", "session_data"=>$SESSION));
		$this->load->view('lembaga/riwayat_page');
		$this->load->view('public/content_footer');
	}

	public function notifikasi()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"riwayat", "session_data"=>$SESSION));
		$this->load->view('lembaga/notifikasi_page');
		$this->load->view('public/content_footer');
	}

	public function add($target)
	{
		switch ($target) {
			case 'awal'			: $this->add_permohonan_awal(); break;
			case 'pencairan': $this->add_pencairan(); break;
			case 'pelaporan': $this->add_pelaporan(); break;

			default: break;
		}
	}

	public function add_permohonan_awal()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"form", "session_data"=>$SESSION));
		$this->load->view('lembaga/permohonan_awal_page');
		$this->load->view('public/content_footer');
	}

	public function add_pencairan()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"form", "session_data"=>$SESSION));
		$this->load->view('lembaga/permohonan_pencairan_page');
		$this->load->view('public/content_footer');
	}

	public function add_pelaporan()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"form", "session_data"=>$SESSION));
		$this->load->view('lembaga/beranda_page');
		$this->load->view('public/content_footer');
	}


	//insert
	public function draft_awal(){
		if(empty($_POST)) return false;

		if(isset($_POST['nomor_dokumen']) && !empty($_POST['nomor_dokumen'])){
			$this->Kelembagaan_model->update_entry("permohonan_awal_proposal");
			redirect('../../../kelembagaan', 'refresh');
		}else{
			$this->Kelembagaan_model->insert_entry("permohonan_awal_proposal");
			redirect('../../../kelembagaan', 'refresh');
		}
	}

	public function get_info_proposal(){
		$nomor_dokumen = $_POST['nomor_dokumen'];
		$result 			 = $this->Kelembagaan_model->get_proposal_record("permohonan_awal_proposal",$nomor_dokumen);
		echo json_encode($result);
	}

	public function send($target, $nomor_dokumen)
	{
		$_POST['nomor_dokumen'] = $nomor_dokumen;
		switch ($target) {
			case 'awal'			: $this->Kelembagaan_model->send_proposal("permohonan_awal_proposal"); break;
			// case 'pencairan': $this->Kelembagaan_model->send_proposal("permohonan_awal_proposal"); break;

			default: break;
		}

		redirect('../../../../../kelembagaan', 'refresh');
	}

	public function delete($target, $nomor_dokumen)
	{
		$_POST['nomor_dokumen'] = $nomor_dokumen;
		switch ($target) {
			case 'awal'			: $this->Kelembagaan_model->delete_proposal("permohonan_awal_proposal"); break;
			// case 'pencairan': $this->Kelembagaan_model->send_proposal("permohonan_awal_proposal"); break;

			default: break;
		}

		redirect('../../../../../kelembagaan', 'refresh');
	}

}
