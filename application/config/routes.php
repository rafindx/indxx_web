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


$route['default_controller'] = 'home';
$route['404_override'] = 'Welcome/notfound';
$route['translate_uri_dashes'] = TRUE;


$route['aboutus'] = 'home/aboutus';
$route['technology'] = 'home/technology';
$route['indexservices'] = 'home/indexservices';
$route['cadmin/whyus'] = 'home/whyus';
$route['cadmin/features'] = 'home/features';
$route['cadmin/valueadditions'] = 'home/valueadditions';
$route['cookiepolicy'] = 'home/cookiepolicy';
$route['dataprivacy'] = 'home/dataprivacy';
$route['contactus'] = 'home/contactus';
$route['news'] = 'home/news';
$route['news/(:any)'] = 'home/news_detail/$1';
$route['announcements'] = 'home/announcements';
$route['announcements/(:any)']     = 'home/announcement_detail/$1';
$route['indices'] = 'home/indices';
$route['test'] = 'home/test_page';


$route['indices/benchmark']     = 'indices/benchmark';
$route['indices/esg']           = 'indices/esg';
$route['indices/income']        = 'indices/income';
$route['indices/strategy']      = 'indices/strategy';
$route['indices/thematic']      = 'indices/thematic';
$route['indices/digital']       = 'indices/digital_asset';
$route['indices/other']         = 'indices/other';

//$route['indices/benchmark/(:any)']     = 'indices/benchmark/$1';
$route['indices/benchmark/(:any)']     = 'Welcome/new_indices_bench/$1';
$route['indices/esg/(:any)']     = 'Welcome/new_indices_esg/$1';
$route['indices/income/(:any)']     = 'Welcome/new_indices_income/$1';
$route['indices/thematic/(:any)']     = 'Welcome/new_indices_thematic/$1';
$route['indices/strategy/(:any)']     = 'Welcome/new_indices_strategy/$1';
$route['indices/digital_asset/(:any)']     = 'Welcome/new_indices_digital/$1';
$route['indices/other/(:any)']     = 'Welcome/new_indices_other/$1';

//$route['indices/benchmark/(.*)'] = "Welcome/new_indices_bench/$1";
//$route['indices/benchmark/(:any)']= "Welcome/new_indices/$1";

#$route['benchmark/:slug'] = 'indices/benchmark';
//benchmark/([a-zA-Z-0-9.&_]+)

// $route['indxx-blockchain-index'] = 'Welcome/new_indices/252';

 require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$db->from( 'index_description' );
$db->order_by('id', 'desc');
$query = $db->get();
$result = $query->result();
foreach( $result as $result )
{
    $in_url=  $result->slug;
    $id=   $result->indxx_id;
    
    $route[ $in_url ] = "Welcome/new_indices/$id";
    //$route['indices/benchmark/(:any)'] = "Welcome/new_indices/$id";
    
}



$db =& DB();
$db->from( 'tbl_research' );
$db->order_by('id', 'desc');
$query = $db->get();
$result = $query->result();
foreach( $result as $result )
{
    
    $in_url=  $result->slug;
    $id=   $result->id;
    
    $route[ $in_url ] = "Welcome/research/$id";

}