<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_kegiatan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_hasil_kegiatan');
	}

	public function index()
	{
		$x['data_hasil_kegiatan']=$this->m_hasil_kegiatan->get_all_hasil_kegiatan();
		$x['sidebar']="hasil_kegiatan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('hasil_kegiatan/hasil_kegiatan');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_hasil_kegiatan']=$this->m_hasil_kegiatan->get_all_hasil_kegiatan();
		$x['sidebar']="hasil_kegiatan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('hasil_kegiatan/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_hasil_kegiatan']=$this->db->query("SELECT * FROM agenda_kegiatan,bidang_kegiatan,hasil_kegiatan where agenda_kegiatan.id_bidang_kegiatan=bidang_kegiatan.id_bidang_kegiatan AND hasil_kegiatan.id_agenda_kegiatan=agenda_kegiatan.id_agenda_kegiatan AND date(tanggal) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('hasil_kegiatan/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_hasil_kegiatan']=$this->m_hasil_kegiatan->get_all_hasil_kegiatan();
		$this->load->view('hasil_kegiatan/cetak',$x);
	}
	public function cetak2($id)
	{	
		$x['data_hasil_kegiatan']=$this->db->query("SELECT * FROM agenda_kegiatan,bidang_kegiatan,hasil_kegiatan where agenda_kegiatan.id_bidang_kegiatan=bidang_kegiatan.id_bidang_kegiatan AND hasil_kegiatan.id_agenda_kegiatan=agenda_kegiatan.id_agenda_kegiatan AND id_hasil_kegiatan='$id'")->row_array();
		$this->load->view('hasil_kegiatan/cetak2',$x);
	}

	

		public function simpan_hasil_kegiatan()
	{
		
					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['bukti']['name']))
			        {
			        if($this->upload->do_upload('bukti'))
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
								'id_agenda_kegiatan' => $this->input->post('id_agenda_kegiatan'),
								'tanggal' => $this->input->post('tanggal'),
								'hasil' => $this->input->post('hasil'),
								'bukti' => $dok,
							);
			                     

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('agenda_kegiatan');
			            }
			        }
			        else{

			       $data = array(
								'id_agenda_kegiatan' => $this->input->post('id_agenda_kegiatan'),
								'tanggal' => $this->input->post('tanggal'),
								'hasil' => $this->input->post('hasil'),
							);
			            
			        }

				
					$result = $this->m_hasil_kegiatan->add_hasil_kegiatan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('hasil_kegiatan'));
					}
	}


	


		public function update_hasil_kegiatan()
	{
		$id = $this->input->post('id_hasil_kegiatan'); 
			
		
					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['bukti']['name']))
			        {
			        if($this->upload->do_upload('bukti'))
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
								'id_agenda_kegiatan' => $this->input->post('id_agenda_kegiatan'),
								'tanggal' => $this->input->post('tanggal'),
								'hasil' => $this->input->post('hasil'),
								'bukti' => $dok,
							);
			                     

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('agenda_kegiatan');
			            }
			        }
			        else{

			       $data = array(
								'id_agenda_kegiatan' => $this->input->post('id_agenda_kegiatan'),
								'tanggal' => $this->input->post('tanggal'),
								'hasil' => $this->input->post('hasil'),
							);
			            
			        }
					
				
					$result = $this->m_hasil_kegiatan->edit_hasil_kegiatan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('hasil_kegiatan'));
					}
	}

	function hapus_hasil_kegiatan(){
		$kode=$this->input->post('kode');
		$this->m_hasil_kegiatan->hapus_hasil_kegiatan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('hasil_kegiatan');
	}
}