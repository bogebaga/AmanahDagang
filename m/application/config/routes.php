<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['isiiklan/(:any)'] = 'welcome/isiiklan/$1';
$route['home/(:any)'] = 'welcome/home/$1';
$route['mkategori/(:any)'] = 'welcome/mkategori/$1';
$route['masuk'] = 'login';
$route['daftar'] = 'login/signup';
$route['signout'] = 'login/signout';
$route['iklan'] = 'iklan';
$route['(:any)'] = 'welcome/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
