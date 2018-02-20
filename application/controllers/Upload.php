<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    echo "awwaw";
  }

  public function do_upload(){
    $config = array(
      'upload_path' => "./uploads/permohonan_awal/",
      'allowed_types' => "pdf",
      'overwrite' => TRUE,
      'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
      'file_name' => "tetst"
    );

    $this->load->library('upload', $config);
    if($this->upload->do_upload('berkas'))
    {
      $data = array('upload_data' => $this->upload->data());
      print_r($data);
      // $this->load->view('upload_success',$data);
    }
    else
    {
      $error = array('error' => $this->upload->display_errors());
      print_r ($error);
      // $this->load->view('custom_view', $error);
    }
  }
}
?>
