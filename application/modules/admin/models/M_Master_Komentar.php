<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Komentar extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_komentar",$data);
	}

	public function get_komentar($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_komentar",["id_komentar" => $id]);
		}else{
			return $this->db->get("tbl_komentar");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_komentar",$id);
		return $this->db->update("tbl_komentar",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_komentar",["id_komentar" => $id]);
	}

}

/* End of file M_Master_Komentar.php */
/* Location: ./application/modules/admin/models/M_Master_Komentar.php */