<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Pesan extends CI_Model {

	public function get_all_unread_pesan($option=NULL)
	{

		if ($option=="count") {
			return $this->db->get_where("tbl_pesan",["status_pesan" => 0])->num_rows();
		}else{
			return $this->db->order_by("created_at",'DESC')
						->where("status_pesan",0)
						->get("tbl_pesan",5)->result_array();
		}
	}

	public function get_pesan($id=NULL)
	{
		if ($id) {
			$this->db->get_where("tbl_pesan",["id_pesan" => $id]);
		}else{
			return $this->db->get("tbl_pesan");
		}
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_pesan",["id_pesan" => $id]);
	}

}

/* End of file M_Master_Pesan.php */
/* Location: ./application/modules/admin/models/M_Master_Pesan.php */