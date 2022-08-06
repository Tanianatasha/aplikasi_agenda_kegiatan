<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_tugas extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_surat_tugas');
	}

	public function index()
	{
		$x['data_surat_tugas']=$this->m_surat_tugas->get_all_surat_tugas();
		$x['sidebar']="surat_tugas";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_tugas/surat_tugas');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_surat_tugas']=$this->m_surat_tugas->get_all_surat_tugas();
		$x['sidebar']="surat_tugas2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_tugas/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_surat_tugas']=$this->db->query("SELECT * FROM surat_tugas where date(mulai_tugas) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('surat_tugas/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_surat_tugas']=$this->m_surat_tugas->get_all_surat_tugas();
		$this->load->view('surat_tugas/cetak',$x);
	}
	public function cetak2($id)
	{	
		$x['data_surat_tugas']=$this->db->query("SELECT * from surat_tugas where id_surat_tugas='$id'")->row_array();
		$this->load->view('surat_tugas/cetak2',$x);
	}

		public function simpan_surat_tugas()
	{
		$id_pegawai = implode(',', $this->input->post('id_pegawai'));
				$data = array(
								'id_pegawai' => $id_pegawai,
								'untuk' => $this->input->post('untuk'),
								'mulai_tugas' => $this->input->post('mulai_tugas'),
								'selesai_tugas' => $this->input->post('selesai_tugas'),
								'keterangan' => $this->input->post('keterangan'),
							);
				
					$result = $this->m_surat_tugas->add_surat_tugas($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('surat_tugas'));
					}
	}


	


		public function update_surat_tugas()
	{
		$id = $this->input->post('id_surat_tugas'); 
			
		$id_pegawai = implode(',', $this->input->post('id_pegawai'));
			$data = array(
								'id_pegawai' => $id_pegawai,
								'untuk' => $this->input->post('untuk'),
								'mulai_tugas' => $this->input->post('mulai_tugas'),
								'selesai_tugas' => $this->input->post('selesai_tugas'),
								'keterangan' => $this->input->post('keterangan'),
							);
					
				
					$result = $this->m_surat_tugas->edit_surat_tugas($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('surat_tugas'));
					}
	}

	function hapus_surat_tugas(){
		$kode=$this->input->post('kode');
		$this->m_surat_tugas->hapus_surat_tugas($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('surat_tugas');
	}
}