<?php
class M_sppd extends CI_Model{

	function get_all_sppd(){
		$hsl=$this->db->query("SELECT * FROM sppd");
		return $hsl;
	}


	function hapus_sppd($kode){
		$hsl=$this->db->query("DELETE FROM sppd where id_sppd='$kode'");
		return $hsl;
	}

	public function add_sppd($data){
			$this->db->insert('sppd', $data);
			return true;
		}

		public function get_sppd_by_id($id){
			$query = $this->db->get_where('sppd', array('id_sppd' => $id));
			return $result = $query->row_array();
		}

		public function edit_sppd($data, $id){
			$this->db->where('id_sppd', $id);
			$this->db->update('sppd', $data);
			return true;
		}

}	