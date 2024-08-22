<?php
class M_pengukuran extends CI_Model
{

  private $_table = "tabel_pengukuran";

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
      c.nama_lengkap');
    $this->db->from('tabel_pengukuran as a');
    $this->db->join('tabel_data_balita as b', 'a.no_pendataan = b.no_pendataan');
    $this->db->join('tabel_user as c', 'a.id_user = b.id_user');
    $this->db->group_by('a.id_stunting');
    return $query = $this->db->get();
  }

}
public function get_last_number() {
  $this->db->select('no_pendataan');
  $this->db->from('tabel_pengukuran');
  $this->db->order_by('id_data_balita', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
    return $query->row()->nomor;
  } else {
    return '000000';
  }
}

function input_data($data_pengukuran, $table)
{
  $this->db->insert($table, $data_pengukuran);
}

function delete_data($id_stunting)
{
  $hsl = $this->db->query("DELETE FROM tabel_pengukuran WHERE id_stunting='$id_stunting'");
  return $hsl;
}

function update_data($where, $data, $table)
{
  $this->db->where($where);
  $this->db->update($table, $data);
}

}
