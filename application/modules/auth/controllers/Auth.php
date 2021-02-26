<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load library	
		$this->load->library('form_validation');
		$this->load->library('email');
		//load model
		$this->load->model('M_Auth');
		//load helper
		$this->load->helper('auth');
	}

	public function index()
	{
		$data=[
			'title' => 'Login'
		];
		//helper function dari auth_helper
		login_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/login',$data);
			$this->load->view('layouts/footer',$data);
		}else{
			$this->M_Auth->login();
		}
	}

	public function register()
	{
		$data=[
			'title' => 'Register'
		];
		//helper function dari auth_helper
		register_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/register',$data);
			$this->load->view('layouts/footer',$data);	
		}else{
			$this->M_Auth->register();
		}
	}

	public function verify_account()
	{
		$data=[
			'title' => 'Verify Account'
		];
		//helper function dari auth_helper
		login_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/verify_account',$data);
			$this->load->view('layouts/footer',$data);
		}else{
			$this->M_Auth->login();
		}	
	}

	public function forgot_password()
	{
		$data=[
			'title' => 'Forgot Password'
		];
		//helper function dari auth_helper
		login_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/forgot_password',$data);
			$this->load->view('layouts/footer',$data);
		}else{
			$this->M_Auth->login();
		}	
	}

	public function logout()
	{	
		$this->session->unset_userdata(["id_user","role_id"]);
		$this->session->set_flashdata('info','Anda telah logout');
		redirect('login');
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */