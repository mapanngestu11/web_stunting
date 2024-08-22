<?php defined('BASEPATH') or exit('No direct script access allowed');

class Balita  extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('upload');
    $this->load->model('M_balita');
    $this->load->model('M_pengukuran');


    if ($this->session->userdata('masuk') != TRUE) {
      $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
      $url = base_url('Login');
      redirect($url);
    }
  }

  public function index()
  {
    $data['tittle'] = 'Data Balita';
    $this->load->view('Admin/Pages/Head.php');
    $data['balita'] = $this->M_balita->tampil_data();
    $data['no_pendataan'] = $this->M_balita->get_last_number();
    $this->load->view('Admin/Listdatabalita.php', $data);
  }

  public function add()
  {
    date_default_timezone_set("Asia/Jakarta");
    $no_pendataan = $this->input->post('no_pendataan');
    $kader = $this->input->post('kader');
    $nama_balita = $this->input->post('nama_balita');
    $tempat_lahir = $this->input->post('tempat_lahir');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $nik_ayah = $this->input->post('nik_ayah');
    $nama_ayah = $this->input->post('nama_ayah');
    $nik_ibu = $this->input->post('nik_ibu');
    $nama_ibu = $this->input->post('nama_ibu');
    $alamat = $this->input->post('alamat');
    $status_pengukuran = "Sudah";
    $id_user = "1";
    $waktu =  date('Y-m-d h:i:s');

    $data = array(

      'no_pendataan' => $no_pendataan,
      'kader' => $kader,
      'nama_balita' => $nama_balita,
      'tempat_lahir' => $tempat_lahir,
      'tgl_lahir' => $tgl_lahir,

      'jenis_kelamin' => $jenis_kelamin,
      'nik_ayah' => $nik_ayah,
      'nama_ayah' => $nama_ayah,
      'nik_ibu' => $nik_ibu,
      'nama_ibu' => $nama_ibu,
      'alamat' => $alamat,

      'id_user' => $id_user,
      'waktu' => $waktu
    );

    $this->M_balita->input_data($data, 'tabel_data_balita');
    echo $this->session->set_flashdata('msg', 'success');
    redirect('Admin/Balita');
  }

  public function update()
  {
    $id_data_balita = $this->input->post('id_data_balita');
    $no_pendataan = $this->input->post('no_pendataan');
    $kader = $this->input->post('kader');
    $nama_balita = $this->input->post('nama_balita');
    $tempat_lahir = $this->input->post('tempat_lahir');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $nik_ayah = $this->input->post('nik_ayah');
    $nama_ayah = $this->input->post('nama_ayah');
    $nik_ibu = $this->input->post('nik_ibu');
    $nama_ibu = $this->input->post('nama_ibu');
    $alamat = $this->input->post('alamat');
    $tinggi_badan = $this->input->post('tinggi_badan');
    $berat_badan = $this->input->post('berat_badan');
    $lingkar_kepala = $this->input->post('lingkar_kepalas');
    $keterangan = $this->input->post('keterangan');
    $tanggal_pengukuran = $this->input->post('tanggal_pengukuran');
    // $status_pengukuran = "Sudah";
    $id_user = "1";
    $waktu =  date('Y-m-d h:i:s');

    $data = array(

      'no_pendataan' => $no_pendataan,
      'kader' => $kader,
      'nama_balita' => $nama_balita,
      'tempat_lahir' => $tempat_lahir,
      'tgl_lahir' => $tgl_lahir,

      'jenis_kelamin' => $jenis_kelamin,
      'nik_ayah' => $nik_ayah,
      'nama_ayah' => $nama_ayah,
      'nik_ibu' => $nik_ibu,
      'nama_ibu' => $nama_ibu,
      'alamat' => $alamat,

      'id_user' => $id_user,
      'waktu' => $waktu
    );

    $where = array(
      'id_data_balita' => $id_data_balita
    );


    $this->M_balita->update_data($where,$data, 'tabel_data_balita');
    echo $this->session->set_flashdata('msg', 'success_update');
    redirect('Admin/Balita');
  }

  public function delete()
  {
    $id_data_balita = $this->input->post('id_data_balita');
    $this->M_balita->delete_data($id_data_balita);
    echo $this->session->set_flashdata('msg', 'success_hapus');
    redirect('Admin/Balita');
  }
}
