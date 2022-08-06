<?php
class M_surat_keputusan extends CI_Model{

	function get_all_surat_keputusan(){
		$hsl=$this->db->query("SELECT * FROM surat_keputusan");
		return $hsl;
	}


	function hapus_surat_keputusan($kode){
		$hsl=$this->db->query("DELETE FROM surat_keputusan where id_surat_keputusan='$kode'");
		return $hsl;
	}

	public function add_surat_keputusan($data){
			$this->db->insert('surat_keputusan', $data);
			return true;
		}

		public function get_surat_keputusan_by_id($id){
			$query = $this->db->get_where('surat_keputusan', array('id_surat_keputusan' => $id));
			return $result = $query->row_array();
		}

		public function edit_surat_keputusan($data, $id){
			$this->db->where('id_surat_keputusan', $id);
			$this->db->update('surat_keputusan', $data);
			return true;
		}

}	