<?php
class M_hasil_kegiatan extends CI_Model{

	function get_all_hasil_kegiatan(){
		$hsl=$this->db->query("SELECT * FROM agenda_kegiatan,bidang_kegiatan,hasil_kegiatan where agenda_kegiatan.id_bidang_kegiatan=bidang_kegiatan.id_bidang_kegiatan AND hasil_kegiatan.id_agenda_kegiatan=agenda_kegiatan.id_agenda_kegiatan");
		return $hsl;
	}


	function hapus_hasil_kegiatan($kode){
		$hsl=$this->db->query("DELETE FROM hasil_kegiatan where id_hasil_kegiatan='$kode'");
		return $hsl;
	}

	public function add_hasil_kegiatan($data){
			$this->db->insert('hasil_kegiatan', $data);
			return true;
		}

		public function get_hasil_kegiatan_by_id($id){
			$query = $this->db->get_where('hasil_kegiatan', array('id_hasil_kegiatan' => $id));
			return $result = $query->row_array();
		}

		public function edit_hasil_kegiatan($data, $id){
			$this->db->where('id_hasil_kegiatan', $id);
			$this->db->update('hasil_kegiatan', $data);
			return true;
		}

}	