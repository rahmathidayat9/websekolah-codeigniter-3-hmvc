<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Menu extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_user_menu",$data);
	}
	
	public function get_menu($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_user_menu",["id_user_menu" => $id]);
		}else{
			return $this->db->get("tbl_user_menu");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_user_menu",$id);
		return $this->db->update("tbl_user_menu",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_user_menu",["id_user_menu" => $id]);
	}

}

/* End of file M_Master_Menu.php */
/* Location: ./application/modules/admin/models/M_Master_Menu.php */