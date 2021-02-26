<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Komentar extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Komentar');
		//load helper
		$this->load->helper('access');
		//mengecek apakah dia melakukan login , dan apa levelnya nya , lalu ditempatkan sesuai hak aksesnya
		check_access();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function index()
	{
		$data['title']					= 'Komentar';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['total_user']				= $this->M_Admin->count_table_data("tbl_user");
		$data['all_komentar']			= $this->M_Master_Komentar->get_komentar()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_komentar',$data);
		$this->load->view('layouts/footer');
	}

	public function delete_komentar($id)
	{
		$komentar = $this->M_Master_Komentar->get_komentar($id);
		//hapus semua balasan komentar dari tabel tbl_balasan yang id komentar nya adalah id(parameter)
		$this->db->delete('tbl_balasan',['komentar_id' => $id]);
		$this->M_Master_Komentar->delete($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-komentar');
	}

	public function clear_komentar()
	{
		$this->db->empty_table('tbl_komentar');
		//bersihkan dengan balasan komentarnya
		$this->db->empty_table('tbl_balasan');
		$this->session->set_flashdata('success', 'Data berhasil dikosongkan');
		redirect('admin/master-komentar');
	}

}

/* End of file Master_Komentar.php */
/* Location: ./application/modules/admin/controllers/Master_Komentar.php */