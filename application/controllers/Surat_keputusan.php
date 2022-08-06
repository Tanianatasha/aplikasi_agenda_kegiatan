<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class surat_keputusan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_surat_keputusan');
	}

	public function index()
	{
		$x['data_surat_keputusan']=$this->m_surat_keputusan->get_all_surat_keputusan();
		$x['sidebar']="surat_keputusan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_keputusan/surat_keputusan');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_surat_keputusan']=$this->m_surat_keputusan->get_all_surat_keputusan();
		$x['sidebar']="surat_keputusan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_keputusan/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_surat_keputusan']=$this->db->query("SELECT * FROM surat_keputusan where date(tanggal_surat) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('surat_keputusan/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_surat_keputusan']=$this->m_surat_keputusan->get_all_surat_keputusan();
		$this->load->view('surat_keputusan/cetak',$x);
	}
	public function cetak2($id)
	{	
		$x['data_surat_keputusan']=$this->db->query("SELECT * FROM surat_keputusan where id_surat_keputusan='$id'")->row_array();
		$this->load->view('surat_keputusan/cetak2',$x);
	}

	

		public function simpan_surat_keputusan()
	{

		$menetapkan = implode(',', $this->input->post('menetapkan'));
		
					$data = array(
								'menimbang' => $this->input->post('menimbang'),
								'mengingat' => $this->input->post('mengingat'),
								'memperhatikan' => $this->input->post('memperhatikan'),
								'menetapkan' => $menetapkan,
								'pertama' => $this->input->post('pertama'),
								'kedua' => $this->input->post('kedua'),
								'ketiga' => $this->input->post('ketiga'),
								'keempat' => $this->input->post('keempat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
							);


		
				
					$result = $this->m_surat_keputusan->add_surat_keputusan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('surat_keputusan'));
					}
	}


	


		public function update_surat_keputusan()
	{
		$id = $this->input->post('id_surat_keputusan'); 
			
		$menetapkan = implode(',', $this->input->post('menetapkan'));
		
					$data = array(
								'menimbang' => $this->input->post('menimbang'),
								'mengingat' => $this->input->post('mengingat'),
								'memperhatikan' => $this->input->post('memperhatikan'),
								'menetapkan' => $menetapkan,
								'pertama' => $this->input->post('pertama'),
								'kedua' => $this->input->post('kedua'),
								'ketiga' => $this->input->post('ketiga'),
								'keempat' => $this->input->post('keempat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
							);
					
				
					$result = $this->m_surat_keputusan->edit_surat_keputusan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('surat_keputusan'));
					}
	}

	function hapus_surat_keputusan(){
		$kode=$this->input->post('kode');
		$this->m_surat_keputusan->hapus_surat_keputusan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('surat_keputusan');
	}
}