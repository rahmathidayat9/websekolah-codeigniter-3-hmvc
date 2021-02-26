<?php 

function get_csrf()
{
	$ci = get_instance();		
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" value="'.$ci->security->get_csrf_hash().'">';
}

//validasi pesan di halaman contact
function contact_validation()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('nama','Nama','required|min_length[2]|max_length[15]',[
		'required' => 'nama harus diisi',
		'min_length' => 'nama terlalu pendek',
		'max_length' => 'nama terlalu panjang'
	]);
	$ci->form_validation->set_rules('email','Email','required|valid_email',[
		'required' => 'email harus diisi',
		'valid_email' => 'email tidak valid'
	]);
	$ci->form_validation->set_rules('isi','Isi','required|min_length[5]|max_length[700]',[
		'required' => 'isi pesan harus diisi',
		'min_length' => 'pesan terlalu pendek',
		'max_length' => 'pesan terlalu panjang'
	]);
}

function comment_validation()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('komentar_nama','Nama','required|min_length[2]|max_length[15]',[
		'required' => 'nama harus diisi',
		'min_length' => 'nama terlalu pendek',
		'max_length' => 'nama terlalu panjang'
	]);
	$ci->form_validation->set_rules('komentar_isi','Isi','required|min_length[4]',[
		'required' => 'komentar harus diisi',
		'min_length' => 'komentar terlalu pendek'
	]);
}

function reply_comment_validation()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('balasan_nama','Nama','required|min_length[2]|max_length[15]',[
		'required' => 'nama harus diisi',
		'min_length' => 'nama terlalu pendek',
		'max_length' => 'nama terlalu panjang'
	]);
	$ci->form_validation->set_rules('balasan_isi','Isi','required|min_length[4]',[
		'required' => 'komentar harus diisi',
		'min_length' => 'komentar terlalu pendek'
	]);
}

function count_data($table)
{
	$ci = get_instance();
	return $ci->db->count_all($table);
}