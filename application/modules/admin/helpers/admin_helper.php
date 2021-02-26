<?php 

function get_csrf()
{	
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}

function create_slug($str)
{
	$illegal_string=[" ","?","!","(",")","^","$","#","@","{","}","+","[","]","/","'\'",
					"<",">",";",":","|","'",'"',",","`","*","%"];
	return str_replace($illegal_string,"-",$str);
}