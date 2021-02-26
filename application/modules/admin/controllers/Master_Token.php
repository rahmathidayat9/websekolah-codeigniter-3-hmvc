<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Token extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Token');
		//load helper
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Token';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['all_token']				= $this->M_Master_Token->get_token()->result_array();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_token',$data);
		$this->load->view('layouts/footer');
	}

	public function delete_token($id)
	{
		$this->M_Master_Token->delete($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-token');
	}

	public function clear_token()
	{
		$this->db->empty_table("tbl_user_token");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-token');
	}

}

/* End of file Master_Token.php */
/* Location: ./application/modules/admin/controllers/Master_Token.php */