<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library 
		$this->load->library('form_validation');
		//load model
		$this->load->model('M_User');
		//load helper
		$this->load->helper('user');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_User->get_user_login_data();
		//mencegah user masuk tanpa autentikasi
		// is_auth_protect("login");
		// is_user();
	}

	public function index()
	{
		$data['title']			= 'Profil Saya';
		$data['user_login_data'] = $this->user_login_data;
		############# ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_user/index',$data);
		$this->load->view('layouts/footer');
	}

	public function download()
	{
		$data['title']			= 'Download';
		$data['user_login_data'] = $this->user_login_data;
		############# ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_user/user_download',$data);
		$this->load->view('layouts/footer');
	}

	public function edit_profile()
	{
		$data['title']			= 'Edit Profil';
		$data['user_login_data'] = $this->user_login_data;
		############# ============= ##############
		edit_profile_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_user/user_edit_profile',$data);
			$this->load->view('layouts/footer');
		}else{
			$id_user = $this->input->post('id_user');
			$old_img = $this->input->post('old_img');
			////////////////////////////////////////
			if (!empty($_FILES['file']['name'])) {
				$img = $this->M_User->upload("img/profile","png|jpg|jpeg|gif|jfif");
				$this->M_User->resize_img('profile/'.$img,'500','500');
				if ($old_img!="user.png"){
					unlink(FCPATH.'./asset/img/profile/'.$old_img);
				}	
			}else{
				$img = $this->input->post('old_img');
			}
			/////////////////////////////////////////
			$data_user = [
				'username' => $this->input->post('username'),
				'profile_image'	=>	$img
			];
			$this->M_User->update_user($id_user,$data_user);
			$this->session->set_flashdata('success', 'Akun berhasil di edit');
			redirect('user/edit-profile');
		}
	}

	public function change_password()
	{
		$data['title']			= 'Ubah Password';
		$data['user_login_data'] = $this->user_login_data;
		############# ============= ##############
		change_password_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_user/user_change_password',$data);
			$this->load->view('layouts/footer');	
		} else {
			$id_user 		= $this->input->post('id_user');
			$old_password 	= $this->input->post('old_password');// password hash 
			$your_password 	= $this->input->post('your_password'); // password sekarang
			$new_password 	= $this->input->post('new_password'); // password baru
			if (!password_verify($new_password, $old_password)) {
				if (password_verify($your_password, $old_password)) {
					$this->M_User->update_user($id_user,["password" => password_hash($new_password, PASSWORD_DEFAULT)]);
					$this->session->set_flashdata('success', 'Password anda berhasil diperbarui');
					redirect('user/change-password');
				}else{
					$this->session->set_flashdata('danger', 'Password yang anda masukan salah');
					redirect('user/change-password');
				}
			}else{
				$this->session->set_flashdata('warning', 'Password tidak boleh sama dengan password sekarang');
				redirect('user/change-password');
			}
		}
	}

	public function delete_my_account()
	{
		$data['title']			= 'Hapus Akun Saya';
		$data['user_login_data'] = $this->user_login_data;
		############# ============= ##############
		delete_account_validation();
		if ($this->form_validation->run()==FALSE) {	
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_user/user_delete_my_account',$data);
			$this->load->view('layouts/footer');
		}else{
			if (password_verify($this->input->post('password'), $this->input->post('mypassword'))) {
				$this->M_User->delete($this->input->post('id_user'));
				redirect('logout');
			}else{
				$this->session->set_flashdata('danger', 'Password yang anda masukan salah');
				redirect('user/delete_my_account');
			}
		}
	}

}

/* End of file User.php */
/* Location: ./application/modules/admin/controllers/User.php */