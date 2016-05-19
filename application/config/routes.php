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
|	http://codeigniter.com/user_guide/general/routing.html
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
//$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = "home";

//Fronend route start here.
$route['login'] = "home/login";
$route['signup'] = "home/signup";
$route['logout'] = "home/logout";
$route['forgot_password'] = "home/forgot_password";
$route['reset_password/(.+)'] = "home/reset_password/1$";
$route['check_email'] = "home/check_email";
$route['check_email_forgot_password'] = "home/check_email_forgot_password";
$route['verify/(.+)'] = "home/verify/1$";
$route['about'] = "home/about";
$route['privacy'] = "home/privacy";
$route['terms'] = "home/terms";
$route['myprofile'] = "user/myprofile";
$route['faq'] = "home/faq";

//Fronend route end here.


// Backend route start here.

$route['cdadmin/login'] = "cdadmin/home/login";
$route['cdadmin/logout'] = "cdadmin/home/logout";
$route['cdadmin/pages/(.+)'] = "cdadmin/pages/$1";
$route['cdadmin/(.+)'] = "cdadmin/admin/$1";



// Backend route end here.
$route['scaffolding_trigger'] = "";
$route['404_override'] = 'pagenotfound';


