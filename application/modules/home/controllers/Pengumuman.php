<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengumuman extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		//load model
		$this->load->model('M_Home');
		$this->load->model('M_Pengumuman');
		//load helper
		$this->load->helper('home');
		//jika user melakukan login , maka lakukan ini
		if ($this->session->userdata("id_user")) {
			$this->user_login_data = $this->M_Home->get_user_login_data();
		}
	}

	public function index()
	{
		$config['base_url'] 	= site_url('home/Pengumuman/index');
		$config['total_rows'] 	= $this->db->count_all("tbl_pengumuman");
		$config['per_page'] 	= 6;
		$this->pagination->initialize($config);
		//
		$data['start'] 				= $this->uri->segment(4);
		$data['title'] 			 	= 'Pengumuman';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['pengumuman']		 	=	$this->M_Pengumuman->get_pengumuman($config['per_page'],$data['start'])->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/pengumuman',$data);
		$this->load->view('layouts/footer');
	}

	//untuk ditampilkan di modal 
	public function show_pengumuman($id)
	{
		$data = $this->M_Pengumuman->get_pengumuman_by_id($id)->row_array();
		echo json_encode($data);
	}

}

/* End of file Pengumuman.php */
/* Location: ./application/modules/home/controllers/Pengumuman.php */