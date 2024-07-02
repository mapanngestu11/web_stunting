<?php defined('BASEPATH') or exit('No direct script access allowed');

class User  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_user');


        // if ($this->session->userdata('masuk') != TRUE) {
        //     $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert" style="color:white;">Login Terlebih Dahulu ! </div>');
        //     $url = base_url('Login');
        //     redirect($url);
        // }
    }

    public function index()
    {

        $data['tittle'] = 'Data User';

        $data['user'] = $this->M_user->tampil_data();
        $this->load->view('Admin/Pages/Head.php');
        $this->load->view('admin/List.user.php',$data);
    }

    public function add ()
    {
      date_default_timezone_set("Asia/Jakarta");
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
      $nama_lengkap = $this->input->post('nama_lengkap');
      $hak_akses = $this->input->post('hak_akses');
      $kader = $this->input->post('kader');
      $last_login =  date('Y-m-d h:i:s');


      $data = array(
        'username' => $username,
        'password' => $password,
        'nama_lengkap' => $nama_lengkap,
        'hak_akses' => $hak_akses,
        'kader' => $kader,
        'last_login' => $last_login
    );

      $this->M_user->input_data($data, 'tabel_user');
      echo $this->session->set_flashdata('msg', 'success');
      redirect('Admin/User');
  }



  public function Edit()
  {
    $data['title'] = $this->title;   
    $data['user'] = $this->M_user->tampil_data_edit();

    $this->load->view('admin/Edit.datasekolah.php',$data);
}

public function update()
{
    $id = $this->input->post('id');
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $nama_lengkap = $this->input->post('nama_lengkap');
    $hak_akses = $this->input->post('hak_akses');
    $user_id  = $this->session->userdata('id');
    $waktu =  date('Y-m-d h:i:s');


    $data = array(
        'username' => $username,
        'password' => $password,
        'nama_lengkap' => $nama_lengkap,
        'hak_akses' => $hak_akses,
        'user_id' => $user_id,
        'waktu' => $waktu
    );

    $where = array(
        'id' => $id
    );

    $this->M_user->update_data($where,$data,'tbl_user');
    echo $this->session->set_flashdata('msg', 'success_update');
    redirect('Admin/User');

}

public function delete()
{
    date_default_timezone_set("Asia/Jakarta");
    $id = $this->input->post('id');
    $ket_hapus = '1';
    $user_id =  $this->session->userdata('id');
    $waktu =  date('Y-m-d h:i:s');

    $data = array(
        'ket_hapus' => $ket_hapus,
        'user_id' => $user_id,
        'waktu' => $waktu
    );

    $where = array(
        'id' => $id
    );

    $this->M_user->update_data($where,$data,'tbl_user');
    echo $this->session->set_flashdata('msg', 'success_hapus');
    redirect('Admin/User');
}

public function logout()
{
    $this->session->sess_destroy();
    redirect('Login');
}

}
