<?php
class M_galeri extends CI_Model
{

  private $_table = "tabel_galeri";

  function tampil_data()
  {
    $hak_akses =  $this->session->userdata('hak_akses');

    if ($hak_akses == 'admin') {
      return $this->db->get('tabel_galeri');
    }else{

      return $this->db->get('tabel_galeri');
    }
  }

  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function delete_data($id_galeri)
  {
    $hsl = $this->db->query("DELETE FROM tabel_galeri WHERE id_galeri='$id_galeri'");
    return $hsl;
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  function jumlah_data()
  {
    $this->db->select('count(tabel_galeri.kode_pegawai) as jumlah');
    $hsl = $this->db->get('tabel_galeri');
    return $hsl;
  }
}
