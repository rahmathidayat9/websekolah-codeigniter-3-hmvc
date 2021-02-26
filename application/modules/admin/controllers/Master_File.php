<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_File extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Tools_Admin');
		$this->load->model('M_Master_File');
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
		$data['title']					= 'File';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['all_file']				= $this->M_Master_File->get_file()->result_array();
		$data['all_kategori_file']			= $this->M_Master_File->get_kategori_file()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_file',$data);
		$this->load->view('layouts/footer');
	}

	public function add_file()
	{	
		// upload file dari model M_Tools_Admin
		$file_name = $this->M_Tools_Admin->upload_file('download','zip|mp3|pdf|docx|png|jpg|jpeg|gif');
		$data=[
			'file_slug' 		=>  create_slug(strtolower($this->input->post('file_title'))),
			'file_title' 		=>  htmlentities($this->input->post('file_title',TRUE)),
			'file_name' 		=>  $file_name,
			'file_url'			=>	htmlentities($this->input->post('file_url',TRUE)),
			'user_id'			=>	$this->session->userdata("id_user"),
			'file_kategori_id'	=>	$this->input->post('file_kategori_id'),
		];
		$this->M_Master_File->create($data);
		$this->session->set_flashdata('success', 'data berhasil ditambah');
		redirect('admin/master-file');
	}

	public function show_file($id)
	{
		$data = $this->M_Master_File->get_file($id)->row_array();
		echo json_encode($data);
	}

	public function update_file()
	{
		$id_file 	= $this->input->post('id_file');
		$old_file 	= $this->input->post('file_name');
		if (!empty($_FILES['file']['name'])) {
			$file_name = $this->M_Tools_Admin->upload_file('download','zip|mp3|pdf|docx|png|jpg|jpeg|gif');
			unlink("./asset/download/".$old_file);
		}else{
			$file_name = $this->input->post('file_name');
		}
		$data=[
			'file_slug' 		=>  create_slug(strtolower($this->input->post('file_title'))),
			'file_title' 		=>  htmlentities($this->input->post('file_title',TRUE)),
			'file_name' 		=>  $file_name,
			'file_kategori_id'	=>	$this->input->post('file_kategori_id')
		];
		$this->M_Master_File->update($id_file,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-file');
	}

	public function delete_file($id)
	{
		$file = $this->M_Master_File->get_file($id)->row_array();
		unlink($file['file_url'].$file['file_name']);
		$this->M_Master_File->delete($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-file');
	}

	public function clear_file()
	{
		$get_file = $this->M_Master_File->get_file()->result_array();
		foreach ($get_file as $file) {
			unlink($file['file_url'].$file['file_name']);
		}
		$this->db->empty_table("tbl_file");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-file');
	}

	################# ################# ################### ################### #####################
	#									   KATEGORI FILE											#
	################# ################# ################### ################### #####################
	public function add_kategori_file()
	{
		$this->M_Master_File->add_kategori();
		$this->session->set_flashdata('success', 'data berhasil ditambah');
		redirect('admin/master-file');
	}

	public function show_kategori_file($id)
	{
	 	$data = $this->M_Master_File->get_kategori_file($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_kategori_file()
	{
	 	$id_kategori_file=$this->input->post('id_kategori_file');
		$data = [
			'kategori_nama' => htmlentities($this->input->post('kategori_nama'))
		]; 
		$this->db->where('id_kategori_file',$id_kategori_file);
		$this->db->update('tbl_kategori_file',$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-file'); 
	}

	public function delete_kategori_file($id)
	{
		$this->M_Master_File->delete_kategori($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-file');
	}

	public function clear_kategori_file()
	{
		$this->M_Master_File->clear_kategori();
		$this->session->set_flashdata('success', 'data berhasil dikosongkan');
		redirect('admin/master-file');
	}
	################# ################# ################### ################### #####################
	#									   KATEGORI FILE											#
	################# ################# ################### ################### #####################

}

/* End of file Master_File.php */
/* Location: ./application/modules/admin/controllers/Master_File.php */