<?php
class M_rumus extends CI_Model
{

  private $_table = "tabel_rumus";

  function tampil_data()
  {
    $hak_akses =  $this->session->userdata('hak_akses');

    if ($hak_akses == 'admin') {
      return $this->db->get('tabel_rumus');
    }else{

      return $this->db->get('tabel_rumus');
    }
  }

  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function delete_data($id_rumus)
  {
    $hsl = $this->db->query("DELETE FROM tabel_rumus WHERE id_rumus='$id_rumus'");
    return $hsl;
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  function jumlah_data()
  {
    $this->db->select('count(tabel_rumus.kode_pegawai) as jumlah');
    $hsl = $this->db->get('tabel_rumus');
    return $hsl;
  }

  function jumlah_data_user()
  {
    $this->db->select('count(tabel_user.id_user) as jumlah');
    $hsl = $this->db->get('tabel_user');
    return $hsl;
  }
  function jumlah_data_stunting()
  {
    $this->db->select('count(tabel_pengukuran.id_stunting) as jumlah');
    $this->db->where('status_stunting','1');
    $hsl = $this->db->get('tabel_pengukuran');
    return $hsl;
  }
  function jumlah_data_balita()
  {
    $this->db->select('count(tabel_pengukuran.id_stunting) as jumlah');
    $hsl = $this->db->get('tabel_pengukuran');
    return $hsl;
  }
  function jumlah_perubahan()
  {
    $this->db->select('count(tabel_perubahan_data.id_perubahan_data) as jumlah');
    $this->db->where('status_keterangan','Pengajuan');
    $hsl = $this->db->get('tabel_perubahan_data');
    return $hsl;
  }
}
