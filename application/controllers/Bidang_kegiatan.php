<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bidang_kegiatan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_bidang_kegiatan');
	}

	public function index()
	{
		$x['data_bidang_kegiatan']=$this->m_bidang_kegiatan->get_all_bidang_kegiatan();
		$x['sidebar']="bidang_kegiatan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('bidang_kegiatan/bidang_kegiatan');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_bidang_kegiatan']=$this->m_bidang_kegiatan->get_all_bidang_kegiatan();
		$this->load->view('bidang_kegiatan/cetak',$x);
	}

		public function simpan_bidang_kegiatan()
	{
				$data = array(
								'nama_bidang_kegiatan' => $this->input->post('nama_bidang_kegiatan'),
							);
				
					$result = $this->m_bidang_kegiatan->add_bidang_kegiatan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('bidang_kegiatan'));
					}
	}


	


		public function update_bidang_kegiatan()
	{
		$id = $this->input->post('id_bidang_kegiatan'); 
			

			$data = array(
								'nama_bidang_kegiatan' => $this->input->post('nama_bidang_kegiatan'),
							);
					
				
					$result = $this->m_bidang_kegiatan->edit_bidang_kegiatan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('bidang_kegiatan'));
					}
	}

	function hapus_bidang_kegiatan(){
		$kode=$this->input->post('kode');
		$this->m_bidang_kegiatan->hapus_bidang_kegiatan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('bidang_kegiatan');
	}
}