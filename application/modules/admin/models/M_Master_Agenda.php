<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Agenda extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_agenda",$data);
	}
	
	public function get_agenda($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_agenda",["id_agenda" => $id]);
		}else{
			return $this->db->get("tbl_agenda");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_agenda",$id);
		return $this->db->update("tbl_agenda",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_agenda",["id_agenda" => $id]);
	}

	public function clear()
	{
		return $this->db->empty_table('tbl_agenda');
	}

}

/* End of file M_Master_Agenda.php */
/* Location: ./application/modules/admin/models/M_Master_Agenda.php */