<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Blog extends CI_Model {

	public function create($data=[])
	{
		$this->db->insert("tbl_blog",$data);
	}

	public function get_blog($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_blog",["id_blog" => $id]);
		}else{
			return $this->db->get("tbl_blog");
		}
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_blog",$id);
		return $this->db->update("tbl_blog",$data);
	}

	public function delete($id)
	{
		$this->db->delete("tbl_blog",["id_blog" => $id]);
	}

	public function clear()
	{
		return $this->db->empty_table('tbl_blog');
	}

	################# ################# ################### ################### #####################
	#									   KATEGORI BLOG											#
	################# ################# ################### ################### #####################
	public function get_kategori_blog($id=NULL)
	{
		if ($id) {
			return $this->db->get_where("tbl_kategori_blog",["id_kategori_blog" => $id]);
		}else{
			return $this->db->get("tbl_kategori_blog");
		}
	}

	public function add_kategori()
	{
		$data_kategori = [
			'nama_kategori' => $this->input->post('nama_kategori')
		];
		$this->db->insert("tbl_kategori_blog",$data_kategori);
	}

	public function delete_kategori($id)
	{
		$this->db->delete('tbl_kategori_blog',['id_kategori_blog' => $id]);
	}

	public function clear_kategori()
	{
		$this->db->empty_table("tbl_kategori_blog");
	}
	################# ################# ################### ################### #####################
	#									   KATEGORI BLOG											#
	################# ################# ################### ################### #####################

}

/* End of file M_Master_Blog.php */
/* Location: ./application/modules/admin/models/M_Master_Blog.php */