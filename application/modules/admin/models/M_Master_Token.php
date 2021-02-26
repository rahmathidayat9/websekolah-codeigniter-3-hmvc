<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Token extends CI_Model {

	public function get_token($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_user_token",["id_user_token" => $id]);
		}else{
			return $this->db->get("tbl_user_token");
		}
	}

	public function delete($id)
	{
		$this->db->delete("tbl_user_token",["id_user_token" => $id]);
	}

}

/* End of file M_Master_Token.php */
/* Location: ./application/modules/admin/models/M_Master_Token.php */