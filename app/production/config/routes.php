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
$route['default_controller'] = 'AppController/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['app/login'] = 'AppController/login';
$route['app/logout'] = 'AppController/logout';
$route['app/welcome'] = 'AppController/welcome';
$route['app/profile'] = 'AppController/profile';

$route['material/index'] = 'MaterialController/index';
$route['material/sync'] = 'MaterialController/sync';
$route['material/create'] = 'MaterialController/create';
$route['material/store'] = 'MaterialController/store';
$route['material/show'] = 'MaterialController/show';
$route['material/update'] = 'MaterialController/update';
$route['material/delete/(:num)'] = 'MaterialController/delete/$1';
$route['material/edit/(:num)'] = 'MaterialController/edit/$1';

$route['supplier/index'] = 'SupplierController/index';
$route['supplier/create'] = 'SupplierController/create';
$route['supplier/store'] = 'SupplierController/store';
$route['supplier/show'] = 'SupplierController/show';
$route['supplier/update'] = 'SupplierController/update';
$route['supplier/delete/(:num)'] = 'SupplierController/delete/$1';
$route['supplier/edit/(:num)'] = 'SupplierController/edit/$1';

$route['supply/index'] = 'SupplyController/index';
$route['supply/create'] = 'SupplyController/create';
$route['supply/store'] = 'SupplyController/store';
$route['supply/show'] = 'SupplyController/show';
$route['supply/update'] = 'SupplyController/update';
$route['supply/delete/(:num)'] = 'SupplyController/delete/$1';
$route['supply/edit/(:num)'] = 'SupplyController/edit/$1';

$route['demand/index'] = 'DemandController/index';
$route['demand/create'] = 'DemandController/create';
$route['demand/store'] = 'DemandController/store';
$route['demand/show'] = 'DemandController/show';
$route['demand/update'] = 'DemandController/update';
$route['demand/delete/(:num)'] = 'DemandController/delete/$1';
$route['demand/edit/(:num)'] = 'DemandController/edit/$1';