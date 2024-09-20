<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_galeri');
		$this->load->helper('url');

	}

	public function index()
	{

		$data['galeri'] = $this->M_galeri->tampil_data();
		$this->load->view('Homepage.php',$data);
	}
}
