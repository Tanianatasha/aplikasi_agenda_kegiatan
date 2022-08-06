<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kode_surat extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_kode_surat');
	}

	public function index()
	{
		$x['data_kode_surat']=$this->m_kode_surat->get_all_kode_surat();
		$x['sidebar']="kode_surat";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('kode_surat/kode_surat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_kode_surat']=$this->m_kode_surat->get_all_kode_surat();
		$this->load->view('kode_surat/cetak',$x);
	}

		public function simpan_kode_surat()
	{



		$kode_surat=$this->input->post('kode_surat');
		$cek=$this->db->query("SELECT * FROM kode_surat where kode_surat='$kode_surat'")->num_rows();
		if ($cek>0) {
			$this->session->set_flashdata('kd', 'Record is Added Successfully!');
						redirect(base_url('kode_surat'));
		}
				$data = array(
								'kode_surat' => $this->input->post('kode_surat'),
								'pola_klasifikasi_surat' => $this->input->post('pola_klasifikasi_surat'),
								'singkatan' => $this->input->post('singkatan'),
								'bagian' => $this->input->post('bagian'),
							);
				
					$result = $this->m_kode_surat->add_kode_surat($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('kode_surat'));
					}
	}


	


		public function update_kode_surat()
	{
		$id = $this->input->post('kode_surat'); 

			$data = array(
								'kode_surat' => $this->input->post('kode_surat'),
								'pola_klasifikasi_surat' => $this->input->post('pola_klasifikasi_surat'),
								'singkatan' => $this->input->post('singkatan'),
								'bagian' => $this->input->post('bagian'),
							);
					
				
					$result = $this->m_kode_surat->edit_kode_surat($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('kode_surat'));
					}
	}

	function hapus_kode_surat(){
		$kode=$this->input->post('kode');
		$this->m_kode_surat->hapus_kode_surat($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('kode_surat');
	}
}