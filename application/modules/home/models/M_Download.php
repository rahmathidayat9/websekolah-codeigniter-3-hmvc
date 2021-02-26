<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Download extends CI_Model {

	public function get_file($limit,$start)
	{
		return $this->db->get("tbl_file",$limit,$start);
	}

	public function get_file_name($file_name)
	{
		return $this->db->get_where("tbl_file",["file_name" => $file_name]);
	}

}

/* End of file M_Download.php */
/* Location: ./application/modules/home/models/M_Download.php */