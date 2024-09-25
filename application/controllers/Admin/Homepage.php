<?php defined('BASEPATH') or exit('No direct script access allowed');

class Homepage  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_rumus');
        // $this->load->model('M_kelas');
        // $this->load->model('M_siswa');
        // $this->load->model('M_pembayaran');
        // $this->load->model('M_status_pembayaran');
        // $this->load->model('M_kegiatan');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {

        $data['jumlah_user'] = $this->M_rumus->jumlah_data_user()->result();
        $data['jumlah_balita'] = $this->M_rumus->jumlah_data_balita()->result();
        $data['jumlah_stunting'] = $this->M_rumus->jumlah_data_stunting()->result();
        $data['jumlah_perubahan'] = $this->M_rumus->jumlah_perubahan()->result();


        $this->load->view('Admin/Homepage.php',$data);
    }
}
