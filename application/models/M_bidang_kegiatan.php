<?php
class M_bidang_kegiatan extends CI_Model{

	function get_all_bidang_kegiatan(){
		$hsl=$this->db->query("SELECT * FROM bidang_kegiatan");
		return $hsl;
	}


	function hapus_bidang_kegiatan($kode){
		$hsl=$this->db->query("DELETE FROM bidang_kegiatan where id_bidang_kegiatan='$kode'");
		return $hsl;
	}

	public function add_bidang_kegiatan($data){
			$this->db->insert('bidang_kegiatan', $data);
			return true;
		}

		public function get_bidang_kegiatan_by_id($id){
			$query = $this->db->get_where('bidang_kegiatan', array('id_bidang_kegiatan' => $id));
			return $result = $query->row_array();
		}

		public function edit_bidang_kegiatan($data, $id){
			$this->db->where('id_bidang_kegiatan', $id);
			$this->db->update('bidang_kegiatan', $data);
			return true;
		}

}	