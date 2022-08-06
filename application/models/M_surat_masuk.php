<?php
class M_surat_masuk extends CI_Model{

	function get_all_surat_masuk(){
		$hsl=$this->db->query("SELECT * FROM surat_masuk,sifat_surat where surat_masuk.id_sifat_surat=sifat_surat.id_sifat_surat");
		return $hsl;
	}


	function hapus_surat_masuk($kode){
		$hsl=$this->db->query("DELETE FROM surat_masuk where id_surat_masuk='$kode'");
		return $hsl;
	}

	public function add_surat_masuk($data){
			$this->db->insert('surat_masuk', $data);
			return true;
		}

		public function get_surat_masuk_by_id($id){
			$query = $this->db->get_where('surat_masuk', array('id_surat_masuk' => $id));
			return $result = $query->row_array();
		}

		public function edit_surat_masuk($data, $id){
			$this->db->where('id_surat_masuk', $id);
			$this->db->update('surat_masuk', $data);
			return true;
		}

}	