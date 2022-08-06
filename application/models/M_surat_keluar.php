<?php
class M_surat_keluar extends CI_Model{

	function get_all_surat_keluar(){
		$hsl=$this->db->query("SELECT * FROM surat_keluar,sifat_surat,kode_surat where surat_keluar.id_sifat_surat=sifat_surat.id_sifat_surat AND surat_keluar.kode_surat=kode_surat.kode_surat");
		return $hsl;
	}


	function hapus_surat_keluar($kode){
		$hsl=$this->db->query("DELETE FROM surat_keluar where id_surat_keluar='$kode'");
		return $hsl;
	}

	public function add_surat_keluar($data){
			$this->db->insert('surat_keluar', $data);
			return true;
		}

		public function get_surat_keluar_by_id($id){
			$query = $this->db->get_where('surat_keluar', array('id_surat_keluar' => $id));
			return $result = $query->row_array();
		}

		public function edit_surat_keluar($data, $id){
			$this->db->where('id_surat_keluar', $id);
			$this->db->update('surat_keluar', $data);
			return true;
		}

}	