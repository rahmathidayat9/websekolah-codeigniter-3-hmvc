<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Agenda extends CI_Model {

	public function get_agenda_by_id($id)
	{
		return $this->db->get_where("tbl_agenda",["id_agenda" => $id]);
	}

	public function get_agenda($limit=NULL,$start=NULL)
	{
		return $this->db->order_by('created_at','DESC')->get("tbl_agenda",$limit,$start);
	}

}

/* End of file M_Agenda.php */
/* Location: ./application/modules/home/models/M_Agenda.php */