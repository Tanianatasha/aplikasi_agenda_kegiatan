<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifat_surat extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_sifat_surat');
	}

	public function index()
	{
		$x['data_sifat_surat']=$this->m_sifat_surat->get_all_sifat_surat();
		$x['sidebar']="sifat_surat";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('sifat_surat/sifat_surat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_sifat_surat']=$this->m_sifat_surat->get_all_sifat_surat();
		$this->load->view('sifat_surat/cetak',$x);
	}

		public function simpan_sifat_surat()
	{

				$data = array(
								'nama_sifat_surat' => $this->input->post('nama_sifat_surat'),
							);
				
					$result = $this->m_sifat_surat->add_sifat_surat($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('sifat_surat'));
					}
	}


	


		public function update_sifat_surat()
	{
		$id = $this->input->post('id_sifat_surat'); 


			$data = array(
								'nama_sifat_surat' => $this->input->post('nama_sifat_surat'),
							);
					
				
					$result = $this->m_sifat_surat->edit_sifat_surat($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('sifat_surat'));
					}
	}

	function hapus_sifat_surat(){

		$kode=$this->input->post('kode');
		$this->m_sifat_surat->hapus_sifat_surat($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('sifat_surat');
	}
}