<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

    }

    function get_last_entries($table, $limit = 10)
    {
        $this->db->where('nomor_lembaga', '00000000000');
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get($table, $limit);
        return $query->result();
    }

    function insert_entry($table)
    {

        $_POST['nomor_dokumen'] = "PA_".uniqid();
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['nominal']       = str_replace( ',', '', $_POST['nominal'] );;
        $_POST['status']        = "Draft";
        $_POST['created_by']    = "Megan";
        $_POST['created_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->insert($table, $_POST);
    }

    function update_entry($table)
    {
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['nominal']       = str_replace( ',', '', $_POST['nominal'] );;
        $_POST['status']        = "Draft";
        $_POST['changed_by']    = "Megan";
        $_POST['changed_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->update($table, $_POST, array('nomor_dokumen' => $_POST['nomor_dokumen']));
    }

    //custom function
    function get_proposal_record($table, $nomor_dokumen)
    {
        $this->db->where('nomor_dokumen', $nomor_dokumen);
        $this->db->where('nomor_lembaga', '00000000000');
        $query = $this->db->get($table);
        return $query->row();
    }

    function get_persyaratan($nomor_dokumen, $table = "permohonan_awal_persyaratan"){
      $this->db->select('p.kode_data, p.nama, x.status');
      $this->db->from('persyaratan p');
      $this->db->join($table. ' x', 'p.kode_data = x.kode_data', 'left');
      $this->db->where('x.nomor_dokumen', $nomor_dokumen);

      $result = $this->db->get()->result();

      if(empty($result)){
        $this->db->select('p.kode_data, p.nama, x.status');
        $this->db->from('persyaratan p');
        $this->db->join($table. ' x', 'p.kode_data = x.kode_data', 'left');
        $result = $this->db->get()->result();
      }

      return $result;
    }

    function send_proposal($table)
    {
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['status']        = "Menunggu";
        $_POST['changed_by']    = "Megan";
        $_POST['changed_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->update($table, $_POST, array('nomor_dokumen' => $_POST['nomor_dokumen']));
    }

    function delete_proposal($table)
    {
        $_POST['nomor_lembaga'] = "00000000000";

        $this->db->where('nomor_dokumen', $_POST['nomor_dokumen']);
        $this->db->where('nomor_lembaga', $_POST['nomor_lembaga']);
        $this->db->delete($table);
    }
}

?>
