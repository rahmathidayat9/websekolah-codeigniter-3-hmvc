<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Write extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library
		$this->load->library('form_validation');
		//load model
		$this->load->model('M_Guru');
		$this->load->model('M_Write');
		$this->load->model('M_Tools_Guru');
		//load helper
		$this->load->helper('guru');
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Guru->get_user_login_data();
	}

	public function index()
	{
		
	}

	public function write_blog()
	{
		$data['title']				= 'Tulis Blog';
		$data['user_login_data'] 	= $this->user_login_data;
		########### ============= ##############
		write_blog_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_write/write_blog',$data);
			$this->load->view('layouts/footer');	
		}else{
			$blog_img = $this->M_Tools_Guru->upload_img("blog");
			$thumb_img = $this->M_Tools_Guru->upload_img("thumb");
			$this->M_Tools_Guru->create_thumb('blog/'.$thumb_img,'300','150');
			$data_blog = [
				'blog_slug' => create_slug(strtolower($this->input->post('blog_title'))),
				'blog_author'	=>	htmlentities($this->input->post('blog_author',TRUE)),
				'blog_title'	=>	htmlentities($this->input->post('blog_title',TRUE)),
				'blog_isi'	=>	$this->input->post('blog_isi',TRUE),
				'blog_img'	=>	$blog_img,
				'blog_thumb' => $thumb_img,
				'blog_kategori_id'	=> $this->input->post('blog_kategori_id'),
				'user_id'	=> $data['user_login_data']['id_user'] 
			];
			$this->db->insert('tbl_blog',$data_blog);
			$this->session->set_flashdata('success', 'Blog berhasil dibuat');
			redirect('guru/write-blog');
		}
	}

	public function write_agenda()
	{
		$data['title']				= 'Tulis Agenda';
		$data['user_login_data'] 	= $this->user_login_data;
		########### ============= ##############
		write_agenda_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_write/write_agenda',$data);
			$this->load->view('layouts/footer');	
		}else{
			$waktu=empty($this->input->post('agenda_waktu')) ? "-" : $this->input->post('agenda_waktu');
			$data_agenda = [
				'agenda_nama'	 	=> htmlspecialchars($this->input->post('agenda_nama',TRUE)),
				'agenda_mulai' 		=> $this->input->post('agenda_mulai'),
				'agenda_selesai' 	=> $this->input->post('agenda_selesai'),
				'agenda_waktu' 		=> $waktu,
				'agenda_deskripsi' 	=> $this->input->post('agenda_deskripsi',TRUE),
				'agenda_tempat' 	=> htmlspecialchars($this->input->post('agenda_tempat',TRUE)),
				'agenda_keterangan' => htmlspecialchars($this->input->post('agenda_keterangan',TRUE)),
				'agenda_author' 	=> $data['user_login_data']['username']
			];
			$this->db->insert('tbl_agenda',$data_agenda);
			$this->session->set_flashdata('success', 'Agenda berhasil dibuat');
			redirect('guru/write-agenda');
		}
	}

	public function write_pengumuman()
	{
		$data['title']				= 'Tulis Pengumuman';
		$data['user_login_data'] 	= $this->user_login_data;
		########### ============= ##############
		write_pengumuman_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/header',$data);
			$this->load->view('layouts/navbar',$data);
			$this->load->view('layouts/sidebar',$data);
			$this->load->view('v_write/write_pengumuman',$data);
			$this->load->view('layouts/footer');	
		}else{
			$data_pengumuman = [
				'pengumuman_nama' => htmlentities($this->input->post('pengumuman_nama',TRUE)),
				'pengumuman_deskripsi' => $this->input->post('pengumuman_deskripsi',TRUE)
			];
			$this->db->insert('tbl_pengumuman',$data_pengumuman);
			$this->session->set_flashdata('success', 'Pengumuman berhasil dibuat');
			redirect('guru/write-pengumuman');	
		}
	}

}

/* End of file Write.php */
/* Location: ./application/modules/admin/controllers/Write.php */