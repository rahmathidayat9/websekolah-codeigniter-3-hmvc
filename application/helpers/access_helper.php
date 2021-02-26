<?php 

function check_access()
{
	$ci = get_instance();
	$role_id = $ci->session->userdata('role_id');
	if (!$role_id) {
		redirect('home');
	}else{
		$menu = strtoupper($ci->uri->segment(1));
		$query_menu = $ci->db->get_where('tbl_menu',['menu' => $menu])->row_array();
		$menu_id = $query_menu['id_menu'];
		$query_access = $ci->db->get_where('tbl_access_menu',['role_id' => $role_id,'menu_id' => $menu_id]);
		if ($query_access->num_rows()>0) {
			return TRUE;
		}else{
			redirect('not-found');
		}
	}
}

function role_active($role_id,$menu_id)
{
	$ci=get_instance();
	$query_role = $ci->db->get_where("tbl_access_menu",
									["role_id" => $role_id,"menu_id" => $menu_id]);
	if ($query_role->num_rows()>0) {
		return "checked=checked";
	}
}

