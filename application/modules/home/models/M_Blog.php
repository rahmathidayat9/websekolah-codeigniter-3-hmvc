<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Blog extends CI_Model {

	public function create($table,$data=[])
	{
		return $this->db->insert($table,$data);
	}
		
	public function get_blog($limit,$start,$kategori_id=NULL)
	{	
		if ($kategori_id) {
			$this->db->where("blog_kategori_id",$kategori_id);
		}
		return $this->db->get('tbl_blog',$limit,$start);
	}

	public function search_blog($limit,$start,$keyword)
	{	
		return $this->db->like('blog_title',$keyword)
				->or_like('blog_author',$keyword)
				->or_like('blog_isi',$keyword)
		 		->get('tbl_blog',$limit,$start);
	}

	public function get_blog_kategori($nama_kategori)
	{
		return 	$this->db->where("nama_kategori",$nama_kategori)
		 		->get("tbl_kategori_blog");
	}

	public function get_blog_kategori_id($id)
	{
		return $this->db->get_where("tbl_blog",["blog_kategori_id" => $id]);	
	}

	public function get_kategori_blog()
	{
		return $this->db->get('tbl_kategori_blog');	
	}

	public function get_blog_detail($slug)
	{
		return $this->db->get_where("tbl_blog",["blog_slug" => $slug]);
	}

}

/* End of file M_Blog.php */
/* Location: ./application/modules/home/models/M_Blog.php */