<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
	}


	public function lihat()
	{
		$x['sidebar']="grafik2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('grafik/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$this->load->view('grafik/cetak_filter',$x);
	}



	

}