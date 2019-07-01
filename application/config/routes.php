<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';

// Public
$route['peserta/halaman/(:num)'] = 'peserta/index/$1';
$route['pendaftaran-sukses'] = 'pendaftaran/sukses';
$route['pendaftaran-error'] = 'pendaftaran/error';
$route['kontak-error'] = 'kontak/error';
$route['kontak-sukses'] = 'kontak/sukses';
$route['pengumuman/halaman/(:num)'] = 'pengumuman/index/$1';
$route['pengumuman/(:any)'] = 'pengumuman/detail/$1';
$route['lupa-password'] = 'lupa_password/index';
$route['lupa-password-error'] = 'lupa_password/error';
$route['lupa-password-sukses'] = 'lupa_password/sukses';
$route['hasil-seleksi'] = 'hasil_seleksi/index';
$route['hasil-seleksi-error'] = 'hasil_seleksi/error';
$route['login-error'] = 'login/error';


// Dashboard
$route['dashboard/peserta/halaman/(:num)'] = 'dashboard/peserta/index/$1';
$route['dashboard/pengumuman/halaman/(:num)'] = 'dashboard/pengumuman/index/$1';
$route['dashboard/pengumuman/(:any)'] = 'dashboard/pengumuman/detail/$1';
$route['dashboard/kontak-sukses'] = 'dashboard/kontak/sukses';
$route['dashboard/kontak-error'] = 'dashboard/kontak/error';
$route['dashboard/biodata-sukses'] = 'dashboard/biodata/sukses';
$route['dashboard/biodata-error'] = 'dashboard/biodata/error';
$route['dashboard/biodata-preview'] = 'dashboard/biodata/preview';
$route['dashboard/biodata-preview-error'] = 'dashboard/biodata/error';
$route['dashboard/biodata-cetak'] = 'dashboard/biodata/cetak';
$route['dashboard/biodata-cetak-error'] = 'dashboard/biodata/error';
$route['dashboard/hasil-seleksi'] = 'dashboard/hasil_seleksi/index';
$route['dashboard/hasil-seleksi-error'] = 'dashboard/hasil_seleksi/error';
$route['dashboard/logout'] = 'login/logout';

// Admin
$route['admin/login-error'] = 'admin/login/error';
$route['admin/logout'] = "admin/login/logout";
$route['admin/peserta/halaman/(:num)'] = "admin/peserta/index/$1";
$route['admin/peserta/ubah-status-verifikasi/(:num)'] = "admin/peserta/ubah_status_verifikasi/$1";
$route['admin/peserta/ubah-status-seleksi/(:num)'] = "admin/peserta/ubah_status_seleksi/$1";
$route['admin/peserta/ubah-status-pendaftaran/(:num)'] = "admin/peserta/ubah_status_pendaftaran/$1";
$route['admin/kontak/halaman/(:num)'] = "admin/kontak/index/$1";
$route['admin/pengumuman/halaman/(:num)'] = "admin/pengumuman/index/$1";
$route['admin/pengumuman/tambah'] = "admin/pengumuman/tambah";
$route['admin/pengumuman/edit/(:num)'] = "admin/pengumuman/edit/$1";
$route['admin/pengumuman/hapus/(:num)'] = "admin/pengumuman/hapus/$1";
$route['admin/pengumuman/error'] = "admin/pengumuman/error";
$route['admin/pengumuman/sukses'] = "admin/pengumuman/sukses";
$route['admin/pengumuman/(:any)'] = "admin/pengumuman/detail/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
