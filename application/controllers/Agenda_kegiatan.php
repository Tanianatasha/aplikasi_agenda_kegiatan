<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_kegiatan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_agenda_kegiatan');
	}

	public function index()
	{
		$x['data_agenda_kegiatan']=$this->m_agenda_kegiatan->get_all_agenda_kegiatan();
		$x['sidebar']="agenda_kegiatan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('agenda_kegiatan/agenda_kegiatan');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_agenda_kegiatan']=$this->m_agenda_kegiatan->get_all_agenda_kegiatan();
		$x['sidebar']="agenda_kegiatan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('agenda_kegiatan/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_agenda_kegiatan']=$this->db->query("SELECT * FROM agenda_kegiatan,bidang_kegiatan,pegawai where agenda_kegiatan.id_bidang_kegiatan=bidang_kegiatan.id_bidang_kegiatan AND agenda_kegiatan.id_pegawai=pegawai.id_pegawai AND date(tanggal_mulai) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('agenda_kegiatan/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_agenda_kegiatan']=$this->m_agenda_kegiatan->get_all_agenda_kegiatan();
		$this->load->view('agenda_kegiatan/cetak',$x);
	}
	public function cetak2($id)
	{	
		$x['data_agenda_kegiatan']=$this->db->query("SELECT * FROM agenda_kegiatan,bidang_kegiatan,pegawai where agenda_kegiatan.id_bidang_kegiatan=bidang_kegiatan.id_bidang_kegiatan AND agenda_kegiatan.id_pegawai=pegawai.id_pegawai AND id_agenda_kegiatan='$id'")->row_array();
		$this->load->view('agenda_kegiatan/cetak2',$x);
	}

	

		public function simpan_agenda_kegiatan()
	{
		
					$data = array(
								'id_bidang_kegiatan' => $this->input->post('id_bidang_kegiatan'),
								'id_pegawai' => $this->input->post('id_pegawai'),
								'nama_kegiatan' => $this->input->post('nama_kegiatan'),
								'tempat' => $this->input->post('tempat'),
								'tanggal_mulai' => $this->input->post('tanggal_mulai'),
								'tanggal_selesai' => $this->input->post('tanggal_selesai'),
							);


		
				
					$result = $this->m_agenda_kegiatan->add_agenda_kegiatan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('agenda_kegiatan'));
					}
	}


	


		public function update_agenda_kegiatan()
	{
		$id = $this->input->post('id_agenda_kegiatan'); 
			
		
					$data = array(
								'id_bidang_kegiatan' => $this->input->post('id_bidang_kegiatan'),
								'id_pegawai' => $this->input->post('id_pegawai'),
								'nama_kegiatan' => $this->input->post('nama_kegiatan'),
								'tempat' => $this->input->post('tempat'),
								'tanggal_mulai' => $this->input->post('tanggal_mulai'),
								'tanggal_selesai' => $this->input->post('tanggal_selesai'),
							);
					
				
					$result = $this->m_agenda_kegiatan->edit_agenda_kegiatan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('agenda_kegiatan'));
					}
	}

	function hapus_agenda_kegiatan(){
		$kode=$this->input->post('kode');
		$this->m_agenda_kegiatan->hapus_agenda_kegiatan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('agenda_kegiatan');
	}
}