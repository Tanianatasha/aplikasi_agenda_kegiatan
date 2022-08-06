<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_surat_masuk');
	}

	public function index()
	{
		$x['data_surat_masuk']=$this->m_surat_masuk->get_all_surat_masuk();
		$x['sidebar']="surat_masuk";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_masuk/surat_masuk');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_surat_masuk']=$this->m_surat_masuk->get_all_surat_masuk();
		$x['sidebar']="surat_masuk2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_masuk/lihat');
		$this->load->view('footer');
	}
	
	public function lihat2()
	{
		$x['data_surat_masuk']=$this->m_surat_masuk->get_all_surat_masuk();
		$x['sidebar']="surat_masuk3";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('surat_masuk/lihat2');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_surat_masuk']=$this->db->query("SELECT * FROM surat_masuk,sifat_surat where surat_masuk.id_sifat_surat=sifat_surat.id_sifat_surat AND date(tanggal_surat) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('surat_masuk/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_surat_masuk']=$this->m_surat_masuk->get_all_surat_masuk();
		$this->load->view('surat_masuk/cetak',$x);
	}

	public function cetak2($id)
	{	
		$x['data_surat_masuk']=$this->db->query("SELECT * FROM surat_masuk,sifat_surat where surat_masuk.id_sifat_surat=sifat_surat.id_sifat_surat AND surat_masuk.id_surat_masuk='$id'")->row_array();
		$this->load->view('surat_masuk/cetak2',$x);
	}

		public function simpan_surat_masuk()
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
								'asal_surat' => $this->input->post('asal_surat'),
								'perihal' => $this->input->post('perihal'),
								'tanggal_diterima' => $this->input->post('tanggal_diterima'),
								'keterangan' => $this->input->post('keterangan'),
			                      'file_lampiran' => $dok
							);
			                    
			                    

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('surat_masuk');
			            }
			        }
			        else{

			           $data = array(
								'id_sifat_surat' => $this->input->post('id_sifat_surat'),
								'no_agenda' => $this->input->post('no_agenda'),
								'kode_surat' => $this->input->post('kode_surat'),
								'nomor_surat' => $this->input->post('nomor_surat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
								'asal_surat' => $this->input->post('asal_surat'),
								'perihal' => $this->input->post('perihal'),
								'tanggal_diterima' => $this->input->post('tanggal_diterima'),
								'keterangan' => $this->input->post('keterangan'),
							);
			            
			        }
				
				
					$result = $this->m_surat_masuk->add_surat_masuk($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('surat_masuk'));
					}
	}


	


		public function update_surat_masuk()
	{
		$id = $this->input->post('id_surat_masuk'); 
			

			

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
								'asal_surat' => $this->input->post('asal_surat'),
								'perihal' => $this->input->post('perihal'),
								'tanggal_diterima' => $this->input->post('tanggal_diterima'),
								'keterangan' => $this->input->post('keterangan'),
			                      'file_lampiran' => $dok
							);
			                    
			                    

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('surat_masuk');
			            }
			        }
			        else{

			           $data = array(
								'id_sifat_surat' => $this->input->post('id_sifat_surat'),
								'no_agenda' => $this->input->post('no_agenda'),
								'kode_surat' => $this->input->post('kode_surat'),
								'nomor_surat' => $this->input->post('nomor_surat'),
								'tanggal_surat' => $this->input->post('tanggal_surat'),
								'asal_surat' => $this->input->post('asal_surat'),
								'perihal' => $this->input->post('perihal'),
								'tanggal_diterima' => $this->input->post('tanggal_diterima'),
								'keterangan' => $this->input->post('keterangan'),
							);
			            
			        }
					
				
					$result = $this->m_surat_masuk->edit_surat_masuk($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('surat_masuk'));
					}
	}
	


		public function update_surat_masuk2()
	{
		$id = $this->input->post('id_surat_masuk'); 
			
			$data = array(
								'tujuan_disposisi' => $this->input->post('tujuan_disposisi'),
								'isi_disposisi' => $this->input->post('isi_disposisi'),
							);
					
				
					$result = $this->m_surat_masuk->edit_surat_masuk($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit2', 'Record is Added Successfully!');
						redirect(base_url('surat_masuk'));
					}
	}

	function hapus_surat_masuk(){
			


		$kode=$this->input->post('kode');
		$this->m_surat_masuk->hapus_surat_masuk($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('surat_masuk');
	}
}