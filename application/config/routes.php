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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

//admin
$route['user'] 				    = 'User';
$route['tambah-user'] 	        = 'User/tambah';
$route['tambah-user-modal'] 	= 'User/tambah_modal';
$route['edit-user/(:any)'] 	    = 'User/edit/$1';
$route['hapus-user/(:any)']     = 'User/hapus/$1';

$route['pegawai'] 				= 'Pegawai';
$route['tambah-pegawai'] 	    = 'Pegawai/tambah';
$route['edit-pegawai/(:any)'] 	= 'Pegawai/edit/$1';
$route['detail-pegawai/(:any)'] = 'Pegawai/detail/$1';
$route['hapus-pegawai/(:any)']  = 'Pegawai/hapus/$1';

$route['jabatan'] 				= 'Jabatan';
$route['tambah-jabatan'] 	    = 'Jabatan/tambah';
$route['edit-jabatan/(:any)'] 	= 'Jabatan/edit/$1';
$route['hapus-jabatan/(:any)']  = 'Jabatan/hapus/$1';

$route['bidang'] 				= 'Bidang';
$route['tambah-bidang'] 	    = 'Bidang/tambah';
$route['edit-bidang/(:any)'] 	= 'Bidang/edit/$1';
$route['hapus-bidang/(:any)']   = 'Bidang/hapus/$1';

$route['golruang'] 				= 'Golruang';
$route['tambah-golruang'] 	    = 'Golruang/tambah';
$route['edit-golruang/(:any)'] 	= 'Golruang/edit/$1';
$route['hapus-golruang/(:any)'] = 'Golruang/hapus/$1';

$route['verifikasi-cuti'] 					= 'Cuti/verifikasi_cuti';
$route['verifikasi-pengajuan-cuti/(:any)'] 	= 'Cuti/verifikasi/$1';

//staf
$route['profil-pegawai'] 			= 'Profile';
$route['update-profil'] 			= 'Profile/update';
$route['cuti'] 						= 'Cuti';
$route['data-cuti'] 				= 'Cuti/data_cuti';
$route['tambah-cuti'] 	    		= 'Cuti/tambah';
$route['edit-cuti/(:any)'] 			= 'Cuti/edit/$1';
$route['edit-status-cuti/(:any)/(:any)'] 	= 'Cuti/edit_status/$1/$2';
$route['detail-cuti/(:any)'] 		= 'Cuti/detail/$1';
$route['cetak-cuti/(:any)']  		= 'Cuti/cetak/$1';
$route['hapus-cuti/(:any)']  		= 'Cuti/hapus/$1';
$route['izin'] 						= 'Izin';
$route['data-izin'] 				= 'Izin/data_izin';
$route['tambah-izin'] 	    		= 'Izin/tambah';
$route['edit-izin/(:any)'] 			= 'Izin/edit/$1';
$route['edit-status-izin/(:any)'] 	= 'Izin/edit_status/$1';
$route['detail-izin/(:any)'] 		= 'Izin/detail/$1';
$route['cetak-izin/(:any)']  		= 'Izin/cetak/$1';
$route['hapus-izin/(:any)']  		= 'Izin/hapus/$1';

//Kepegawaian
$route['riwayat-cuti']  			= 'Cuti/riwayat';
$route['riwayat-cuti/(:any)']  		= 'Cuti/riwayat/$1';
$route['tambah-riwayat-cuti/(:any)']= 'Cuti/tambah_riwayat/$1';
$route['edit-riwayat-cuti/(:any)/(:any)']  = 'Cuti/edit_riwayat/$1/$2';
$route['hapus-riwayat-cuti/(:any)/(:any)']  = 'Cuti/hapus_riwayat/$1/$2';