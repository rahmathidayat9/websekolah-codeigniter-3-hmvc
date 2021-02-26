<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guru extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Guru');	
		//load helper
		// $this->load->helper('guru');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Guru->get_user_login_data();
	}

	public function index()
	{
		$data['title']				= 'Dashboard Guru';
		$data['user_login_data'] 	= $this->user_login_data;
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_guru/index',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file Guru.php */
/* Location: ./application/modules/guru/controllers/Guru.php */