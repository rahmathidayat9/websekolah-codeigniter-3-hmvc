<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Jurusan');
		$this->load->model('M_Tools_Admin');
		//load helper
		$this->load->helper('admin');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		$this->load->helper('access');
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Jurusan';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['all_jurusan'] 			= $this->M_Master_Jurusan->get_jurusan()->result_array();
		$data['all_kategori_jurusan']  	= $this->M_Master_Jurusan->get_kategori_jurusan()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_jurusan',$data);	
		$this->load->view('layouts/footer');	
	}

	public function add_jurusan()
	{
		$img_jurusan = $this->M_Tools_Admin->upload_img('jurusan');
		$this->M_Tools_Admin->resize_image('jurusan/'.$img_jurusan,'165','165');
		$data = [
			'nama_jurusan' 			=> htmlentities($this->input->post('nama_jurusan',TRUE)),
			'nama_lain_jurusan' 	=> htmlentities($this->input->post('nama_lain_jurusan',TRUE)),
			'deskripsi_jurusan' 	=> htmlentities($this->input->post('deskripsi_jurusan',TRUE)),
			'img_jurusan' 			=> 		$img_jurusan,
			'kategori_jurusan_id' 	=> $this->input->post('kategori_jurusan_id')
		];
		$this->M_Master_Jurusan->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/master-jurusan');
	}

	public function show_jurusan($id)
	{
	 	$data = $this->M_Master_Jurusan->get_jurusan($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_jurusan()
	{
		if (!empty($_FILES['file']['name'])) {
			$img_jurusan = $this->M_Tools_Admin->upload_img('jurusan');
			$this->M_Tools_Admin->resize_image('jurusan/'.$img_jurusan,'165','165');
			unlink(FCPATH.'./asset/img/jurusan/'.$this->input->post('oldimage'));
		}else{
			$img_jurusan = $this->input->post('oldimage');
		}
		$data = [
			'nama_jurusan' 			=> $this->input->post('nama_jurusan'),
			'nama_lain_jurusan' 	=> $this->input->post('nama_lain_jurusan'),
			'deskripsi_jurusan' 	=> $this->input->post('deskripsi_jurusan'),
			'img_jurusan'			=> $img_jurusan,
			'kategori_jurusan_id'	=> $this->input->post('kategori_jurusan_id')
		];
		$id_jurusan = $this->input->post('id_jurusan'); 
		$this->M_Master_Jurusan->update($id_jurusan,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-jurusan'); 
	}

	public function delete_jurusan($id)
	{
		//get image rows from this jurusan data, then delete image from directory
		$jurusan = $this->M_Master_Jurusan->get_jurusan($id)->row_array();
		unlink(FCPATH.'./asset/img/jurusan/'.$jurusan['img_jurusan']);
		//
		$this->M_Master_Jurusan->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-jurusan');
	}

	public function clear_jurusan()
	{
		$get_jurusan = $this->M_Master_Jurusan->get_jurusan()->result_array();
		foreach ($get_jurusan as $jurusan) {
			unlink("./asset/img/jurusan/".$jurusan['img_jurusan']);
		}
		$this->db->empty_table('tbl_jurusan');
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-jurusan');
	}

	################# ################# ################### ################### #####################
	#									   KATEGORI JURUSAN											#
	################# ################# ################### ################### #####################
	public function add_kategori_jurusan()
	{
		$this->M_Master_Jurusan->add_kategori();
		$this->session->set_flashdata('success', 'data berhasil ditambah');
		redirect('admin/master-jurusan');
	}

	public function show_kategori_jurusan($id)
	{
	 	$data = $this->M_Master_Jurusan->get_kategori_jurusan($id)->row_array();
	 	echo json_encode($data);
	}

	public function update_kategori_jurusan()
	{
	 	$id_kategori_jurusan=$this->input->post('id_kategori_jurusan');
		$data = [
			'nama_kategori_jurusan' => htmlentities($this->input->post('nama_kategori'))
		]; 
		$this->db->where('id_kategori_jurusan',$id_kategori_jurusan);
		$this->db->update('tbl_kategori_jurusan',$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-jurusan'); 
	}

	public function delete_kategori_jurusan($id)
	{
		$this->M_Master_Jurusan->delete_kategori($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-jurusan');
	}

	public function clear_kategori_jurusan()
	{
		$this->M_Master_Jurusan->clear_kategori();
		$this->session->set_flashdata('success', 'data berhasil dikosongkan');
		redirect('admin/master-jurusan');
	}
	################# ################# ################### ################### #####################
	#									   KATEGORI JURUSAN											#
	################# ################# ################### ################### #####################

}

/* End of file Master_Jurusan.php */
/* Location: ./application/modules/admin/controllers/Master_Jurusan.php */