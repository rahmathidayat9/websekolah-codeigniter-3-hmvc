<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Pengumuman extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_pengumuman",$data);
	}

	public function get_pengumuman($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_pengumuman",["id_pengumuman" => $id]);
		}else{
			return $this->db->get("tbl_pengumuman");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_pengumuman",$id);
		return $this->db->update("tbl_pengumuman",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_pengumuman",["id_pengumuman" => $id]);
	}

}

/* End of file M_Master_Pengumuman.php */
/* Location: ./application/modules/admin/models/M_Master_Pengumuman.php */