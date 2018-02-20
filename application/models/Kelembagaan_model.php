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

    function insert_entry($table, $prefix_id)
    {

        $_POST['nomor_dokumen'] = $prefix_id."_".uniqid();
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

    function insert_laporan()
    {
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['status']        = "Draft";
        $_POST['created_by']    = "Megan";
        $_POST['created_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->insert("laporan", $_POST);
    }

    function update_laporan()
    {
        $_POST['nomor_lembaga'] = "00000000000";
        $_POST['status']        = "Draft";
        $_POST['changed_by']    = "Megan";
        $_POST['changed_date']  = (new \DateTime())->format('Y-m-d H:i:s');

        $this->db->update("laporan", $_POST, array('nomor_dokumen' => $_POST['nomor_dokumen']));
    }

    //custom function
    function get_proposal_record($table, $nomor_dokumen)
    {
        $this->db->where('nomor_dokumen', $nomor_dokumen);
        $this->db->where('nomor_lembaga', '00000000000');
        $query = $this->db->get($table);
        return $query->row();
    }

    function get_proposal_rab_by_kode($table, $kode_data)
    {
      $this->db->where('kode_data', $kode_data);
      $query = $this->db->get($table);
      return $query->row();
    }

    function get_proposal_rab($nomor_dokumen, $table)
    {
        $this->db->where('nomor_dokumen', $nomor_dokumen);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_proposal_list($table)
    {
        $this->db->where('nomor_lembaga', '00000000000');
        $this->db->where('status !=', 'Selesai');
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get($table);
        return $query->result();
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
        $result = $this->db->delete($table);

        return $result;
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

    //laporan
    function get_laporan(){
      $this->db->select("l.nomor_dokumen, l.judul, p.nominal, p.latar_belakang, l.created_date, l.catatan, l.berkas, l.status");
      $this->db->from("laporan l");
      $this->db->join("permohonan_pencairan_proposal p", "l.nomor_dokumen_pencairan = p.nomor_dokumen");
      $this->db->where('l.nomor_lembaga', '00000000000');
      $this->db->order_by('l.created_date', 'DESC');
      $query = $this->db->get();
      return $query->result();
    }

    //persyaratan
    function get_persyaratan($nomor_dokumen, $table, $type){
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

    //notifikasi
    function get_notifikasi(){
      $this->db->where('nomor_lembaga', '00000000000');
      $this->db->order_by('created_date', 'DESC');
      $query = $this->db->get("notifikasi");
      return $query->result();
    }
}

?>
