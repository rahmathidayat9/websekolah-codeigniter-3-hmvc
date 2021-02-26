<?php 

function get_csrf()
{	
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}

function write_blog_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('blog_title','Blog_title','required|max_length[45]|min_length[4]|is_unique[tbl_blog.blog_title]',[
		'required' => 'kolom judul harus diisi !',
		'max_length' => 'judul terlalu panjang',
		'min_length' => 'judul terlalu pendek',
		'is_unique' => 'judul blog ini sudah digunakan , gunakan judul lain'

	]);
	$ci->form_validation->set_rules('blog_author','Blog_author','required|max_length[35]|min_length[2]',[
		'required' => 'kolom author harus diisi !',
		'max_length' => 'author terlalu panjang',
		'min_length' => 'author terlalu pendek'

	]);
	$ci->form_validation->set_rules('blog_isi','Blog_isi','min_length[250]',[
		'required' => 'kolom blog harus diisi !',
		'min_length' => 'minimal 250 karakter huruf'

	]);
}

function write_agenda_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('agenda_nama','N','required|is_unique[tbl_agenda.agenda_nama]',[
		'required' => 'nama agenda harus diisi !',
		'is_unique' => 'nama agenda ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('agenda_tempat','T','required',[
		'required' => 'tempat harus diisi !',
	]);
	$ci->form_validation->set_rules('agenda_mulai','M','required',[
		'required' => 'mulai agenda harus diisi !'
	]);
	$ci->form_validation->set_rules('agenda_selesai','S','required',[
		'required' => 'selesai agenda harus diisi !'
	]);
	$ci->form_validation->set_rules('agenda_deskripsi','D','required|min_length[10]',[
		'required' => 'deskripsi harus diisi !',
		'min_length' => 'deskripsi terlalu pendek'
	]);
}

function write_pengumuman_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('pengumuman_nama','N','required|is_unique[tbl_pengumuman.pengumuman_nama]',[
		'required' => 'nama pengumuman harus diisi !',
		'is_unique' => 'nama pengmuman ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('pengumuman_deskripsi','D','required|min_length[10]',[
		'required' => 'deskripsi harus diisi !',
		'min_length' => 'deskripsi terlalu pendek'
	]);
}

function create_slug($str)
{
	$illegal_string=[" ","?","!","(",")","^","$","#","@","{","}","+","[","]","/","'\'",
					"<",">",";",":","|","'",'"',",","`","*","%"];
	return str_replace($illegal_string,"-",$str);
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

function is_guru()
{
	$ci=get_instance();
	if ($ci->session->userdata("role_id")==3) {
		redirect('not-found');
	}else{
		return TRUE;
	}
}