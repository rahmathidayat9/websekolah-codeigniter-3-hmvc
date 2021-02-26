<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Menu_Manager extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_menu",$data);
	}
	
	public function get_access($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_menu",["id_menu" => $id]);
		}else{
			return $this->db->get("tbl_menu");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_menu",$id);
		return $this->db->update("tbl_menu",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_menu",["id_menu" => $id]);
	}

	public function clear()
	{
		return $this->db->empty_table('tbl_menu');
	}	

}

/* End of file M_Menu_Manager.php */
/* Location: ./application/modules/admin/models/M_Menu_Manager.php */