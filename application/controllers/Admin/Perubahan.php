<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perubahan  extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('upload');
    $this->load->model('M_pengukuran');
    $this->load->model('M_balita');
    $this->load->model('M_perubahan_data');

    if ($this->session->userdata('masuk') != TRUE) {
      $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
      $url = base_url('Login');
      redirect($url);
    }
  }

  public function index()
  {
    $data['tittle'] = 'Data Informasi Perubahan Data';
    $this->load->view('Admin/Pages/Head.php');
    $data['perubahan_data'] = $this->M_perubahan_data->tampil_data();
    $data['balita'] = $this->M_balita->tampil_data();

    $this->load->view('Admin/List.perubahan_data.php',$data);

  }

  public function delete()
  {
    $id_perubahan_data = $this->input->post('id_perubahan_data');
    $this->M_perubahan_data->delete_data($id_perubahan_data);
    echo $this->session->set_flashdata('msg', 'success_hapus');
    redirect('Admin/Perubahan');
  }

  public function update()
  {

    $this->M_pengukuran->update_data($where,$data, 'tabel_pengukuran');
    echo $this->session->set_flashdata('msg', 'success_update');
    redirect('Admin/Pengukuran');

  }
  public function add()
  {

    $no_pendataan = $this->input->post('no_pendataan');
    $kader = $this->input->post('kader');
    $keterangan = $this->input->post('keterangan');
    $status_keterangan = 'Pengajuan';
    $diajukan_oleh = $this->input->post('diajukan_oleh');
    $tanggal_pengajuan =  date('Y-m-d h:i:s');
    $waktu = date('Y-m-d h:i:s');

    $data = array(
      'no_pendataan' => $no_pendataan,
      'kader' => $kader,
      'status_keterangan' => $status_keterangan,
      'keterangan' => $keterangan,
      'status_keterangan' => $status_keterangan,
      'diajukan_oleh' => $diajukan_oleh,
      'tanggal_pengajuan' => $tanggal_pengajuan,
      'waktu' => $waktu
    );

    $this->M_perubahan_data->input_data($data, 'tabel_perubahan_data');
    echo $this->session->set_flashdata('msg', 'success');
    redirect('Admin/Perubahan');


  }
}
