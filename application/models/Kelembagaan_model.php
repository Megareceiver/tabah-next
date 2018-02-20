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

    function get_all_entries($table)
    {
        $this->db->where('nomor_lembaga', '00000000000');
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get($table);
        return $query->result();
    }

    function insert_entry($table)
    {

        $_POST['nomor_dokumen'] = "PA_".uniqid();
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['nominal']       = str_replace( ',', '', $_POST['nominal'] );
        $_POST['status']        = "Draft";
        $_POST['created_by']    = "Megan";
        $_POST['created_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->insert($table, $_POST);
    }

    function update_entry($table)
    {
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['nominal']       = str_replace( ',', '', $_POST['nominal'] );
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

    function get_proposal_rab($nomor_dokumen, $table)
    {
        $this->db->where('nomor_dokumen', $nomor_dokumen);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_proposal_rab_by_kode($table, $kode_data)
    {
        $this->db->where('kode_data', $kode_data);
        $query = $this->db->get($table);
        return $query->row();
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


    // RAB
    function insert_rab($table)
    {
        $_POST['harga']         = str_replace( ',', '', $_POST['harga']);
        $_POST['created_by']    = "Megan";
        $_POST['created_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->insert($table, $_POST);
    }

    function update_rab($table)
    {
        $_POST['harga']         = str_replace( ',', '', $_POST['harga']);
        $_POST['changed_by']    = "Megan";
        $_POST['changed_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->update($table, $_POST, array('kode_data' => $_POST['kode_data']));
    }

    function delete_rab($table)
    {
        $this->db->where('kode_data', $_POST['kode_data']);
        $this->db->delete($table);
    }

    //persyaratan
    function get_persyaratan($nomor_dokumen, $table, $type){
      // $this->db->select('p.kode_data, p.nama, x.berkas, x.status, x.created_date');
      // $this->db->from('persyaratan p');
      // $this->db->join($table. ' x', 'p.kode_data = x.kode_data', 'left outer');
      // $this->db->where('x.nomor_dokumen', $nomor_dokumen);
      // $this->db->where('p.tipe', $type);
      //
      // $result = $this->db->get()->result();
      $result = $this->db->query(
        " SELECT
            `p`.`kode_data`,
            `p`.`nama`,
            (SELECT berkas FROM $table x WHERE x.nomor_dokumen = '".$nomor_dokumen."' AND x.kode_persyaratan = p.kode_data) as berkas,
            (SELECT status FROM $table x WHERE x.nomor_dokumen = '".$nomor_dokumen."' AND x.kode_persyaratan = p.kode_data) as status,
            (SELECT created_date FROM $table x WHERE x.nomor_dokumen = '".$nomor_dokumen."' AND x.kode_persyaratan = p.kode_data) as created_date
          FROM `persyaratan` `p`
          WHERE `p`.`tipe` = '".$type."'"
      );
      $result = $result->result();
      // if(empty($result)){
      //   $this->db->select('p.kode_data, p.nama, x.berkas, x.status, x.created_date');
      //   $this->db->from('persyaratan p');
      //   $this->db->join($table. ' x', 'p.kode_data = x.kode_data', 'left');
      //   $result = $this->db->get()->result();
      // }

      return $result;
    }

    function get_persyaratan_x($nomor_dokumen, $table, $type){
      $this->db->select('p.kode_data, p.nama, x.berkas, x.status, x.created_date');
      $this->db->from('persyaratan p');
      $this->db->join($table. ' x', 'p.kode_data = x.kode_data', 'left outer');
      $this->db->where('x.nomor_dokumen', $nomor_dokumen);
      $this->db->where('p.tipe', $type);

      $result = $this->db->get()->result();

      if(empty($result)){
        $this->db->select('p.kode_data, p.nama, x.berkas, x.status, x.created_date');
        $this->db->from('persyaratan p');
        $this->db->join($table. ' x', 'p.kode_data = x.kode_data', 'left');
        $result = $this->db->get()->result();
      }

      return $result;
    }

    function insert_persyaratan($table)
    {
        $_POST['status']        = "Sudah";
        $_POST['created_by']    = "Megan";
        $_POST['created_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->insert($table, $_POST);
    }

    function delete_persyaratan($table)
    {
        $this->db->where('kode_persyaratan', $_POST['kode_persyaratan']);
        $result = $this->db->delete($table);
        return $result;
    }
}

?>
