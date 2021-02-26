<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Access_Manager extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Access_Manager');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{

		$data['title'] 					= 'Akses Manager';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan'] 	= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['all_menu'] 				= $this->db->get("tbl_menu")->result_array();
		$data['all_role'] 				= $this->db->get("tbl_role")->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_admin/access_manager',$data);
		$this->load->view('layouts/footer');
	}

	public function add_role()
	{
		$data_role = [
			'role' => htmlentities($this->input->post('role',TRUE))
		];
		$this->M_Admin->create("tbl_role",$data_role);
		$this->session->set_flashdata("success","Role ditambah");
		redirect('admin/access-manager');
	}

	public function role_access($role_id)
	{
		$data['title']					= 'Role Access';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['all_menu']			    = $this->db->get("tbl_menu")->result_array();
		$data['role']					= $this->db->get_where("tbl_role",["id_role" => $role_id])->row_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_admin/detail_access_manager',$data);
		$this->load->view('layouts/footer');
	}

	public function delete_access($id)
	{
		$this->db->where("id_role",$id);
		$this->db->delete("tbl_role");
		$this->session->set_flashdata("success","data berhasil dihapus");
		redirect('admin/access-manager');
	}

	public function change_access()
	{
		$role_id=$this->input->get('role_id');
		$menu_id=$this->input->get('menu_id');
		$check_access = $this->db->get_where("tbl_access_menu",["role_id" => $role_id,"menu_id" => $menu_id]);
		if ($check_access->num_rows()>0) {
			$this->db->where("role_id",$role_id);
			$this->db->where("menu_id",$menu_id);
			$this->db->delete("tbl_access_menu");
			$this->session->set_flashdata("warning","akses dinonaktifkan");
		}else{
			$data_access_menu = [
				"role_id" => $role_id,
				"menu_id" => $menu_id
			];
			$this->db->insert("tbl_access_menu",$data_access_menu);
			$this->session->set_flashdata("success","akses diaktifkan");
		}
	}

}

/* End of file Access_Manager.php */
/* Location: ./application/modules/admin/controllers/Access_Manager.php */