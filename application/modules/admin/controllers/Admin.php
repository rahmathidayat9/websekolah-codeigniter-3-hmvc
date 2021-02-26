<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Dashboard';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['total_user']				= $this->M_Admin->count_table_data("tbl_user");
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_admin/index',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file Admin.php */
/* Location: ./application/modules/admin/controllers/Admin.php */