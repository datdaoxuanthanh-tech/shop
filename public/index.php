<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../core/Router.php";
require_once __DIR__ . "/../config/db.php";

$router = new Router();


// ================= AUTH =================
$router->get("/login","AuthController@loginForm");
$router->post("/login","AuthController@login");

$router->get("/register","AuthController@registerForm");
$router->post("/register","AuthController@register");

$router->get("/logout","AuthController@logout","auth");


// ================= HOME =================
$router->get("/","ProductController@index");


// ================= PRODUCT =================
$router->get("/product/create","ProductController@createForm","admin");
$router->post("/product/store","ProductController@store","admin");
$router->get("/product/delete","ProductController@delete","admin");


// ================= CART =================
$router->get("/cart","CartController@index","auth");
$router->post("/cart/add","CartController@add","auth");
$router->get("/cart/remove","CartController@remove","auth");


// ================= CHECKOUT =================
$router->get("/checkout","CheckoutController@index","auth");
$router->post("/checkout/placeOrder","CheckoutController@placeOrder","auth");


// ================= ADMIN =================
$router->get("/admin","AdminController@dashboard","admin");

$router->get("/admin/orders","AdminController@orders","admin");
$router->get("/admin/orders/show","AdminController@showOrder","admin");
$router->post("/admin/orders/update","AdminController@updateOrder","admin");


// ================= RUN =================
$router->dispatch();