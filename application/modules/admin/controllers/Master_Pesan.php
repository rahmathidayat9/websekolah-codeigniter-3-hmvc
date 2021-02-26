<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Pesan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Pesan');
		//load helper
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']				= 'Pesan';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan']	= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 	= $this->M_Admin->get_all_unread_pesan();
		$data['all_pesan'] 			= $this->M_Master_Pesan->get_pesan()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_pesan',$data);	
		$this->load->view('layouts/footer');	
	}

	public function read_all_message()
	{
		$this->db->where('status_pesan',0)
				->set('status_pesan',1)
				->update('tbl_pesan');
		redirect('admin/master-pesan');
	}

	public function delete_pesan($id)
	{
		$this->M_Master_Pesan->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-pesan');
	}

	public function clear_pesan()
	{
		$this->db->empty_table("tbl_pesan");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-pesan');	
	}

}

/* End of file Master_Pesan.php */
/* Location: ./application/modules/admin/controllers/Master_Pesan.php */