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

$route['default_controller'] = "default/index";
$route['404_override'] = '';
$route['index.html']   = "default/index";

/*
| -------------------------------------------------------------------------
| ENGLISH + JAPANES
| -------------------------------------------------------------------------
| 
*/
$route['(:any)/index.html']          = "default/index/index/$1";
$route['(:any)/about-us/(:any).html']= "default/about/post/$1/$2";
$route['(:any)/about-us.html']       = "default/about/index/$1";

$route['(:any)/news.html']           = "default/news/index/$1";
$route['(:any)/news/(:any).html']    = "default/news/post/$1/$2";

$route['(:any)/contact.html']        = "default/contact/index/$1";

$route['(:any)/library.html']        = "default/library/index/$1";
$route['(:any)/library/(:any).html'] = "default/library/post/$1/$2";
$route['(:any)/video.html']          = "default/library/video/$1";
$route['(:any)/pdf.html']            = "default/library/pdf/$1";

/*$route['(:any)/career.html']         = "default/career/index/$1";*/

$route['(:any)/partner.html']        = "default/partner/index/$1";

$route['(:any)/products.html']       = "default/product/index/$1"; // trang san pham chi tiet
$route['(:any)/product/(:any).html'] = "default/product/post/$1/$2"; // trang san pham chi tiet
$route['(:any)/category/(:any).html']= "default/product/category/$1/$2"; // trang san pham theo danh muc

$route['(:any)/products2.html']       = "default/product2/index/$1"; // trang san pham chi tiet
$route['(:any)/product2/(:any).html'] = "default/product2/post/$1/$2"; // trang san pham chi tiet
$route['(:any)/category2/(:any).html']= "default/product2/category/$1/$2"; // trang san pham theo danh muc

$route['(:any)/projects.html']       = "default/project/index/$1"; // trang san pham chi tiet
$route['(:any)/project/(:any).html'] = "default/project/post/$1/$2"; // trang san pham chi tiet
$route['(:any)/project-category/(:any).html']= "default/project/category/$1/$2"; // trang san pham theo danh muc

/*
| -------------------------------------------------------------------------
| VIETNAMESE
| -------------------------------------------------------------------------
| 
*/
$route['(:any)/trang-chu.html']          = "default/index/index/$1";
$route['(:any)/gioi-thieu/(:any).html']= "default/about/post/$1/$2";
$route['(:any)/gioi-thieu.html']       = "default/about/index/$1";

$route['(:any)/tin-tuc.html']           = "default/news/index/$1";
$route['(:any)/tin-tuc/(:any).html']    = "default/news/post/$1/$2";

$route['(:any)/lien-he.html']        = "default/contact/index/$1";

$route['(:any)/thu-vien.html']        = "default/library/index/$1";
$route['(:any)/thu-vien/(:any).html'] = "default/library/post/$1/$2";
$route['(:any)/thu-vien-video.html']          = "default/library/video/$1";
$route['(:any)/tai-lieu.html']            = "default/library/pdf/$1";

/*$route['(:any)/career.html']         = "default/career/index/$1";*/

$route['(:any)/doi-tac.html']        = "default/partner/index/$1";

$route['(:any)/sat-thep.html']       = "default/product/index/$1"; // trang san pham chi tiet
$route['(:any)/sat-thep/(:any).html'] = "default/product/post/$1/$2"; // trang san pham chi tiet
$route['(:any)/danh-muc-sat-thep/(:any).html']= "default/product/category/$1/$2"; // trang san pham theo danh muc

$route['(:any)/gom-su.html']       = "default/product2/index/$1"; // trang san pham chi tiet
$route['(:any)/gom-su/(:any).html'] = "default/product2/post/$1/$2"; // trang san pham chi tiet
$route['(:any)/danh-muc-gom-su/(:any).html']= "default/product2/category/$1/$2"; // trang san pham theo danh muc

$route['(:any)/cong-trinh.html']       = "default/project/index/$1"; // trang san pham chi tiet
$route['(:any)/cong-trinh/(:any).html'] = "default/project/post/$1/$2"; // trang san pham chi tiet
$route['(:any)/danh-muc-cong-trinh/(:any).html']= "default/project/category/$1/$2"; // trang san pham theo danh muc


/*
| -------------------------------------------------------------------------
| ADMIN
| -------------------------------------------------------------------------
| 
*/
$route['login.html']  = "admin/login/index";
$route['admin']  	  = "admin/login/index";
/* End of file routes.php */
/* Location: ./application/config/routes.php */