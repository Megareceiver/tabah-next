<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('Kelembagaan_model');
		$this->load->library('public_function');
		$this->load->helper(array('form', 'url'));
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

	public function add($target, $nomor_dokumen)
	{
		switch ($target) {
			case 'awal'			: $this->add_permohonan_awal($nomor_dokumen); break;
			case 'pencairan': $this->add_pencairan(); break;
			case 'pelaporan': $this->add_pelaporan(); break;

			default: break;
		}
	}

	public function add_permohonan_awal($nomor_dokumen)
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";

		$daftar_persyaratan = $this->Kelembagaan_model->get_persyaratan($nomor_dokumen, "permohonan_awal_persyaratan", "permohonan");
		$daftar_rab 				= $this->Kelembagaan_model->get_proposal_rab($nomor_dokumen, "permohonan_awal_rab");
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"form", "session_data"=>$SESSION));
		$this->load->view('lembaga/permohonan_awal_page', array("nomor_dokumen"=>$nomor_dokumen, "daftar_persyaratan"=>$daftar_persyaratan, "daftar_rab" => $daftar_rab));
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
		}else{
			$this->Kelembagaan_model->insert_entry("permohonan_awal_proposal");
		}

		redirect('../../../kelembagaan', 'refresh');
	}

	public function rab_awal($nomor_dokumen){
		if(empty($_POST)) return false;

		$_POST['nomor_dokumen'] = $nomor_dokumen;
		if(isset($_POST['kode_data']) && !empty($_POST['kode_data'])){
			$this->Kelembagaan_model->update_rab("permohonan_awal_rab");
		}else{
			$this->Kelembagaan_model->insert_rab("permohonan_awal_rab");
		}

		redirect('../../../../kelembagaan/add/awal/'.$nomor_dokumen, 'refresh');
	}

	public function get_info_proposal(){
		$nomor_dokumen = $_POST['nomor_dokumen'];
		$result 			 = $this->Kelembagaan_model->get_proposal_record("permohonan_awal_proposal",$nomor_dokumen);
		echo json_encode($result);
	}

	public function get_info_rab_item(){
		$kode_data = $_POST['kode_data'];
		$result 	 = $this->Kelembagaan_model->get_proposal_rab_by_kode("permohonan_awal_rab",$kode_data);
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

	public function delete_rab($target, $nomor_dokumen, $kode_data)
	{

		$_POST['nomor_dokumen'] = $nomor_dokumen;
		$_POST['kode_data'] 		= $kode_data;
		switch ($target) {
			case 'awal'			: $this->Kelembagaan_model->delete_rab("permohonan_awal_rab"); break;
			// case 'pencairan': $this->Kelembagaan_model->delete_rab_item("permohonan_awal_rab"); break;

			default: break;
		}

		redirect('../../../../../../kelembagaan/add/awal/'.$nomor_dokumen, 'refresh');
	}

	public function delete_persyaratan($target, $nomor_dokumen, $kode_data)
	{

		$_POST['nomor_dokumen'] = $nomor_dokumen;
		$_POST['kode_data'] 		= $kode_data;
		switch ($target) {
			case 'awal'			: $this->Kelembagaan_model->delete_rab("permohonan_awal_rab"); break;
			// case 'pencairan': $this->Kelembagaan_model->delete_rab_item("permohonan_awal_rab"); break;

			default: break;
		}

		redirect('../../../../../../kelembagaan/add/awal/'.$nomor_dokumen, 'refresh');
	}

	public function upload_persyaratan($target, $nomor_dokumen, $kode_data){
		$_POST['nomor_dokumen'] 		= $nomor_dokumen;
		$_POST['kode_persyaratan'] 	= $kode_data;
		switch ($target) {
			case 'awal'			:
				$file_name	= $nomor_dokumen."_".$kode_data;
				$file_path  = "./uploads/permohonan_awal/";
				if($this->upload($file_name, $file_path)){
					$_POST['berkas'] = $file_name.".pdf";
					$this->Kelembagaan_model->insert_persyaratan("permohonan_awal_persyaratan");
				}
			break;
			// case 'pencairan': $this->Kelembagaan_model->delete_rab_item("permohonan_awal_rab"); break;

			default: break;
		}

		redirect('../../../../../../kelembagaan/add/awal/'.$nomor_dokumen, 'refresh');
	}

	public function upload($file_name, $file_path){
		$config = array(
      'upload_path' => $file_path,
      'allowed_types' => "pdf",
      'overwrite' => TRUE,
      'max_size' => "2048000",
      'file_name' => $file_name
    );

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) return true;
		else return false;
	}

}
