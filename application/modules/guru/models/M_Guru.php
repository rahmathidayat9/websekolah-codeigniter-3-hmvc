<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Guru extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_user",["id_user" => $this->session->userdata("id_user")])->row_array();
	}

}

/* End of file M_Guru.php */
/* Location: ./application/modules/guru/models/M_Guru.php */