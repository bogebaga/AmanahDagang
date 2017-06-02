<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'login';
$route['signout'] = 'login/signout';
$route['signout_admin'] = 'login/signout_admin';
$route['register']= 'register';

$route['admin']= 'admin';
$route['admin/login'] = 'login/login';
$route['admin/login/masuk'] = 'login/masuk';
$route['admin/add_iklan'] = 'admin/add_iklan';
$route['admin/iklan'] = 'admin/iklan';
$route['admin/user'] = 'admin/user';
$route['admin/iklan/hapus/(:any)'] = 'admin/iklan_hapus/$1';
$route['admin/iklan/edit/(:any)'] = 'admin/iklan_edit/$1';
$route['admin/user/hapus/(:any)'] = 'admin/user_hapus/$1';
$route['admin/user/edit/(:any)'] = 'admin/user_edit/$1';

$route['admin/save'] = 'admin/save';
$route['admin/edit_user_save'] = 'admin/edit_user_save';
$route['admin/edit_save'] = 'admin/edit_save';

$route['iklanparse'] = 'admin/iklan_parse';
$route['uparse'] = 'admin/user_parse';

$route['kabkota'] = 'proses/load_kabkota'; //isi kabkota

$route['iklan/edit'] = 'proses/save_edit_iklan';
$route['pasangiklan/masukki'] = 'proses/iklan_proses';

$route['barang/edit/(:any)'] = 'proses/edit_iklan/$1';
$route['barang/hapus/(:any)'] = 'proses/hapus_iklan/$1';
$route['barang/iklanbaris'] ='iklanbaris';
$route['barang/(:any)'] = 'proses/load_iklan/$1';

$route['default_controller'] = 'beranda/tampil_beranda'; //index
$route['edit'] = 'beranda/edit';
$route['tes'] = 'proses/tes_ilmu';
$route['tron'] = 'tron';
$route['(:any)'] = 'beranda/tampil_beranda/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
