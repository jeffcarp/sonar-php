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

/* Front-Facing
---------------------------------------------*/
$route['news'] 				= 	"departments/show/news";
$route['local'] 			= 	"departments/show/local";
$route['opinion'] 			= 	"departments/show/opinion";
$route['features'] 			= 	"departments/show/features";
$route['ae'] 				= 	"departments/show/ae";
$route['sports'] 			= 	"departments/show/sports";

$route['news/(:any)'] 		= 	"articles/show/$1";
$route['local/(:any)'] 		= 	"articles/show/$1";
$route['opinion/(:any)'] 	= 	"articles/show/$1";
$route['features/(:any)'] 	= 	"articles/show/$1";
$route['ae/(:any)'] 		= 	"articles/show/$1";
$route['sports/(:any)'] 	= 	"articles/show/$1";

$route['blog']				= 	"blog/page/1";
$route['blog/page/(:num)']  = 	"blog/page/$1";
$route['blog/topics/(:any)']= 	"blog/topics/$1";
$route['blog/(:num)/(:any)']= 	"articles/show/$1";

$route['about/(:any)'] 		= 	"articles/show/$1";
$route['contact/(:any)'] 	= 	"articles/show/$1";

$route['about'] 			= 	"articles/show/about-the-colby-echo";
$route['subscribe'] 		= 	"articles/show/subscribe";
$route['contact'] 			= 	"articles/show/contact";

$route['people/(:any)'] 	= 	"people/show/$1";

$route['photos/(:num)'] 	= 	"photos/show/$1";

$route['topics/(:any)'] 	= 	"topics/show/$1";

$route['videos/(:any)'] 	= 	"videos/show/$1";
$route['videos'] 			= 	"videos/show/latest";

/* Sonar
---------------------------------------------*/
$route['sonar'] 			= 	"sonar/issues/prototype";

$route['sonar/sessions'] 	= 	"sonar/sessions/neue";

/* Island of long lost links
---------------------------------------------*/
$route['echoes/(:any)'] 	= 	"errors/redirect_to_blog";
$route['echoes'] 			= 	"errors/redirect_to_blog";
$route['bubble/page/(:num)']= 	"errors/redirect_to_blog_page/$1";
$route['bubble/(:any)'] 	= 	"errors/redirect_to_blog_post/$1";
$route['blog/(:any)'] 		= 	"errors/redirect_to_blog_post/$1";
$route['bubble'] 			= 	"errors/redirect_to_blog";

/* Defaults
---------------------------------------------*/
$route['default_controller'] = "frontpage";
$route['404_override'] = 'errors/not_found';


/* End of file routes.php */
/* Location: ./application/config/routes.php */