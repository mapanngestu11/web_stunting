<?php defined('BASEPATH') or exit('No direct script access allowed');

class Galeri  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_galeri');
        $this->load->helper('url');
        $this->load->library('upload');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['galeri'] = $this->M_galeri->tampil_data();

        $this->load->view('Admin/List.galeri.php', $data);
    }

    public function add()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                // $config['width'] = 270;
                // $config['height'] = 308;
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file = $gbr['file_name'];
                $nama_gambar = $this->input->post('nama_gambar');
                $deskripsi = $this->input->post('deskripsi');
                $id_user = "1";

                $waktu =  date('Y-m-d h:i:s');


                $data = array(
                    'nama_gambar' => $nama_gambar,
                    'deskripsi' => $deskripsi,
                    'id_user' => $id_user,

                    'gambar' => $file,
                    'waktu' => $waktu

                );

                $this->M_galeri->input_data($data, 'tabel_galeri');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Galeri');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Galeri');
            }
        } else {
         echo $this->session->set_flashdata('msg', 'warning');
         redirect('Admin/Galeri');
     }
 }

 public function update()
 {
    date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 350;
                $config['height'] = 200;
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $id_galeri = $this->input->post('id_galeri');
                $nama_gambar = $this->input->post('nama_gambar');
                $deskripsi = $this->input->post('deskripsi');
                $id_user = "1";

                $waktu =  date('Y-m-d h:i:s');

                $data = array(
                    'nama_gambar' => $nama_gambar,
                    'deskripsi' => $deskripsi,
                    'id_user' => $id_user,
                    'gambar' => $gambar,
                    'waktu' => $waktu

                );


                $where = array(
                    'id_galeri' => $id_galeri
                );

                $this->M_galeri->update_data($where,$data,'tabel_galeri');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Galeri');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Galeri');
            }

        } else {

           $id_galeri = $this->input->post('id_galeri');
           $nama_gambar = $this->input->post('nama_gambar');
           $deskripsi = $this->input->post('deskripsi');
           $id_user = "1";
           $waktu =  date('Y-m-d h:i:s');

           $data = array(
            'nama_gambar' => $nama_gambar,
            'deskripsi' => $deskripsi,
            'id_user' => $id_user,

            'waktu' => $waktu

        );



           $where = array(
            'id_galeri' => $id_galeri
        );

           $cek = $this->M_galeri->update_data($where,$data,'tabel_galeri');
           echo $this->session->set_flashdata('msg', 'success_update');
           redirect('Admin/Galeri');
       }
   }


   public function delete()
   {
    $id_galeri = $this->input->post('id_galeri');
    $this->M_galeri->delete_data($id_galeri);
    echo $this->session->set_flashdata('msg', 'success_hapus');
    redirect('Admin/Galeri');
}
}
