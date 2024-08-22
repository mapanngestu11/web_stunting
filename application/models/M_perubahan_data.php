<?php
class M_perubahan_data extends CI_Model
{

  private $_table = "tabel_perubahan_data";

  function tampil_data()
  {
    $hak_akses =  $this->session->userdata('hak_akses');

    if ($hak_akses == 'admin') {
      return $this->db->get('tabel_perubahan_data');
    }else{

     $this->db->join('tabel_data_balita as b', 'a.no_pendataan = b.no_pendataan');
     return $this->db->get('tabel_perubahan_data as a');
   }
 }

 function input_data($data, $table)
 {
  $this->db->insert($table, $data);
}

function delete_data($id_perubahan_data)
{
  $hsl = $this->db->query("DELETE FROM tabel_perubahan_data WHERE id_perubahan_data='$id_perubahan_data'");
  return $hsl;
}

function update_data($where, $data, $table)
{
  $this->db->where($where);
  $this->db->update($table, $data);
}
function jumlah_data()
{
  $this->db->select('count(tabel_perubahan_data.kode_pegawai) as jumlah');
  $hsl = $this->db->get('tabel_perubahan_data');
  return $hsl;
}
}
