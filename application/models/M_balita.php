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

function input_data($data_balita, $table)
{
  $this->db->insert($table, $data_balita);
}

function delete_data($id)
{
  $hsl = $this->db->query("DELETE FROM tabel_data_balita WHERE id='$id'");
  return $hsl;
}

function update_data($where, $data, $table)
{
  $this->db->where($where);
  $this->db->update($table, $data);
}

}
