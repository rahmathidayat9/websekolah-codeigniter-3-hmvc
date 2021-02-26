<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Jurusan extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_jurusan",$data);
	}
	
	public function get_jurusan($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_jurusan",["id_jurusan" => $id]);		
		}else{
			return $this->db->get('tbl_jurusan');
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_jurusan",$id);
		return $this->db->update("tbl_jurusan",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_jurusan",["id_jurusan" => $id]);
	}

	################# ################# ################### ################### #####################
	#									   KATEGORI FILE											#
	################# ################# ################### ################### #####################
	public function get_kategori_jurusan($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_kategori_jurusan",["id_kategori_jurusan" => $id]);
		}else{
			return $this->db->get("tbl_kategori_jurusan");
		}
	}

	public function add_kategori()
	{
		$data_kategori = [
			'nama_kategori_jurusan' => $this->input->post('nama_kategori')
		];
		$this->db->insert("tbl_kategori_jurusan",$data_kategori);
	}

	public function delete_kategori($id)
	{
		$this->db->delete('tbl_kategori_jurusan',['id_kategori_jurusan' => $id]);
	}

	public function clear_kategori()
	{
		$this->db->empty_table("tbl_kategori_jurusan");
	}
	################# ################# ################### ################### #####################
	#									   KATEGORI FILE											#
	################# ################# ################### ################### #####################	

}

/* End of file M_Master_Jurusan.php */
/* Location: ./application/modules/admin/models/M_Master_Jurusan.php */