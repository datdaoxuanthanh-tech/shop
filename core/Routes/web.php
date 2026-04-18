<?php

// ================= HOME =================
$router->get('/', 'HomeController@index');


// ================= AUTH =================
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');

$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@register');

$router->get('/logout', 'AuthController@logout');


// ================= PRODUCT =================
$router->get('/products', 'ProductController@index');
$router->get('/product/show', 'ProductController@show');


// ================= CART =================
$router->get('/cart', 'CartController@index');
$router->post('/cart/add', 'CartController@add');
$router->get('/cart/remove', 'CartController@remove');
$router->post('/cart/update', 'CartController@update');


// ================= CHECKOUT =================
$router->get('/checkout', 'CheckoutController@index');
$router->post('/checkout/placeOrder', 'CheckoutController@placeOrder');


// ================= ADMIN =================
$router->get('/admin/orders', 'AdminOrderController@index');
$router->get('/admin/orders/show', 'AdminOrderController@show');
$router->post('/admin/orders/update', 'AdminOrderController@update');