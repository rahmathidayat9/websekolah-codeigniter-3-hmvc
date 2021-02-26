<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library
		$this->load->library('form_validation');
		//load model
		$this->load->model('M_Home');
		//load helper
		$this->load->helper('home');
		//jika user melakukan login , maka lakukan ini
		if ($this->session->userdata("id_user")) {
			$this->user_login_data = $this->M_Home->get_user_login_data();
		}
	}

	public function index()
	{
		$data['title'] 				= 'Home';
		$data['all_jurusan'] 		= $this->M_Home->get_info_jurusan();
		$data['user_login_data'] 	= $this->user_login_data;
		$data['new_pengumuman'] 	= $this->db->order_by('created_at','DESC')->get('tbl_pengumuman',3)->result_array();
		$data['new_agenda']			=	$this->db->query("SELECT * FROM tbl_agenda WHERE created_at <= agenda_mulai ORDER BY created_at DESC LIMIT 0,3")->result_array();
		$data['new_blogs']			=	$this->db->order_by('created_at','DESC')->get('tbl_blog',2)->result_array();
		$data['check_agenda'] 		= count_data("tbl_agenda");
		$data['check_jurusan'] 		= count_data("tbl_jurusan");
		$data['check_pengumuman'] 	= count_data("tbl_pengumuman");
		$data['check_blog']			= count_data("tbl_blog");
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/index',$data);
		$this->load->view('layouts/footer');
	}

	public function about()
	{
		$data['title'] 				= 'About';
		$data['user_login_data'] 	= $this->user_login_data;
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/about');
		$this->load->view('layouts/footer');	
	}

	public function contact()
	{	

		$data['title'] 				= 'Contact';
		$data['user_login_data'] 	= $this->user_login_data;
		########### ============= ##############
		//validasi pesan di halaman/view contact
		contact_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('v_home/contact');
			$this->load->view('layouts/footer');	
		}else{
			$this->M_Home->send_contact_message();		
		}
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */