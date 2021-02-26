<?php 

function get_csrf()
{	
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}

function edit_profile_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('username','username','required|min_length[2]',[
		'required' => 'username harus diisi',
		'min_length' => 'username terlalu pendek'
	]);
}

function change_password_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('new_password','new_password','required|min_length[4]',[
		'required' => 'password harus diisi',
		'min_length' => 'password terlalu pendek'
	]);
}

function delete_account_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('password','Password','required',[
		'required' => 'password harus diisi'
	]);
}