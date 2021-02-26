<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_User extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_user",["id_user" => $this->session->userdata("id_user")])->row_array();
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_user",["id_user" => $id]);
	}

	public function update_user($id,$data=[])
	{	
		$this->db->where("id_user",$id);
		return $this->db->update("tbl_user",$data);
	}

	public function upload($path,$allowed_types)
	{
		$config['upload_path']   = './asset/'.$path;
		$config['allowed_types'] = $allowed_types;
		$config['detect_mime']   = TRUE;
		$config['mod_mime_fix']  = TRUE;
		$this->load->library('upload',$config);
		if ($this->upload->do_upload('file')) {
			return $this->upload->data('file_name');
		}else{
			echo $this->upload->display_errors();
		}
	}

	public function resize_img($path,$width,$height)
	{
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 		= './asset/img/'.$path;
		$config['maintain_ratio'] 	= FALSE;
		$config['width']			= $width;
		$config['height']			= $height;
		$config['quality'] 			= 	'100%';
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}

}

/* End of file M_User.php */
/* Location: ./application/modules/user/models/M_User.php */