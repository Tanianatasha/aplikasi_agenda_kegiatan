<?php
class M_sifat_surat extends CI_Model{

	function get_all_sifat_surat(){
		$hsl=$this->db->query("SELECT * FROM sifat_surat");
		return $hsl;
	}


	function hapus_sifat_surat($kode){
		$hsl=$this->db->query("DELETE FROM sifat_surat where id_sifat_surat='$kode'");
		return $hsl;
	}

	public function add_sifat_surat($data){
			$this->db->insert('sifat_surat', $data);
			return true;
		}

		public function get_sifat_surat_by_id($id){
			$query = $this->db->get_where('sifat_surat', array('id_sifat_surat' => $id));
			return $result = $query->row_array();
		}

		public function edit_sifat_surat($data, $id){
			$this->db->where('id_sifat_surat', $id);
			$this->db->update('sifat_surat', $data);
			return true;
		}

}	