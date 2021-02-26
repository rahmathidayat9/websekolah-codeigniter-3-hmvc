<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_Error extends CI_Controller {

	public function index()
	{	
		$this->load->view('pagenotfound/index');
	}

	public function search_page()
	{
		redirect($this->input->post('page'));
	}

}

/* End of file Page_Error.php */
/* Location: ./application/controllers/Page_Error.php */