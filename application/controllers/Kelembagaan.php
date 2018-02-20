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
			"page_option"								 			=> "index",
			"session_data"							 			=> $SESSION,
			"button_add"								 			=> array("state"=>true, "url"=>"#form-awal"),
			"data_permohonan_awal"			 			=> $this->Kelembagaan_model->get_all_entries("permohonan_awal_proposal"),
			"data_permohonan_pencairan"	 			=> $this->Kelembagaan_model->get_all_entries("permohonan_pencairan_proposal"),
			"data_permohonan_awal_active"			=> $this->Kelembagaan_model->get_proposal_list("permohonan_awal_proposal"),
			"data_permohonan_pencairan_active"=> $this->Kelembagaan_model->get_proposal_list("permohonan_pencairan_proposal"),
			"data_laporan"	 									=> $this->Kelembagaan_model->get_laporan(),
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

		$data_notifikasi = $this->Kelembagaan_model->get_notifikasi();
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"riwayat", "session_data"=>$SESSION));
		$this->load->view('lembaga/notifikasi_page', array("data_notifikasi"=>$data_notifikasi));
		$this->load->view('public/content_footer');
	}

	public function add($target, $nomor_dokumen)
	{
		switch ($target) {
			case 'awal'			: $type = "permohonan"; $this->add_permohonan($nomor_dokumen, $target, $type); break;
			case 'pencairan': $type = "pencairan"; $this->add_permohonan($nomor_dokumen, $target, $type); break;
			case 'pelaporan': $this->add_pelaporan(); break;

			default: break;
		}
	}

	public function add_permohonan($nomor_dokumen, $target, $type)
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";

		$daftar_persyaratan = $this->Kelembagaan_model->get_persyaratan($nomor_dokumen, "permohonan_".$target."_persyaratan", $type);
		$daftar_rab 				= $this->Kelembagaan_model->get_proposal_rab($nomor_dokumen, "permohonan_".$target."_rab");
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"form", "session_data"=>$SESSION));
		$this->load->view('lembaga/permohonan_'.$target.'_page', array("nomor_dokumen"=>$nomor_dokumen, "daftar_persyaratan"=>$daftar_persyaratan, "daftar_rab" => $daftar_rab));
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
	public function draft($target){
		if(empty($_POST)) return false;

		switch ($target) {
			case 'awal'			: $table = "permohonan_awal_proposal"; $prefix_id = "PA"; break;
			case 'pencairan': $table = "permohonan_pencairan_proposal"; $prefix_id = "PP"; break;

			default: $table = ""; $prefix_id = ""; break;
		}

		if(isset($_POST['nomor_dokumen']) && !empty($_POST['nomor_dokumen'])){
			$this->Kelembagaan_model->update_entry($table);
		}else{
			$this->Kelembagaan_model->insert_entry($table, $prefix_id);
		}

		redirect('../../../../kelembagaan', 'refresh');
	}

	public function pelaporan(){
		if(empty($_POST)) return false;

		if(isset($_POST['nomor_dokumen']) && !empty($_POST['nomor_dokumen'])){
			if($_FILES['berkas']['name']!=''){
				$file_name	= $_POST['nomor_dokumen'];
				$file_path  = "./uploads/pelaporan/";
				if($this->upload($file_name, $file_path)){
					$_POST['berkas'] = $file_name.".pdf";
					$this->Kelembagaan_model->update_laporan();
				}
			}else{
				$this->Kelembagaan_model->update_laporan();
			}
		}else{
			$file_name	= "PL_".uniqid();
			$file_path  = "./uploads/pelaporan/";
			if($this->upload($file_name, $file_path)){
				$_POST['nomor_dokumen'] = $file_name;
				$_POST['berkas'] 				= $file_name.".pdf";
				$this->Kelembagaan_model->insert_laporan();
			}
		}

		redirect('../../../kelembagaan', 'refresh');
	}

	public function rab($target, $nomor_dokumen){
		if(empty($_POST)) return false;

		switch ($target) {
			case 'awal'			: $table = "permohonan_awal_rab"; break;
			case 'pencairan': $table = "permohonan_pencairan_rab"; break;

			default: $table = ""; break;
		}

		$_POST['nomor_dokumen'] = $nomor_dokumen;
		if(isset($_POST['kode_data']) && !empty($_POST['kode_data'])){
			$this->Kelembagaan_model->update_rab($table);
		}else{
			$this->Kelembagaan_model->insert_rab($table);
		}

		redirect('../../../../../kelembagaan/add/'.$target.'/'.$nomor_dokumen, 'refresh');
	}

	public function get_info_proposal($target){

		switch ($target) {
			case 'awal'			: $table = "permohonan_awal_proposal"; break;
			case 'pencairan': $table = "permohonan_pencairan_proposal"; break;
			case 'pelaporan': $table = "laporan"; break;

			default: $table = ""; break;
		}

		$nomor_dokumen = $_POST['nomor_dokumen'];
		$result 			 = $this->Kelembagaan_model->get_proposal_record($table,$nomor_dokumen);
		echo json_encode($result);
	}

	public function get_info_rab_item($target){

		switch ($target) {
			case 'awal'			: $table = "permohonan_awal_rab"; break;
			case 'pencairan': $table = "permohonan_pencairan_rab"; break;

			default: $table = ""; break;
		}

		$kode_data = $_POST['kode_data'];
		$result 	 = $this->Kelembagaan_model->get_proposal_rab_by_kode($table,$kode_data);
		echo json_encode($result);
	}

	public function send($target, $nomor_dokumen)
	{
		$_POST['nomor_dokumen'] = $nomor_dokumen;
		switch ($target) {
			case 'awal'			: $this->Kelembagaan_model->send_proposal("permohonan_awal_proposal"); break;
			case 'pencairan': $this->Kelembagaan_model->send_proposal("permohonan_pencairan_proposal"); break;
			case 'pelaporan': $this->Kelembagaan_model->send_proposal("laporan"); break;

			default: break;
		}

		redirect('../../../../../kelembagaan', 'refresh');
	}

	public function delete($target, $nomor_dokumen)
	{
		$_POST['nomor_dokumen'] = $nomor_dokumen;
		switch ($target) {
			case 'awal'			: $this->Kelembagaan_model->delete_proposal("permohonan_awal_proposal"); break;
			case 'pencairan': $this->Kelembagaan_model->delete_proposal("permohonan_pencairan_proposal"); break;
			case 'pelaporan'	:
				if($this->Kelembagaan_model->delete_proposal("laporan")){
					$path = "./uploads/pelaporan/".$nomor_dokumen.".pdf";
					if(file_exists($path)) unlink($path);
				}
			break;

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
			case 'pencairan': $this->Kelembagaan_model->delete_rab("permohonan_pencairan_rab"); break;

			default: break;
		}

		redirect('../../../../../../kelembagaan/add/'.$target.'/'.$nomor_dokumen, 'refresh');
	}

	public function delete_persyaratan($target, $nomor_dokumen, $kode_data)
	{

		$_POST['nomor_dokumen'] 	 = $nomor_dokumen;
		$_POST['kode_persyaratan'] = $kode_data;
		switch ($target) {
			case 'awal'			:
				$result = $this->Kelembagaan_model->delete_persyaratan("permohonan_awal_persyaratan");
				if($result) {
					$path = "./uploads/permohonan_awal/".$nomor_dokumen."_".$kode_data.".pdf";
					if(file_exists($path)) unlink($path);
				}
			break;
			case 'pencairan'			:
				$result = $this->Kelembagaan_model->delete_persyaratan("permohonan_pencairan_persyaratan");
				if($result) {
					$path = "./uploads/permohonan_pencairan/".$nomor_dokumen."_".$kode_data.".pdf";
					if(file_exists($path)) unlink($path);
				}
			break;

			default: break;
		}

		redirect('../../../../../../kelembagaan/add/'.$target.'/'.$nomor_dokumen, 'refresh');
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
			case 'pencairan'			:
				$file_name	= $nomor_dokumen."_".$kode_data;
				$file_path  = "./uploads/permohonan_pencairan/";
				if($this->upload($file_name, $file_path)){
					$_POST['berkas'] = $file_name.".pdf";
					$this->Kelembagaan_model->insert_persyaratan("permohonan_pencairan_persyaratan");
				}
			break;

			default: break;
		}

		redirect('../../../../../../kelembagaan/add/'.$target.'/'.$nomor_dokumen, 'refresh');
	}

	public function upload($file_name, $file_path){
		$config = array(
      'upload_path' => $file_path,
      'allowed_types' => "pdf",
      'overwrite' => TRUE,
      'max_size' => "2048000",
      'file_name' => $file_name
    );

		if(file_exists($file_path.$file_name)) unlink($file_path.$file_name);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) return true;
		else return false; //echo $this->upload->display_errors();

	}

}
