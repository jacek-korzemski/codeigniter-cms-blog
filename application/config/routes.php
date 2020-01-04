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
// Special controler, just for homepage
$route['default_controller'] = 'pages/view';

// Routes for admin panel
// I'm trying to make readable url's
// but becouse of security - keep all admin functionalitys
// inside one controller: Admin.php

// Login and Logout routes
$route['admin/login'] = 'users/login';
$route['admin/logout'] = 'users/logout';

// Routes for managing pages
$route['admin/pages/add'] = 'admin/add';
$route['admin/pages/add/(:any)'] = 'admin/add/$1';
$route['admin/pages/edit/(:any)'] = 'admin/edit/$1';
$route['admin/pages/delete/(:num)'] = 'admin/delete/$1';

// Routes for managing blocks of content
$route['admin/blocks'] = 'admin/blocks';
$route['admin/blocks/add'] = 'admin/add_block';
$route['admin/blocks/delete/(:num)'] = 'admin/delete_block/$1';
$route['admin/blocks/edit/(:any)'] = 'admin/edit_block/$1';

// Routes for managing posts
$route['admin/posts'] = 'admin/posts';
$route['admin/posts/add'] = 'admin/add_post';
$route['admin/posts/delete/(:num)'] = 'admin/delete_post/$1';
$route['admin/posts/edit/(:any)'] = 'admin/edit_post/$1';

// Routes for managin categories
$route['admin/categories'] = 'admin/categories';
$route['admin/categories/add'] = 'admin/add_category';
$route['admin/categories/delete/(:num)'] = 'admin/delete_category/$1';
$route['admin/categories/edit/(:any)'] = 'admin/edit_category/$1';

// Routes for managin tags
$route['admin/tags'] = 'admin/tags';
//$route['admin/tags/add'] = 'admin/add_tag';
$route['admin/tags/delete/(:num)'] = 'admin/delete_tag/$1';

// Routes for managing media/files
$route['admin/media/add'] = 'admin/add_media';
$route['admin/media/add_multiple'] = 'admin/add_multiple_media';
$route['admin/media/add_folder'] = 'admin/add_folder_media';
$route['admin/do_upload'] = 'admin/do_upload';

// test route for jquery
$route ['ajax/list_folder'] = 'media/list_media_files';
$route ['ajax/list_folder/(:any)'] = 'media/list_media_files/$1';

// Route for documentation
$route['admin/docs'] = 'admin/show_docs';

// Route for admin homepage
$route['admin'] = 'admin/dashboard';

// Frontend part of app
// Show selected Category, no pagination
$route['c-(:any)'] = 'categories/view/category/$1';

// Show selected category from current pagination
$route['c-(:any)/p-(:num)'] = 'categories/view/pagination/$1/$2'; 

// Show post from a category
// Becouse I want to keep the category name inside URL,
// I've decided to use Category controller instead of
// own post controller
$route['c-(:any)/(:any)'] = 'categories/view/post/$1/$2/$3';


// Route for tags
$route['t-(:any)'] = 'categories/post_by_tag/$1';

// Show information page, that is not a post
$route['p-(:any)'] = 'pages/view/$1'; 

// Search engine routes
$route['wyszukiwarka'] = 'search/start_searching';
$route['szukaj'] = 'search/search_keyword';

$route['kontakt'] = 'pages/contact_page';
$route['all'] = 'pages/all_page';

// And the rest is some standards
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
