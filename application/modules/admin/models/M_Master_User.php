<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_User extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_user",$data);
	}
	
	public function get_user($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_user",["id_user" => $id]);
		}else{
			return $this->db->get('tbl_user');
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_user",$id);
		return $this->db->update("tbl_user",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_user",["id_user" => $id]);
	}

}

/* End of file M_Master_User.php */
/* Location: ./application/modules/admin/models/M_Master_User.php */