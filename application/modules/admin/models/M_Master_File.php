<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_File extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_file",$data);
	}

	public function get_file($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_file",["id_file" => $id]);
		}else{
			return $this->db->get("tbl_file");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_file",$id);
		return $this->db->update("tbl_file",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_file",["id_file" => $id]);
	}

	################# ################# ################### ################### #####################
	#									   KATEGORI FILE											#
	################# ################# ################### ################### #####################
	public function get_kategori_file($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_kategori_file",["id_kategori_file" => $id]);
		}else{
			return $this->db->get("tbl_kategori_file");
		}
	}

	public function add_kategori()
	{
		$data_kategori = [
			'kategori_nama' => $this->input->post('kategori_nama')
		];
		$this->db->insert("tbl_kategori_file",$data_kategori);
	}

	public function delete_kategori($id)
	{
		$this->db->delete('tbl_kategori_file',['id_kategori_file' => $id]);
	}

	public function clear_kategori()
	{
		$this->db->empty_table("tbl_kategori_file");
	}
	################# ################# ################### ################### #####################
	#									   KATEGORI FILE											#
	################# ################# ################### ################### #####################	

}

/* End of file M_Master_File.php */
/* Location: ./application/modules/admin/models/M_Master_File.php */