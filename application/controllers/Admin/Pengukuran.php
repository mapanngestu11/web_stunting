<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengukuran  extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('upload');
    $this->load->model('M_pengukuran');
    $this->load->model('M_rumus');
    $this->load->model('M_balita');

    if ($this->session->userdata('masuk') != TRUE) {
      $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
      $url = base_url('Login');
      redirect($url);
    }
  }

  public function index()
  {
    $data['tittle'] = 'Data Informasi Pengukuran';
    $this->load->view('Admin/Pages/Head.php');
    $data['balita'] = $this->M_balita->tampil_data();
    $data['data_pengukuran'] = $this->M_pengukuran->tampil_data();


    $this->load->view('Admin/List.datapengukuran.php',$data);

  }

  public function delete()
  {
    $id_stunting = $this->input->post('id_stunting');
    $this->M_pengukuran->delete_data($id_stunting);
    echo $this->session->set_flashdata('msg', 'success_hapus');
    redirect('Admin/Pengukuran');
  }

  public function update()
  {
    date_default_timezone_set("Asia/Jakarta");
    $id_stunting = $this->input->post('id_stunting');
    $no_pendataan = $this->input->post('no_pendataan');
    $tinggi_badan = $this->input->post('tinggi_badan');
    $berat_badan = $this->input->post('berat_badan');
    $lingkar_kepala = $this->input->post('lingkar_kepala');
    $keterangan = $this->input->post('keterangan');
    $tanggal_pengukuran = $this->input->post('tanggal_pengukuran');
    $status_pengukuran = 'Sudah';
    $id_user = "1";
    $waktu =  date('Y-m-d h:i:s');
    $cek_no_pendataan =  $this->M_balita->tampil_data_bynopendataan($no_pendataan);

    $conver_data = $cek_no_pendataan->result();
    $jenis_kelamin = $conver_data[0]->jenis_kelamin;
    $tgl_lahir = $conver_data[0]->tgl_lahir;
    $tanggal_akhir = $tgl_lahir;

    function hitung_jumlah_bulan($tanggal_akhir) {

      $tanggal_awal = new DateTime();

      $datetime2 = new DateTime($tanggal_akhir);

      $interval = $tanggal_awal->diff($datetime2);

      $jumlah_bulan = ($interval->y * 12) + $interval->m;

      return $jumlah_bulan;
    }

    $tanggal_akhir = $tgl_lahir;

    $jumlah_bulan = hitung_jumlah_bulan($tanggal_akhir);



    $usia_bulan = $jumlah_bulan;


    $childHeight = $tinggi_badan;
    $usia_bulan = $jumlah_bulan;

    function calculateZScore($childHeight, $medianHeight, $sdHeight) {

      $zScore = ($childHeight - $medianHeight) / $sdHeight;
      return $zScore;
    }

    function isStunting($zScore) {
      if ($zScore <= -3) {
        return "1";
      } elseif ($zScore <= -2) {
        return "2";
      } else {
        return "0";
      }
    }


$medianHeight = 95; // Median tinggi badan untuk usia tertentu dari data WHO
$sdHeight = 4.5; // Standar deviasi tinggi badan untuk usia tertentu dari data WHO

// Hitung Z-Score
$zScore = calculateZScore($childHeight, $medianHeight, $sdHeight);

// Tentukan status stunting
$keterangan_stunting = isStunting($zScore);



$data = array(
  'no_pendataan' => $no_pendataan,
  'tinggi_badan' => $tinggi_badan,
  'berat_badan' => $berat_badan,
  'berat_badan' => $berat_badan,
  'keterangan' => $keterangan,
  'tanggal_pengukuran' => $tanggal_pengukuran,
  'status_stunting' => $keterangan_stunting,
  'id_user' => $id_user,
  'waktu' => $waktu
);

$where = array(
  'id_stunting' => $id_stunting
);


$this->M_pengukuran->update_data($where,$data, 'tabel_pengukuran');
echo $this->session->set_flashdata('msg', 'success_update');
redirect('Admin/Pengukuran');

}
public function add()
{
  $data['rumus'] = $this->M_rumus->tampil_data();

  date_default_timezone_set("Asia/Jakarta");
  $no_pendataan = $this->input->post('no_pendataan');
  $tinggi_badan = $this->input->post('tinggi_badan');
  $berat_badan = $this->input->post('berat_badan');
  $lingkar_kepala = $this->input->post('lingkar_kepala');
  $keterangan = $this->input->post('keterangan');
  $tanggal_pengukuran = $this->input->post('tanggal_pengukuran');
  $id_user = "1";
  $waktu =  date('Y-m-d h:i:s');

  $cek_no_pendataan =  $this->M_balita->tampil_data_bynopendataan($no_pendataan);

  $conver_data = $cek_no_pendataan->result();
  $jenis_kelamin = $conver_data[0]->jenis_kelamin;
  $tgl_lahir = $conver_data[0]->tgl_lahir;
  $tanggal_akhir = $tgl_lahir;



  function hitung_jumlah_bulan($tanggal_akhir) {

    $tanggal_awal = new DateTime();

    $datetime2 = new DateTime($tanggal_akhir);

    $interval = $tanggal_awal->diff($datetime2);

    $jumlah_bulan = ($interval->y * 12) + $interval->m;

    return $jumlah_bulan;
  }

  $tanggal_akhir = $tgl_lahir;

  $jumlah_bulan = hitung_jumlah_bulan($tanggal_akhir);


  $childHeight = $tinggi_badan;
  $usia_bulan = $jumlah_bulan;

  function calculateZScore($childHeight, $medianHeight, $sdHeight) {

    $zScore = ($childHeight - $medianHeight) / $sdHeight;
    return $zScore;
  }

  function isStunting($zScore) {
    if ($zScore <= -3) {
      return "1";
    } elseif ($zScore <= -2) {
      return "2";
    } else {
      return "3";
    }
  }

  $conver_data_rumus = $data['rumus'] = $this->M_rumus->tampil_data()->result();
  $tinggi_badan_rata = $conver_data_rumus[0]->tinggi_rata;
  $tinggi_badan_standar = $conver_data_rumus[0]->tinggi_standar;


$medianHeight = $tinggi_badan_rata; // Median tinggi badan untuk usia tertentu dari data WHO
$sdHeight = $tinggi_badan_standar; // Standar deviasi tinggi badan untuk usia tertentu dari data WHO

// Hitung Z-Score
$zScore = calculateZScore($childHeight, $medianHeight, $sdHeight);

// Tentukan status stunting
$keterangan_stunting = isStunting($zScore);



$data = array(
  'no_pendataan' => $no_pendataan,
  'tinggi_badan' => $tinggi_badan,
  'berat_badan' => $berat_badan,
  'lingkar_kepala' => $lingkar_kepala,
  'berat_badan' => $berat_badan,
  'keterangan' => $keterangan,
  'tanggal_pengukuran' => $tanggal_pengukuran,
  'status_stunting' => $keterangan_stunting,
  'id_user' => $id_user,
  'waktu' => $waktu
);

$this->M_pengukuran->input_data($data, 'tabel_pengukuran');
echo $this->session->set_flashdata('msg', 'success');
redirect('Admin/Pengukuran');


}
}
