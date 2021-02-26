<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Write extends CI_Model {

	public function create($table,$data=[])
	{
		return $this->db->insert($table,$data);
	}

}

/* End of file M_Write.php */
/* Location: ./application/modules/guru/models/M_Write.php */