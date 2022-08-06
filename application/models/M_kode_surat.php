<?php
class M_kode_surat extends CI_Model{

	function get_all_kode_surat(){
		$hsl=$this->db->query("SELECT * FROM kode_surat");
		return $hsl;
	}


	function hapus_kode_surat($kode){
		$hsl=$this->db->query("DELETE FROM kode_surat where kode_surat='$kode'");
		return $hsl;
	}

	public function add_kode_surat($data){
			$this->db->insert('kode_surat', $data);
			return true;
		}

		public function get_kode_surat_by_id($id){
			$query = $this->db->get_where('kode_surat', array('kode_surat' => $id));
			return $result = $query->row_array();
		}

		public function edit_kode_surat($data, $id){
			$this->db->where('kode_surat', $id);
			$this->db->update('kode_surat', $data);
			return true;
		}

}	