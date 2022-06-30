<?php defined('BASEPATH') or exit('No direct script access allowed');

// Framework routes
$route['default_controller'] = 'main';
$route['404_override'] = 'notify/error_404';
$route['translate_uri_dashes'] = true;


// Shop routes
// $route['shop'] = 'main';
// $route['shop/search'] = 'shop/shop/search';
// $route['shop/products'] = 'shop/shop/products';
$route['product/(:any)'] = 'shop/shop/products/$1';
$route['productDetail/(:any)'] = 'shop/shop/productDetails/$1';
// $route['category/(:any)'] = 'shop/shop/products/$1';
// $route['brand/(:any)'] = 'shop/shop/products/0/0/$1';
// $route['category/(:any)/(:any)'] = 'shop/shop/products/$1/$2';

$route['/'] =  'Main/index';
$route['/home'] =  'Main/home';
$route['writeup'] =  'Main/writeup';
$route['nearbystores'] =  'Main/nearbystores';
$route['search'] =  'Main/search';
$route['discover_people'] =  'user/discover_people';
$route['twentyseven'] =  'Main/twentyseven';
$route['wall'] =  'Main/wall';
$route['addPost'] =  'Shop/addPost';
$route['u-shop-up'] =  'Main/uShopUp';
$route['u-post-up-discover-filter'] =  'Main/uPostUpDiscoverFilter';
// $route['/productDetail/(:any)'] =  'shop/shop/productDetails/$1';
$route['products'] =  'shop/shop/productsAjax';
$route['profile/(:any)'] =  'User/profile/$1';
$route['getCategories'] =  'Main/getCategories';
$route['getCategories/(:any)/(:any)'] =  'Main/getCategories/$1/$2';
$route['getsubcat2/(:any)'] =  'Main/getsubcat2/$1';
$route['getsubcatsub/(:any)'] =  'Main/getsubcatsub/$1';
$route['getProductsbyCtaegory'] =  'Main/getProductsbyCtaegory';
$route['getProductsbyHashtags/(:any)'] =  'Main/getProductsbyHashtags/$1';
$route['getProductsbyCtaegory/(:any)'] =  'Main/getProductsbyCtaegory/$1';
$route['getProductsbyCtaegory/(:any)/(:any)'] =  'Main/getProductsbyCtaegory/$1/$2';
$route['getProductsbyUserCtaegory'] =  'user/getProductsbyUserCtaegory';
$route['getProductsbyUserCtaegory/(:any)'] =  'user/getProductsbyUserCtaegory/$1';
$route['getProductsbyUserCtaegory/(:any)/(:any)'] =  'user/getProductsbyUserCtaegory/$1/$2';
$route['getWriteupbyUserCtaegory'] =  'user/getWriteupbyUserCtaegory';
$route['getWriteupbyUserCtaegory/(:any)'] =  'user/getWriteupbyUserCtaegory/$1';
$route['getWriteupbyUserCtaegory/(:any)/(:any)'] =  'user/getWriteupbyUserCtaegory/$1/$2';
$route['timeAgo(:any)']= 'Main/get_time_ago/$1';
$route['login']= 'user/login';
$route['signup']= 'user/signup';
$route['checkUserlogin'] = 'user/checkUserlogin';
$route['logout' ]= 'user/logout';
$route['validatecode']= 'user/validatecode';
$route['checkEmail']= 'user/checkEmail';
$route['verifyUser']= 'user/verifyUser';
$route['emailValidate/(:any)']= 'user/emailValidate/$1';
$route['invite_sent']= 'user/invite_sent';
$route['invite_type']= 'user/invite_type';
$route['invitation_list']= 'user/invitation_list';
$route['invitation']= 'user/invitation';
$route['edit_profile']= 'user/edit_profile';
$route['add_address']= 'user/add_address';
$route['addresses']= 'user/addresses';
$route['defaultAddress/(:any)/(:any)']= 'user/defaultAddress/$1/$2';
$route['deleteAddress/(:any)']='user/deleteAddress/$1';
$route['unfollow/(:any)']='user/unfollow/$1';
$route['privacypolicy'] = 'main/privacypolicy';
// Page route
// $route['product/(:any)'] = 'shop/shop/page/$1';

// Cart routes
// $route['cart'] = 'shop/cart_ajax';
// $route['cart/(:any)'] = 'shop/cart_ajax/$1';
// $route['cart/(:any)/(:any)'] = 'shop/cart_ajax/$1/$2';

// // Misc routes
// $route['shop/(:any)'] = 'shop/shop/$1';
// $route['shop/(:any)/(:any)'] = 'shop/shop/$1/$2';
// $route['shop/(:any)/(:any)/(:any)'] = 'shop/shop/$1/$2/$3';

// // Auth routes
// $route['login'] = 'main/login';
// $route['logout'] = 'main/logout';
// $route['profile'] = 'main/profile';
// $route['register'] = 'main/register';
// $route['login/(:any)'] = 'main/login/$1';
// $route['logout/(:any)'] = 'main/logout/$1';
// $route['profile/(:any)'] = 'main/profile/$1';
// $route['forgot_password'] = 'main/forgot_password';
// $route['activate/(:any)/(:any)'] = 'main/activate/$1/$2';
// $route['reset_password/(:any)'] = 'main/reset_password/$1';

// // Admin area routes
// $route['admin'] = 'admin/welcome';
// $route['admin/salesman'] = 'admin/auth/salesman';
// $route['admin/users'] = 'admin/auth/users';
// $route['admin/users/create_user'] = 'admin/auth/create_user';
// $route['admin/users/profile/(:num)'] = 'admin/auth/profile/$1';
// $route['admin/login'] = 'admin/auth/login';
// $route['admin/login/(:any)'] = 'admin/auth/login/$1';
// $route['admin/logout'] = 'admin/auth/logout';
// $route['admin/logout/(:any)'] = 'admin/auth/logout/$1';
// // $route['admin/register'] = 'admin/auth/register';
// $route['admin/forgot_password'] = 'admin/auth/forgot_password';
// $route['admin/sales/(:num)'] = 'admin/sales/index/$1';
// $route['admin/products/(:num)'] = 'admin/products/index/$1';
// $route['admin/purchases/(:num)'] = 'admin/purchases/index/$1';
// $route['admin/quotes/(:num)'] = 'admin/quotes/index/$1';
