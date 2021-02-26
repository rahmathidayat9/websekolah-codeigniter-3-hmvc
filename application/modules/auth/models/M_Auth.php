<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Auth extends CI_Model {

	public function register()
	{
		$data_newuser = [
			"username"	=>	htmlentities($this->input->post("username",TRUE)),
			"email"		=>	htmlentities($this->input->post("email",TRUE)),
			"password"	=>	password_hash($this->input->post("password"), PASSWORD_DEFAULT),
			"profile_image" => "user.png",
			"role_id"	=>	3,
			"is_active"	=>	0
		];
		$this->db->insert("tbl_user",$data_newuser);
		// $this->db->insert("tbl_user_token",[
		// 	"token" =>	random_int(5000000, 9000000),
		// 	"email"	=>	$data_newuser["email"]
		// ]);
		$this->session->set_flashdata('success','Selamat , akun anda berhasil diregistrasi , akun menunggu aktivasi oleh admin');	
		redirect('login');
	}

	public function login()
	{
		$email 		= $this->input->post("email");
		$password 	= $this->input->post("password");
		$user = $this->db->get_where("tbl_user",["email" => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				if ($user['is_active']==1) {
					$data_session = [
						"id_user" => $user["id_user"],
						"role_id" => $user["role_id"]	
					];
					switch ($user["role_id"]) {
						case 1:
							$this->session->set_userdata($data_session);
							redirect('admin');							
							break;
						case 2:
							$this->session->set_userdata($data_session);
							$this->session->set_flashdata('info','Selamat datang '.$user["username"]);
							redirect('home');							
							break;
						case 3:
							$this->session->set_userdata($data_session);
							$this->session->set_flashdata('info','Selamat datang '.$user["username"]);
							redirect('home');							
							break;
						default:
							$this->session->set_flashdata('error','Oops , Role anda tidak ditemukan');
							redirect('login');
							break;
					}
				}else{
					$this->session->set_flashdata('warning','Akun anda belum di aktivasi');
					redirect('login');	
				}			
			}else{
				$this->session->set_flashdata('error','Password salah');
				redirect('login');	
			}
		}else{
			$this->session->set_flashdata('error','Email tidak ditemukan');
			redirect('login');	
		}
	}

}

/* End of file M_Auth.php */
/* Location: ./application/modules/auth/models/M_Auth.php */