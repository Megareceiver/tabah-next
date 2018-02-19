<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kelembagaan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// Dummy data
		$SESSION['nama_lembaga'] = "Megan..";
		$SESSION['email_lembaga'] = "megareceiver@gmail.com";
		$this->load->view('public/content_header', array("custom_js"=>"/assets/js/kelembagaan.js"));
		$this->load->view('lembaga/content_navigation', array("page_option"=>"index", "session_data"=>$SESSION));
		$this->load->view('lembaga/profile_page');
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
}
