<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {

	protected $user_login_data;
	
	public function __construct()
	{
		parent::__construct();
		//load library
		$this->load->library('pagination');
		$this->load->library('form_validation');
		//load model
		$this->load->model('M_Home');
		$this->load->model('M_Blog');
		//load helper
		$this->load->helper('home');
		//jika user melakukan login , maka lakukan ini
		if ($this->session->userdata("id_user")) {
			$this->user_login_data = $this->M_Home->get_user_login_data();
		}
	}

	public function index()
	{	
		//unset session keyword
		$this->session->unset_userdata('keyword');
		////////////////////////////////////////
		$config['total_rows']	= $this->db->count_all("tbl_blog");
		$config['start'] 			= $this->uri->segment(4);
		$config['base_url'] 	= site_url('home/Blog/index');
		$config['per_page'] 	= 6;
		$this->pagination->initialize($config);
		////////////////////////////////////////
		$data['title'] 			= 'Blog'; 
		$data['user_login_data']= $this->user_login_data;
		$data['kategori_blog'] 	= $this->M_Blog->get_kategori_blog()->result_array();
		$data['check_blog'] 	= count_data("tbl_blog");
		$data['all_blog'] = $this->M_Blog->get_blog($config['per_page'],$config['start'])->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/blog',$data);
		$this->load->view('layouts/footer');
	}

	public function search_blog()
	{

		if (isset($_POST['keyword'])) {
			$keyword = $this->input->post('keyword');
			$this->session->set_userdata('keyword',$keyword);	
		}else{
			$keyword = $this->session->userdata('keyword');
		}
		////////////////////////////////////////
		$config['start'] 		= $this->uri->segment(4);
		$config['base_url'] 	= site_url('home/Blog/search_blog');
		$config['per_page'] 	= 10;
		////////////////////////////////////////
		$data['title'] 			= 'Blog'; 
		$data['user_login_data']= $this->user_login_data;
		$data['kategori_blog'] 	= $this->M_Blog->get_kategori_blog()->result_array();
		$data['check_blog'] 	= count_data("tbl_blog");
		
		$total_rows = $this->db->like('blog_title',$keyword)
							   ->or_like('blog_author',$keyword)
							   ->or_like('blog_isi',$keyword)
							   ->from('tbl_blog')->get()->num_rows();
		$config['total_rows']	= $total_rows;
		$this->pagination->initialize($config);
		if ($total_rows>0) {
			$data['all_blog'] = $this->M_Blog->search_blog($config['per_page'],$config['start'],$keyword)->result_array();
				########### ============= ##############
				$this->load->view('layouts/header',$data);
				$this->load->view('layouts/navbar',$data);
				$this->load->view('v_home/blog',$data);
				$this->load->view('layouts/footer');
		}else{
			$this->session->set_flashdata('warning','Pencarian tidak ditemukan');
			redirect('blog');
		}
		
	}

	public function kategori($kategori=NULL)
	{
		//unset session keyword
		$this->session->unset_userdata('keyword');
		////////////////////////////////////////
		$config['start'] 		= $this->uri->segment(5);
		$config['base_url'] 	= site_url('home/Blog/kategori/'.$kategori);
		$config['per_page'] 	= 4;
		////////////////////////////////////////
		$data['title'] 			= 'Blog'; 
		$data['user_login_data']= $this->user_login_data;
		$data['blog_kategori'] 	= $this->M_Blog->get_blog_kategori($kategori)->row_array();
		$id_kategori 			= $data['blog_kategori']['id_kategori_blog'];
		$data['nama_kategori'] 		= $data['blog_kategori']['nama_kategori'];
		$data['all_blog_kategori'] 	= $this->M_Blog->get_blog($config['per_page'],$config['start'],$id_kategori);
		////////////////////////////////////////
		$total_rows=$this->db->get_where("tbl_blog",["blog_kategori_id" => $id_kategori])->num_rows();
		$config['total_rows']	= $total_rows;
		$this->pagination->initialize($config);
		////////////////////////////////////////
			if ($data['all_blog_kategori']->num_rows()>0) {
				if ($this->M_Blog->get_blog_kategori($kategori)->num_rows()>0) {
					$data['list_blog_kategori']=$data['all_blog_kategori']->result_array();
					$this->load->view('layouts/header',$data);
					$this->load->view('layouts/navbar',$data);
					$this->load->view('v_home/blog_kategori',$data);
					$this->load->view('layouts/footer');
			}else{
				$this->session->set_flashdata('warning','Kategori tidak ditemukan');
				redirect('blog');
			}
		}else{
			$this->session->set_flashdata('warning','Blog dengan kategori '.$data['nama_kategori'].' Kosong');
			redirect('blog');
		}
	}

	public function detail($slug)
	{	
		//unset session keyword
		$this->session->unset_userdata('keyword');
		/////////////////////////////////////////
		//cek apakah blog yang dikunjungi itu ada / sesuai di url 
		if ($this->M_Blog->get_blog_detail($slug)->num_rows()>0) {
			$data['title'] 				= 	'Blog';
			$data['user_login_data'] 	= 	$this->user_login_data;
			$data['blog_detail']		=	$this->M_Blog->get_blog_detail($slug)->row_array();
			//get related blog (blog dari user id yang bikin blog)
			$data['related_blog']=$this->db->where('id_blog !=', $data['blog_detail']['id_blog'])
            ->order_by('id_blog','RANDOM')->get_where("tbl_blog",["user_id" => $data['blog_detail']['user_id']],2)->result_array();
			// mendapatkan kategori blog dari related blog
			$data['blog_kategori'] = $this->db->get_where("tbl_kategori_blog",["id_kategori_blog" => $data['blog_detail'															  ]['blog_kategori_id']])->row_array();
			/////////////////////  Mendapatkan Komentar Dari Blog ID ini  //////////////////////////
			$comments = $this->db->get_where("tbl_komentar",["blog_id" => $data['blog_detail']['id_blog']]);
			///////////////////////////////////////////////
			$data['comments'] = $comments->result_array();  
			$data['total_comments']=$comments->num_rows(); // hitung komentar
			///////////////////////////////////////////////
			//helper validasi komentar 
			comment_validation();
			if ($this->form_validation->run()==FALSE) {
				$this->load->view('layouts/header',$data);
				$this->load->view('layouts/navbar',$data);
				$this->load->view('v_home/blog_detail',$data);
				$this->load->view('layouts/footer');	
			}else{
				$data_komentar = [
					'blog_id' => $this->input->post('blog_id'),
					'komentar_nama' => htmlspecialchars($this->input->post('komentar_nama',TRUE)),
					'komentar_isi'	=> htmlspecialchars($this->input->post('komentar_isi',TRUE))
				];
				$this->M_Blog->create('tbl_komentar',$data_komentar);
				$this->session->set_flashdata('success','Komentar berhasil dikirim');
				redirect('blog/'.$slug);
			}	
		}else{
			$this->session->set_flashdata('warning','Blog yang anda tuju tidak ditemukan !');
			redirect('blog');
		}
	}

	public function reply_comment(){
		reply_comment_validation();
		if ($this->form_validation->run()==TRUE) {
			$data_balasan = [
				'balasan_nama' => htmlspecialchars($this->input->post('balasan_nama')),
				'balasan_isi' => htmlspecialchars($this->input->post('balasan_isi')),
				'komentar_id' => $this->input->post('komentar_id')
			];
			$this->M_Blog->create("tbl_balasan",$data_balasan);
			$this->session->set_flashdata('success','Balasan Komentar berhasil dikirim');
			redirect('blog/'.$this->input->post('blog_slug'));	
		}else{
			$this->session->set_flashdata('error','Balasan Komentar Gagal dikirim , ikuti aturan yang tersedia');
			redirect('blog/'.$this->input->post('blog_slug'));
		}
	}

	//ditampilkan di modal box
	public function show_comment_reply($id)
	{
		$data=$this->db->order_by('created_at','DESC')->get_where("tbl_balasan",["komentar_id" => $id])->result_array();
		echo json_encode($data);
	}

}

/* End of file Blog.php */
/* Location: ./application/modules/home/controllers/Blog.php */