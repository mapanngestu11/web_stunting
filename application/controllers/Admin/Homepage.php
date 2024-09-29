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
        $this->load->model('M_balita');


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
        // bulan
        $data['jumlah_data_januari']= $this->M_balita->get_data_balita_bulan_januari()->result();
        $data['jumlah_data_februari']= $this->M_balita->get_data_balita_bulan_februari()->result();
        $data['jumlah_data_maret']= $this->M_balita->get_data_balita_bulan_maret()->result();
        $data['jumlah_data_april']= $this->M_balita->get_data_balita_bulan_april()->result();
        $data['jumlah_data_mei']= $this->M_balita->get_data_balita_bulan_mei()->result();
        $data['jumlah_data_juni']= $this->M_balita->get_data_balita_bulan_juni()->result();
        $data['jumlah_data_juli']= $this->M_balita->get_data_balita_bulan_juli()->result();
        $data['jumlah_data_agustus']= $this->M_balita->get_data_balita_bulan_agustus()->result();
        $data['jumlah_data_september']= $this->M_balita->get_data_balita_bulan_september()->result();
        $data['jumlah_data_oktober']= $this->M_balita->get_data_balita_bulan_oktober()->result();
        $data['jumlah_data_november']= $this->M_balita->get_data_balita_bulan_november()->result();
        $data['jumlah_data_desember']= $this->M_balita->get_data_balita_bulan_desember()->result();


        $data['jumlah_data_stunting']= $this->M_balita->get_data_balita_stunting()->result();
        $data['jumlah_data_normal']= $this->M_balita->get_data_balita_normal()->result();

        // var_dump($data['jumlah_data_stunting']);
        // var_dump($data['jumlah_data_normal']);
        // die();

        // $x['data']=$this->M_balita->get_data_balita();
        // var_dump($x);
        // die();

        $this->load->view('Admin/Homepage.php',$data);
    }
}
