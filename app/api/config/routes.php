<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'app';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// API CLIENT Auth
$route['client/login'] = 'authentication/client_login';
// API


$route['material/data'] = 'MaterialRest/data';
$route['demand/add'] = 'DemandRest/new_demand';
$route['demand/data'] = 'DemandRest/show_demand';