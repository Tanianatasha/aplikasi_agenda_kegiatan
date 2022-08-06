<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$x['sidebar']="pegawai";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pegawai/pegawai');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$this->load->view('pegawai/cetak',$x);
	}

		public function simpan_pegawai()
	{
				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_pegawai']['name']))
				{
				if($this->upload->do_upload('foto_pegawai'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							if (empty($this->input->post('password'))) {
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
												'foto_pegawai' => $dok,
											);
							}else{
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
												'foto_pegawai' => $dok,
												'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
											);
							}

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('benda');
					}
				}
				else{
						if (empty($this->input->post('password'))) {
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
											);
							}else{
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
												'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
											);
							}
					
				}
				
					$result = $this->m_pegawai->add_pegawai($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}


	


		public function update_pegawai()
	{
		$id = $this->input->post('id_pegawai'); 
			

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_pegawai']['name']))
				{
				if($this->upload->do_upload('foto_pegawai'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							if (empty($this->input->post('password'))) {
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
												'foto_pegawai' => $dok,
											);
							}else{
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
												'foto_pegawai' => $dok,
												'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
											);
							}

					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('benda');
					}
				}
				else{
						if (empty($this->input->post('password'))) {
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
											);
							}else{
								$data = array(
												'nip' => $this->input->post('nip'),
												'nama_pegawai' => $this->input->post('nama_pegawai'),
												'tgl_lahir' => $this->input->post('tgl_lahir'),
												'tempat_lahir' => $this->input->post('tempat_lahir'),
												'jenis_kelamin' => $this->input->post('jenis_kelamin'),
												'alamat' => $this->input->post('alamat'),
												'no_telp' => $this->input->post('no_telp'),
												'tgl_bergabung' => $this->input->post('tgl_bergabung'),
												'status_perkawinan' => $this->input->post('status_perkawinan'),
												'status_pegawai' => $this->input->post('status_pegawai'),
												'id_pangkat' => $this->input->post('id_pangkat'),
												'id_jabatan' => $this->input->post('id_jabatan'),
												'email' => $this->input->post('email'),
												'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
											);
							}
					
				}
				
				
					$result = $this->m_pegawai->edit_pegawai($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}

	function hapus_pegawai(){
		$kode=$this->input->post('kode');
		$this->m_pegawai->hapus_pegawai($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pegawai');
	}
}