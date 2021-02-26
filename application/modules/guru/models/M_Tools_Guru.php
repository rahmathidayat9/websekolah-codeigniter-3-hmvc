<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Tools_Guru extends CI_Model {

	public function upload_img($upload_path)
	{
		$config['upload_path'] 		= './asset/img/'.$upload_path;
		$config['allowed_types']	= 'png|jpg|jpeg|jfif|gif';
		$config['detect_mime']		= TRUE;
		$config['mod_mime_fix'] 	= TRUE;
		$this->load->library('upload',$config);
		if ($this->upload->do_upload('file')) {
			return $this->upload->data('file_name');
		}else{
			echo $this->upload->display_errors();
		}	
	}

	public function resize_image($path=NULL,$width=NULL,$height=NULL,$new_image=NULL)
	{
		$config['image_library'] = 'gd2';
		$config['source_image']  = './asset/img/'.$path;
		// $config['create_thumb']	 = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width'] 		=	$width; 
		$config['height'] 		=	$height;
		$config['quality'] 		= 	'100%';
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}

	public function create_thumb($path=NULL,$width=NULL,$height=NULL)
	{
		$config['image_library'] 	= 	'gd2';
		$config['source_image']  	= 	'./asset/img/'.$path;
		// $config['create_thumb']	= 	FALSE;
		$config['maintain_ratio'] 	= 	FALSE;
		$config['width'] 			=	$width; 
		$config['height'] 			=	$height;
		$config['quality'] 			= 	'100%';
		$config['new_image'] 		= 	'./asset/img/'.$path;
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}

	public function upload_file($path=NULL,$allowed_types=NULL)
	{
		$config['upload_path'] 		= './asset/'.$path;
		$config['allowed_types'] 	= $allowed_types;
		$config['detect_mime'] 		= TRUE;
		$config['mod_mime_fix'] 	= TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			return $this->upload->data('file_name');
		}else{
			echo $this->upload->display_errors();
		}
	}

}

/* End of file M_Tools_Guru.php */
/* Location: ./application/modules/guru/models/M_Tools_Guru.php */