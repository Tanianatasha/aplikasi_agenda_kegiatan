<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_sppd');
	}

	public function index()
	{
		$x['data_sppd']=$this->m_sppd->get_all_sppd();
		$x['sidebar']="sppd";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('sppd/sppd');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_sppd']=$this->m_sppd->get_all_sppd();
		$x['sidebar']="sppd2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('sppd/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_sppd']=$this->db->query("SELECT * FROM pegawai,pangkat,jabatan,sppd where pegawai.id_pangkat=pangkat.id_pangkat AND pegawai.id_jabatan=jabatan.id_jabatan AND sppd.id_pegawai=pegawai.id_pegawai AND date(tgl_berangkat) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('sppd/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_sppd']=$this->m_sppd->get_all_sppd();
		$this->load->view('sppd/cetak',$x);
	}
	public function cetak2($id)
	{	
		$x['data_sppd']=$this->db->query("SELECT * FROM pegawai,pangkat,jabatan,sppd where pegawai.id_pangkat=pangkat.id_pangkat AND pegawai.id_jabatan=jabatan.id_jabatan AND sppd.id_pegawai=pegawai.id_pegawai AND id_sppd='$id'")->row_array();
		$this->load->view('sppd/cetak2',$x);
	}

	

		public function simpan_sppd()
	{
		
		$id_pengikut = implode(',', $this->input->post('id_pengikut'));
		$id_pegawai = implode(',', $this->input->post('id_pegawai'));
				$data = array(
								'maksud_perjalanan' => $this->input->post('maksud_perjalanan'),
								'alat_angkut' => $this->input->post('alat_angkut'),
								'tempat_berangkat' => $this->input->post('tempat_berangkat'),
								'tempat_tujuan' => $this->input->post('tempat_tujuan'),
								'tgl_berangkat' => $this->input->post('tgl_berangkat'),
								'tgl_harus_kembali' => $this->input->post('tgl_harus_kembali'),
								'id_pengikut' => $id_pengikut,
								'id_pegawai' => $id_pegawai,
							);
				
					$result = $this->m_sppd->add_sppd($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('sppd'));
					}
	}


	


		public function update_sppd()
	{
		$id = $this->input->post('id_sppd'); 
			
		
		$id_pengikut = implode(',', $this->input->post('id_pengikut'));
		$id_pegawai = implode(',', $this->input->post('id_pegawai'));
				$data = array(
								'maksud_perjalanan' => $this->input->post('maksud_perjalanan'),
								'alat_angkut' => $this->input->post('alat_angkut'),
								'tempat_berangkat' => $this->input->post('tempat_berangkat'),
								'tempat_tujuan' => $this->input->post('tempat_tujuan'),
								'tgl_berangkat' => $this->input->post('tgl_berangkat'),
								'tgl_harus_kembali' => $this->input->post('tgl_harus_kembali'),
								'id_pengikut' => $id_pengikut,
								'id_pegawai' => $id_pegawai,
							);
					
				
					$result = $this->m_sppd->edit_sppd($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('sppd'));
					}
	}

	function hapus_sppd(){
		$kode=$this->input->post('kode');
		$this->m_sppd->hapus_sppd($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('sppd');
	}
}