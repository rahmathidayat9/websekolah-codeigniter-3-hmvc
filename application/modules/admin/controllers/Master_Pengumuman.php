<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Pengumuman extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Pengumuman');
		//load helper
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Pengumuman';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['pengumuman']				= $this->M_Master_Pengumuman->get_pengumuman()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_pengumuman',$data);
		$this->load->view('layouts/footer');
	}

	public function delete_pengumuman($id)
	{
		$this->M_Master_Pengumuman->delete($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-pengumuman');
	}

	public function clear_pengumuman()
	{
		$this->db->empty_table("tbl_pengumuman");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-pengumuman');	
	}

}

/* End of file Master_Pengumuman.php */
/* Location: ./application/modules/admin/controllers/Master_Pengumuman.php */