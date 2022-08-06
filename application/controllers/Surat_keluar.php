<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_surat_keluar');
	}

	public function index()
	{
		$x['data_surat_keluar']=$this->m_surat_keluar->get_all_surat_keluar();
		$x['sidebar']="surat_keluar";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_keluar/surat_keluar');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_surat_keluar']=$this->m_surat_keluar->get_all_surat_keluar();
		$x['sidebar']="surat_keluar2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_keluar/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_surat_keluar']=$this->db->query("SELECT * FROM surat_keluar,sifat_surat,kode_surat where surat_keluar.id_sifat_surat=sifat_surat.id_sifat_surat AND surat_keluar.kode_surat=kode_surat.kode_surat AND date(tanggal_surat) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('surat_keluar/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_surat_keluar']=$this->m_surat_keluar->get_all_surat_keluar();
		$this->load->view('surat_keluar/cetak',$x);
	}


		public function simpan_surat_keluar()
	{

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_lampiran']['name']))
			        {
			        if($this->upload->do_upload('file_lampiran'))
			            {
								$gbr = $this->upload->data();
								$config['image_library']='gd2';
								$config['source_image']='./assets/image/'.$gbr['file_name'];
								$config['create_thumb']= FALSE;
								$config['maintain_ratio']= FALSE;
								$config['quality']='60%';
								$config['width']= 500;
			                	$config['height']= 400;
								$config['new_image']= './assets/image/'.$gbr['file_name'];
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();
			                    $dok=$gbr['file_name'];


			                    	$data = array(
								'id_sifat_surat' => $this->input->post('id_sifat_surat'),
								'no_agenda' => $this->input->post('no_agenda'),
								'kode_surat' => $this->input->post('kode_surat'),
								'nomor_surat' => $this->input->post('nomor_surat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
								'tujuan_surat' => $this->input->post('tujuan_surat'),
								'perihal' => $this->input->post('perihal'),
								'keterangan' => $this->input->post('keterangan'),
			                      'file_lampiran' => $dok
							);
			                    
			                    

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('surat_keluar');
			            }
			        }
			        else{

			           $data = array(
								'id_sifat_surat' => $this->input->post('id_sifat_surat'),
								'no_agenda' => $this->input->post('no_agenda'),
								'kode_surat' => $this->input->post('kode_surat'),
								'nomor_surat' => $this->input->post('nomor_surat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
								'tujuan_surat' => $this->input->post('tujuan_surat'),
								'perihal' => $this->input->post('perihal'),
								'keterangan' => $this->input->post('keterangan'),
							);
			            
			        }
				
				
					$result = $this->m_surat_keluar->add_surat_keluar($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('surat_keluar'));
					}
	}


	


		public function update_surat_keluar()
	{
		$id = $this->input->post('id_surat_keluar'); 



			

			$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_lampiran']['name']))
			        {
			        if($this->upload->do_upload('file_lampiran'))
			            {
								$gbr = $this->upload->data();
								$config['image_library']='gd2';
								$config['source_image']='./assets/image/'.$gbr['file_name'];
								$config['create_thumb']= FALSE;
								$config['maintain_ratio']= FALSE;
								$config['quality']='60%';
								$config['width']= 500;
			                	$config['height']= 400;
								$config['new_image']= './assets/image/'.$gbr['file_name'];
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();
			                    $dok=$gbr['file_name'];


			                    	$data = array(
								'id_sifat_surat' => $this->input->post('id_sifat_surat'),
								'no_agenda' => $this->input->post('no_agenda'),
								'kode_surat' => $this->input->post('kode_surat'),
								'nomor_surat' => $this->input->post('nomor_surat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
								'tujuan_surat' => $this->input->post('tujuan_surat'),
								'perihal' => $this->input->post('perihal'),
								'keterangan' => $this->input->post('keterangan'),
			                      'file_lampiran' => $dok
							);
			                    
			                    

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('surat_keluar');
			            }
			        }
			        else{

			           $data = array(
								'id_sifat_surat' => $this->input->post('id_sifat_surat'),
								'no_agenda' => $this->input->post('no_agenda'),
								'kode_surat' => $this->input->post('kode_surat'),
								'nomor_surat' => $this->input->post('nomor_surat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
								'tujuan_surat' => $this->input->post('tujuan_surat'),
								'perihal' => $this->input->post('perihal'),
								'keterangan' => $this->input->post('keterangan'),
							);
			            
			        }
					
				
					$result = $this->m_surat_keluar->edit_surat_keluar($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('surat_keluar'));
					}
	}
	


		public function update_surat_keluar2()
	{
		$id = $this->input->post('id_surat_keluar'); 
			

			$data = array(
								'tujuan_disposisi' => $this->input->post('tujuan_disposisi'),
								'isi_disposisi' => $this->input->post('isi_disposisi'),
							);
					
				
					$result = $this->m_surat_keluar->edit_surat_keluar($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit2', 'Record is Added Successfully!');
						redirect(base_url('surat_keluar'));
					}
	}

	function hapus_surat_keluar(){
		$kode=$this->input->post('kode');
		$this->m_surat_keluar->hapus_surat_keluar($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('surat_keluar');
	}
}