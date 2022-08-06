<?php
class M_pangkat extends CI_Model{

	function get_all_pangkat(){
		$hsl=$this->db->query("SELECT * FROM pangkat");
		return $hsl;
	}


	function hapus_pangkat($kode){
		$hsl=$this->db->query("DELETE FROM pangkat where id_pangkat='$kode'");
		return $hsl;
	}

	public function add_pangkat($data){
			$this->db->insert('pangkat', $data);
			return true;
		}

		public function get_pangkat_by_id($id){
			$query = $this->db->get_where('pangkat', array('id_pangkat' => $id));
			return $result = $query->row_array();
		}

		public function edit_pangkat($data, $id){
			$this->db->where('id_pangkat', $id);
			$this->db->update('pangkat', $data);
			return true;
		}

}	