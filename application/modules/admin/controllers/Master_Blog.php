<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Blog extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library
		$this->load->library('form_validation');
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Blog');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{

		$data['title']					= 'Blog';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['blogs']					= $this->M_Master_Blog->get_blog()->result_array();
		$data['kategori_blog']			= $this->db->get('tbl_kategori_blog')->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_blog',$data);
		$this->load->view('layouts/footer');
	}

	//tampilkan di modal edit
	public function show_blog($id)
	{
	 	$data = $this->M_Master_Blog->get_blog($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_blog()
	{
		$id_blog=$this->input->post('id_blog');
		$data = [
			'blog_title' 	=> htmlentities($this->input->post('blog_title',TRUE)),
			'blog_author' 	=> htmlentities($this->input->post('blog_author',TRUE)),
			'blog_kategori_id'	=> $this->input->post('blog_kategori_id'),
		]; 
		$this->M_Master_Blog->update($id_blog,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-blog'); 
	}

	public function delete_blog($id)
	{
		$blog = $this->M_Master_Blog->get_blog($id)->row_array();
		$blog_img = $blog['blog_img'];
		$blog_thumb = $blog['blog_thumb'];
		unlink(FCPATH.'./asset/img/blog/'.$blog_img);
		unlink(FCPATH.'./asset/img/blog/'.$blog_thumb);
		$this->M_Master_Blog->delete($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-blog');
	}

	public function clear_blog()
	{
		$get_blog = $this->M_Master_Blog->get_blog()->result_array();
		foreach ($get_blog as $blog) {
			unlink("./asset/img/blog/".$blog['blog_img']);
			unlink("./asset/img/blog/".$blog['blog_thumb']);
		}
		$this->db->empty_table("tbl_blog");
		$this->session->set_flashdata('success', 'data berhasil dikosongkan');
		redirect('admin/master-blog');
	}

	################# ################# ################### ################### #####################
	#									   KATEGORI BLOG											#
	################# ################# ################### ################### #####################
	public function add_kategori_blog()
	{	
		///validasi nama yang sama 
		$this->form_validation->set_rules('nama_kategori', 'fieldlabel', 'trim|required|min_length[3]|is_unique[tbl_kategori_blog.nama_kategori]');
		if ($this->form_validation->run()==TRUE) {
			$this->M_Master_Blog->add_kategori();
			$this->session->set_flashdata('success', 'data berhasil ditambah');
			redirect('admin/master-blog');
		}else{
			$this->session->set_flashdata('danger', 'data gagal ditambah');
			redirect('admin/master-blog');
		}
	}

	public function show_kategori_blog($id)
	{
	 	$data = $this->M_Master_Blog->get_kategori_blog($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_kategori_blog()
	{
				///validasi nama yang sama 
		$this->form_validation->set_rules('nama_kategori', 'fieldlabel', 'trim|required|min_length[3]|is_unique[tbl_kategori_blog.nama_kategori]');
		if ($this->form_validation->run()==TRUE) {
			$id_kategori_blog=$this->input->post('id_kategori_blog');
			$data = [
				'nama_kategori' => htmlentities($this->input->post('nama_kategori',TRUE))
			]; 
			$this->db->where('id_kategori_blog',$id_kategori_blog);
			$this->db->update('tbl_kategori_blog',$data);
			$this->session->set_flashdata('success','Data berhasil diubah');
			redirect('admin/master-blog'); 	
		} else {
			$this->session->set_flashdata('danger', 'data gagal ditambah');
			redirect('admin/master-blog');	
		}
	}

	public function delete_kategori_blog($id)
	{
		$this->M_Master_Blog->delete_kategori($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-blog');
	}

	public function clear_kategori_blog()
	{
		$this->M_Master_Blog->clear_kategori($id);
		$this->session->set_flashdata('success', 'data berhasil dikosongkan');
		redirect('admin/master-blog');
	}
	################# ################# ################### ################### #####################
	#									   KATEGORI BLOG											#
	################# ################# ################### ################### #####################

}

/* End of file Master_Blog.php */
/* Location: ./application/modules/admin/controllers/Master_Blog.php */