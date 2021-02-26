<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library
		$this->load->library('pagination');
		$this->load->library('form_validation');
		//load model
		$this->load->model('M_Home');
		$this->load->model('M_Download');
		//load helper
		$this->load->helper('home');
		$this->load->helper('download');
		//jika user melakukan login , maka lakukan ini
		if ($this->session->userdata("id_user")) {
			$this->user_login_data = $this->M_Home->get_user_login_data();
		}
	}

	public function index()
	{
		$config['base_url'] = site_url('home/Download/index');
		$config['total_rows'] = $this->db->count_all("tbl_file");
		$config['per_page'] = 6;
		$this->pagination->initialize($config);
		///////////////////////////////////////
		$data['start'] = $this->uri->segment(4);
		$data['title'] 			= 'Download';
		$data['user_login_data']= $this->user_login_data;
		$data['all_files'] 		= $this->M_Download->get_file($config['per_page'],$data['start'])->result_array();
		$data['check_files'] 	= count_data("tbl_file");
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/download',$data);
		$this->load->view('layouts/footer');
	}

	public function download_file($file_name)
	{
		$file = $this->M_Download->get_file_name($file_name);
		if ($file->num_rows()>0) {
			$file=$file->row_array();
			force_download("./asset/download/".$file_name,NULL);
			$this->session->set_flashdata('success', 'File didownload');
			redirect('download');
		}else{
			$this->session->set_flashdata('warning', 'File tidak ditemukan');
			redirect('download');
		}
	}

}

/* End of file Download.php */
/* Location: ./application/modules/home/controllers/Download.php */