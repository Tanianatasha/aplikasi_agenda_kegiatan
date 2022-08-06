<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		function __construct(){
		parent::__construct();
       $this->load->model('m_pengguna');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function lupa()
	{
		$this->load->view('lupa_pass');
	}

	function cek(){

		$username = $this->input->post('username');
		$no_hp = $this->input->post('no_hp');

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();

        // jika usernya ada
        if ($result) {
                if ($no_hp==$result['no_hp']) {
                	$x['id_pengguna'] = $result['id_pengguna'];
					$this->load->view('lupa_pass2',$x);
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login/lupa");
                }
           
        }  else{
			$this->session->set_flashdata('username_salah', ' ');
			redirect("login/lupa");
		}

	}

	function cek2(){

		$id_pengguna = $this->input->post('id_pengguna');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
        if ($password==$password2) {
        	$data = array(
								'password' => password_hash($password, PASSWORD_DEFAULT)
							);
				
			$this->m_pengguna->edit_pengguna($data,$id_pengguna);
			$this->session->set_flashdata('berhasil_up', 'Record is Added Successfully!');
			redirect(base_url('login'));
        }  else{
			$this->session->set_flashdata('passss', ' ');
			$x['id_pengguna'] = $id_pengguna;
			$this->load->view('lupa_pass2',$x);
		}

	}

	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $result2 = $this->db->get_where('pegawai', ['nip' => $username])->row_array();

        // jika usernya ada
        if ($result) {
                if (password_verify($password, $result['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result['id_pengguna'],
							'username2' => $result['username'],
							'nama_lengkap' => $result['nama_lengkap'],
							'foto' => "",
							'level' => $result['level'],
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        } elseif ($result2) {
                if (password_verify($password, $result2['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result2['id_pegawai'],
							'username2' => $result2['nama_pegawai'],
							'nama_lengkap' => $result2['nama_pegawai'],
							'foto' => "",
							'level' => "pegawai",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        }  else{
			$this->session->set_flashdata('username_salah', ' ');
			redirect("login");
		}

	}


			public function logout(){
			$this->session->sess_destroy();
			redirect("login");
		}
}
