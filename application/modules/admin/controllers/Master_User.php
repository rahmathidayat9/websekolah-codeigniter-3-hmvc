<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Master_User');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']				= 'User';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan']	= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 	= $this->M_Admin->get_all_unread_pesan();
		$data['all_user']				= $this->M_Master_User->get_user()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_user',$data);	
		$this->load->view('layouts/footer');
	}

	public function add_user()
	{
		$data = [
			'username' 	=> htmlentities($this->input->post('username',TRUE)),
			'email' 	=> htmlentities($this->input->post('email',TRUE)),
			'password' 	=> password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
			'profile_image' => 'user.png',
			'role_id' 	=> $this->input->post('role_id'),
			'is_active' => $this->input->post('is_active') 
		];	
		$this->M_Master_User->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-user');
	}

	//tampilkan di modal edit
	public function show_user($id)
	{
	 	$data = $this->M_Master_User->get_user($id)->row_array();
	 	echo json_encode($data);
	} 

	public function update_user()
	{
		$id_user=$this->input->post('id_user');
		if (!empty($this->input->post('newpassword'))) {
			$password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
		}else{
			$password = $this->input->post('oldpassword');
		}
		$data = [
			'username' 	=> htmlentities($this->input->post('username')),
			'email' 	=> htmlentities($this->input->post('email')),
			'password' 	=> $password,
			'role_id'	=> $this->input->post('role_id'),
			'is_active'	=> $this->input->post('is_active')
		]; 
		$this->M_Master_User->update($id_user,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-user'); 
	}

	public function switch_access_user()
	{
		$id_user=$this->input->get('id_user');
		$is_active=$this->input->get('is_active');
		if ($is_active==1) {
			$this->M_Master_User->update($id_user,['is_active' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_User->update($id_user,['is_active' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}

	public function delete_user($id)
	{
		$this->M_Master_User->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-user');
	}

	public function clear_user()
	{
		$this->db->empty_table("tbl_user");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-user');
	}

}

/* End of file Master_User.php */
/* Location: ./application/modules/admin/controllers/Master_User.php */