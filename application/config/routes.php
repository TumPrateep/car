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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['admin'] = 'admin/Admin';
$route['user'] = 'user/User';
$route['caraccessory'] = 'caraccessory/Caraccessory';
$route['admin/garage'] = 'garage/Schedule';

$route['register/sparepart'] = 'public/Register/sparepart';
$route['register/garage'] = 'public/Register/garage';
$route['register'] = 'public/Register/user';

$route['shop/lubricator'] = 'public/Menu/lubricator';
$route['shop/sparepart'] = 'public/Menu/sparepart';
$route['shop/sparepart/(\d+)/(:any)/(\d+)/(\d+)'] = 'public/Menu/sparepart/$1/$2/$3/$4';
$route['shop/tire'] = 'public/Menu/tire';
$route['shop/showshop'] = 'public/Menu/showshop';

$route['shop/cart'] = 'public/Menu/cart';
$route['shop/detail/([a-zA-Z]+)/(\d+)'] = function ($group, $id)
{
    if($group == "lubricator"){
        return 'public/SingleProduct/lubricatordetail/' . strtolower($group) . '/' . $id;
    }else if($group == "tire"){
        return 'public/SingleProduct/tireorderdetail/' . strtolower($group) . '/' . $id;
    }else{
        return 'public/SingleProduct/spareordertail/' . strtolower($group) . '/' . $id;
    }
};

$route['login'] = 'public/Auth/login';
$route['shop/payment/(\d+)'] = function ( $id)
{
    return 'public/Payment/Payments/'. $id;
};
$route['shop/order'] = 'public/Order/Orders';
$route['garagesearch'] = 'public/Menu/searchgarage';
$route['comment/(\d+)'] = function ( $id)
{
    return 'public/Menu/garagerating/'. $id;
};

$route['search/lubricator'] = 'user/search/lubricator';
$route['search/tire'] = 'user/search/tire';
$route['search/garage'] = 'user/Garage';

$route['products/tire'] = 'user/tire';
$route['products/lubricator'] = 'user/lubricator';
// user route
// $route['page/(:any)'] = 'main/Main/(:any)';