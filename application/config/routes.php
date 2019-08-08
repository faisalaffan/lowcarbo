<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = 'MY404';
$route['translate_uri_dashes'] = TRUE;

// ========================= ROUTE API =======================
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

// ========================= ROUTE API =======================

// $route['api/users']['GET']          = "UserController/index";
// $route['api/user/(:num)']['GET']    = "UserController/get/$1";
// $route['api/user']['POST']          = "UserController/save";
// $route['api/user/(:num)']['PUT']    = "UserController/update/$1";
// $route['api/user/(:num)']['DELETE'] = "UserController/delete/$1";
// $route['api/login']['POST']         = "UserController/login";

