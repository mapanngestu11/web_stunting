<?php
class M_balita extends CI_Model
{

  private $_table = "tabel_data_balita";
  function tampil_data()
  {
    $hak_akses =  $this->session->userdata('hak_akses');
    if ($hak_akses == 'admin') {
     $this->db->select('*');
     $this->db->from('tbl_user as a');
     $this->db->join('tabel_data_balita as b', 'a.id = b.user_id');
     return $query = $this->db->get();
     return $this->db->get('tabel_data_balita');
   }else{
     $this->db->select('*');
     $this->db->from('tabel_data_balita');
     return $query = $this->db->get();
   }

 }

 public function get_last_number() {
  $this->db->select('no_pendataan');
  $this->db->from('tabel_data_balita');
  $this->db->order_by('id_data_balita', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
    return $query->row()->no_pendataan;
  } else {
    return '000000';
  }
}

public function get_data_by_range()
{
  $this->db->select('
    a.id_stunting,
    a.no_pendataan,
    b.nama_balita,
    b.kader,
    b.jenis_kelamin,
    b.tgl_lahir,
    b.tempat_lahir,
    b.nik_ayah,
    b.nama_ayah,
    b.nik_ibu,
    b.nama_ibu,
    b.alamat,
    a.tinggi_badan,
    a.berat_badan,
    a.lingkar_kepala,
    a.keterangan,
    a.tanggal_pengukuran,
    a.status_stunting,
    b.status_pengukuran,
    c.nama_lengkap,
    a.waktu,');
  $this->db->from('tabel_pengukuran as a');
  $this->db->join('tabel_data_balita as b', 'a.no_pendataan = b.no_pendataan');
  $this->db->join('tabel_user as c', 'a.id_user = b.id_user');
  $this->db->group_by('a.id_stunting');
  return $query = $this->db->get();
}

function input_data($data_balita, $table)
{
  $this->db->insert($table, $data_balita);
}

function delete_data($id_data_balita)
{
  $hsl = $this->db->query("DELETE FROM tabel_data_balita WHERE id_data_balita='$id_data_balita'");
  return $hsl;
}

function update_data($where, $data, $table)
{
  $this->db->where($where);
  $this->db->update($table, $data);
}


function tampil_data_bynopendataan ($no_pendataan)
{
  $this->db->select('*');
  $this->db->from('tabel_data_balita');
  $this->db->where('no_pendataan',$no_pendataan);
  $query = $this->db->get();
  return $query;
}
}
