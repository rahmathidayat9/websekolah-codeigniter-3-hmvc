<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/Home/index';
$route['404_override'] = 'Page_Error/index';
$route['translate_uri_dashes'] = TRUE;

$route['page'] = 'Page_Error/search_page';

//modules admin//
$route['admin'] 				= 'admin/Admin/index';
$route['admin/access-manager'] 	= 'admin/Access_Manager/index';
$route['admin/menu-manager'] 	= 'admin/Menu_Manager/index';
$route['admin/master-user'] 	= 'admin/Master_User/index';
$route['admin/master-jurusan'] 	= 'admin/Master_Jurusan/index';
$route['admin/master-pesan'] 	= 'admin/Master_Pesan/index';
$route['admin/master-blog'] 	= 'admin/Master_Blog/index';
$route['admin/master-agenda'] 	= 'admin/Master_Agenda/index';
$route['admin/master-pengumuman'] = 'admin/Master_Pengumuman/index';
$route['admin/master-menu'] 	= 'admin/Master_Menu/index';
$route['admin/master-komentar'] = 'admin/Master_Komentar/index';
$route['admin/master-balasan-komentar'] = 'admin/Master_Balasan_Komentar/index';
$route['admin/master-file'] 	= 'admin/Master_File/index';
$route['admin/master-token'] 	= 'admin/Master_Token/index';
//modules admin//

//modules guru
$route['guru']					=	'guru/Guru/index';
$route['guru/write-blog']		=	'guru/Write/write_blog';
$route['guru/write-agenda']		=	'guru/Write/write_agenda';
$route['guru/write-pengumuman']	=	'guru/Write/write_pengumuman';
//modules guru

//modules home Controller Home
$route['home']		=	'home/Home/index';
$route['about']		=	'home/Home/about';
$route['contact']	=	'home/Home/contact';
$route['pengumuman']	=	'home/Pengumuman/index';
$route['agenda']		=	'home/Agenda/index';
$route['blog']			=	'home/Blog/index';
$route['blog/(:any)']	=	'home/Blog/detail/$1';
$route['search-blog']	=	'home/Blog/search_blog';
$route['blog/kategori/(:any)']	=	'home/Blog/kategori/$1';
$route['download']		= 'home/Download/index';
$route['download/(:any)']	= 'home/Download/download_file/$1';
//

//modules auth Controller Auth
$route['login']				= 'auth/Auth/index';
$route['register']			= 'auth/Auth/register';
$route['forgot-password'] 	= 'auth/Auth/forgot_password';
$route['logout']			= 'auth/Auth/logout';
$route['verify-account']	= 'auth/Auth/verify_account';
//

// modules user controller User
$route['user'] 					= 'user/User/index';
$route['user/user-profile'] 	= 'user/User/index';
$route['user/edit-profile'] 	= 'user/User/edit_profile';
$route['user/change-password'] 	= 'user/User/change_password';
$route['user/delete-my-account'] = 'user/User/delete_my_account';
$route['user/download'] 		= 'user/User/download';
// $route['example/(:any)'] = 'controller/method/$1';