<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Admin extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_user",["id_user" => $this->session->userdata("id_user")])->row_array();
	}

	public function count_table_data($table)
	{
		return $this->db->count_all($table);
	}

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
			return $this->db->get("tbl_pesan",["id_pesan" => $id]);
		}
	}

	public function create($table,$data=[])
	{
		return $this->db->insert($table,$data);
	}	
	
}

/* End of file M_Admin.php */
/* Location: ./application/modules/admin/models/M_Admin.php */