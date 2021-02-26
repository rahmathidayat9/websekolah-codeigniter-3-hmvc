<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pengumuman extends CI_Model {

	public function get_pengumuman_by_id($id=NULL)
	{
		return $this->db->get_where("tbl_pengumuman",["id_pengumuman" => $id]);
	}

	public function get_pengumuman($limit,$start)
	{
		return $this->db->order_by('created_at','DESC')->get("tbl_pengumuman",$limit,$start);
	}

}

/* End of file M_Pengumuman.php */
/* Location: ./application/modules/home/models/M_Pengumuman.php */