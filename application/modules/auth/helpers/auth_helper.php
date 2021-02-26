<?php 

//fungsi untuk mengenerate csrf token
function get_csrf()
{
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}

function is_auth_protect($status=NULL)
{
	$ci=get_instance();
	if ($status=="logout") {
		if ($ci->session->userdata("id_user")) {
			$ci->session->set_flashdata('error','Anda sudah login');
			redirect('home');
		}
	}elseif($status=="login"){
		if (!$ci->session->userdata("id_user")) {
			$ci->session->set_flashdata('error','Login terlebih dahulu');
			redirect('login');
		}
	}
}

//fungsi validasi untuk register
function register_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('username','Username','required|min_length[2]|max_length[15]',[
		'required' =>	'username belum diisi !', 
		'min_length'	=>	'username terlalu pendek !'
	]);
	$ci->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_user.email]',[
		'required' =>	'email belum diisi !', 
		'valid_email'	=>	'format email tidak valid !',
		'is_unique'	=>	'email ini sudah terdaftar !'
	]);
	$ci->form_validation->set_rules('password','Password','required|min_length[2]',[
		'required' =>	'password belum diisi !', 
		'min_length'	=>	'password terlalu pendek !'
	]);
}

//fungsi validasi untuk login
function login_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('email','Email','required|valid_email',[
		'required' =>	'email belum diisi !', 
		'valid_email'	=>	'format email tidak valid !'
	]);
	$ci->form_validation->set_rules('password','Password','required|min_length[2]',[
		'required' =>	'password belum diisi !', 
		'min_length'	=>	'password terlalu pendek !'
	]);
}

//send email untuk verifikasi dan reset katasandi
function send_email_auth($type=NULL)
{
	$ci=get_instance();
	$config=[
		'protocol' 	=> 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_pass' => '1234512345',
		'smtp_user' => 'fitrisf96@gmail.com',
		'charset' 	=> 'utf-8',
		'newline' 	=> "\r\n"
	];
	$ci->email->initialize($config);
	$ci->email->set_mailtype('html');

	$ci->email->from('fitrisf96@gmail.com','OUR-SCHOOL');
	$ci->email->to($ci->input->post('email'));

	switch ($type) {
		case 'verify_account':
			$ci->email->subject('VERIFIKASI AKUN ANDA');
			$ci->email->message('Masukan Kode Verifikasi Ini..');
			break;
		case 'reset_password':
			$ci->email->subject('RESET KATASANDI OUR-SCHOOL');
			$ci->email->message('Ini katasandi baru anda...');
			break;
		default:
			echo "Tipe kirim email Belum Di set";
			die();
			break;
	}

	if ($ci->email->send()) {
		return TRUE;
	}else{
		echo $ci->email->display_errors();
	}
}

