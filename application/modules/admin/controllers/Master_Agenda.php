<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Agenda extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->model('M_Master_Agenda');
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
		$data['title']					= 'Agenda';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan']		= $this->M_Admin->get_all_unread_pesan("count");
		$data['all_unread_pesan'] 		= $this->M_Admin->get_all_unread_pesan();
		$data['all_agenda']					= $this->M_Master_Agenda->get_agenda()->result_array();
		########### ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_master/master_agenda',$data);
		$this->load->view('layouts/footer');
	}

	//tampilkan di modal edit
	public function show_agenda($id)
	{
	 	$data = $this->M_Master_Agenda->get_agenda($id)->row_array();
	 	echo json_encode($data);
	} 

	public function update_agenda()
	{
		$id_agenda=$this->input->post('id_agenda');
		$data = [
			'agenda_nama' 		=> htmlentities($this->input->post('agenda_nama',TRUE)),
			'agenda_tempat' 	=> htmlentities($this->input->post('agenda_tempat',TRUE)),
			'agenda_mulai' 		=> $this->input->post('agenda_mulai'),
			'agenda_selesai' 	=> $this->input->post('agenda_selesai')
		]; 
		$this->M_Master_Agenda->update($id_agenda,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/master-agenda'); 
	}

	public function delete_agenda($id)
	{
		$this->M_Master_Agenda->delete($id);
		$this->session->set_flashdata('success', 'data berhasil dihapus');
		redirect('admin/master-agenda');
	}

	// mengosongkan tabel 
	public function clear_agenda()
	{
		$this->M_Master_Agenda->clear();
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/master-agenda');
	}

}

/* End of file Master_Agenda.php */
/* Location: ./application/modules/admin/controllers/Master_Agenda.php */