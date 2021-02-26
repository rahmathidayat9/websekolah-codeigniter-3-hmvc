<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library
		$this->load->library('pagination');
		//load model
		$this->load->model('M_Home');
		$this->load->model('M_Agenda');
		//load helper
		$this->load->helper('home');
		//jika user melakukan login , maka lakukan ini
		if ($this->session->userdata("id_user")) {
			$this->user_login_data = $this->M_Home->get_user_login_data();
		}
	}

	public function index()
	{
		$config['base_url'] 	= site_url('home/Agenda/index');
		$config['total_rows'] 	= $this->db->count_all("tbl_agenda");
		$config['per_page'] 	= 6;
		$this->pagination->initialize($config);
		//
		$data['start'] 				= $this->uri->segment(4);
		$data['title'] 				= 'Agenda';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['all_agenda'] 		= $this->M_Agenda->get_agenda($config['per_page'],$data['start'])->result_array();
		$data['check_agenda'] 		= count_data("tbl_agenda");
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/agenda',$data);
		$this->load->view('layouts/footer');
	}

	//untuk ditampilkan di modal 
	public function show_agenda($id)
	{
		$data = $this->M_Agenda->get_agenda_by_id($id)->row_array();
		echo json_encode($data);
	}

}

/* End of file Agenda.php */
/* Location: ./application/modules/home/controllers/Agenda.php */