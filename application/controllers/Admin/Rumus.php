<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rumus  extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('upload');
    $this->load->model('M_rumus');

    if ($this->session->userdata('masuk') != TRUE) {
        $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
        $url = base_url('Login');
        redirect($url);
    }
}

public function index()
{

    $data['tittle'] = 'Informasi Nilai Rata - rata';
    $data['rumus'] = $this->M_rumus->tampil_data();
    $this->load->view('Admin/Pages/Head.php');
    $this->load->view('Admin/List.rumus.php',$data);
}

public function update()
{
 date_default_timezone_set("Asia/Jakarta");   
 $id_rumus = $this->input->post('id_rumus');
 $tinggi_rata = $this->input->post('tinggi_rata');
 $tinggi_standar = $this->input->post('tinggi_standar');
 $berat_rata = $this->input->post('berat_rata');
 $berat_standar = $this->input->post('berat_standar');
 $waktu =  date('Y-m-d h:i:s');


 $data = array(
    'tinggi_rata' => $tinggi_rata,
    'tinggi_standar' => $tinggi_standar,
    'berat_rata' => $berat_rata,
    'berat_standar' => $berat_standar,
    'waktu' => $waktu
);

 $where = array(
    'id_rumus' => $id_rumus
);

 $this->M_rumus->update_data($where,$data, 'tabel_rumus');
 echo $this->session->set_flashdata('msg', 'success');
 redirect('Admin/Rumus');
}
}
