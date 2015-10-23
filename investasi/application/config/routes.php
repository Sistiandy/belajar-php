<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = 'login/show_404/';

$route['adminpanel'] = 'adminpanel';
$route['actionlogin'] = 'login/dologiners/';

//security halaman admin//
$route['login'] = 'login/show_404/';
$route['admin'] = 'login/show_404/';
$route['administrator'] = 'login/show_404/';
//

$route['controlpanel'] = 'login/index2/administrator/';
$route['logoutapp'] = 'login/dologouters/';

$route['konten/(:any)/(:any)'] = 'home/content/get/$1/$2';
$route['berita/(:num)/(:any)'] = 'home/content/berita/$1';
$route['berita/index/(:num)'] = 'home/news/$1';
$route['berita/index'] = 'home/news/';
$route['berita'] = 'home/news/';
$route['headline/(:num)'] = 'home/content/headline/$1';
$route['gallery'] = 'home/content/gallery/';

$route['forum'] = 'home/content/forum';
$route['thread/(:num)/(:any)'] = 'home/content/thread/$1/$2';
$route['showposting/(:num)/(:any)'] = 'home/content/viewposting/$1/$2';
$route['saveposting'] = 'home/nyimpenposting';
$route['news/comment'] = 'home/news_comment';
$route['viewkomentar'] = 'home/content/komentarforum';

$route['cari'] = 'home/content/cari_konten';




/* End of file routes.php */
/* Location: ./application/config/routes.php */ 