<?php
class M_user extends CI_Model
{

  private $_table = "tabel_user";

  function tampil_data()
  {
    $hak_akses =  $this->session->userdata('hak_akses');

    if ($hak_akses == 'admin') {
      return $this->db->get('tabel_user');
    }else{
      
      return $this->db->get('tabel_user');
    }
  }

  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function delete_data($id_user)
  {
    $hsl = $this->db->query("DELETE FROM tabel_user WHERE id_user='$id_user'");
    return $hsl;
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  function jumlah_data()
  {
    $this->db->select('count(tabel_user.kode_pegawai) as jumlah');
    $hsl = $this->db->get('tabel_user');
    return $hsl;
  }
}
