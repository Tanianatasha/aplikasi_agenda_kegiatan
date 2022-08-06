<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pangkat');
	}

	public function index()
	{
		$x['data_pangkat']=$this->m_pangkat->get_all_pangkat();
		$x['sidebar']="pangkat";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pangkat/pangkat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pangkat']=$this->m_pangkat->get_all_pangkat();
		$this->load->view('pangkat/cetak',$x);
	}

		public function simpan_pangkat()
	{
				$data = array(
								'nama_pangkat' => $this->input->post('nama_pangkat'),
								'golongan' => $this->input->post('golongan'),
							);
				
					$result = $this->m_pangkat->add_pangkat($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pangkat'));
					}
	}


	


		public function update_pangkat()
	{
		$id = $this->input->post('id_pangkat'); 
			

			$data = array(
								'nama_pangkat' => $this->input->post('nama_pangkat'),
								'golongan' => $this->input->post('golongan'),
							);
					
				
					$result = $this->m_pangkat->edit_pangkat($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pangkat'));
					}
	}

	function hapus_pangkat(){
		$kode=$this->input->post('kode');
		$this->m_pangkat->hapus_pangkat($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pangkat');
	}
}