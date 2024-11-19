<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/about', 'App\Controllers\Client\HomeController@about');
Route::get('/contact', 'App\Controllers\Client\HomeController@contact');
Route::get('/blog', 'App\Controllers\Client\HomeController@blog');
Route::get('/cart', 'App\Controllers\Client\HomeController@cart');
Route::get('/checkout', 'App\Controllers\Client\HomeController@checkout');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/login', 'App\Controllers\Client\HomeController@login');

Route::get('/register', 'App\Controllers\Client\HomeController@register');





// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cu the)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');









//  *** Product
// GET /Product (lấy danh sách loại sản phẩm)
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');

// GET /Product/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');

// POST /Product (tạo mới một loại sản phẩm)
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');

// GET /Product/{id} (lấy chi tiết loại sản phẩm với id cu the)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /Product/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /Product/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');





//  *** Blog
// GET /Blog (lấy danh blog)
Route::get('/admin/blog', 'App\Controllers\Admin\BlogController@index');

// GET /Product/create (hiển thị form thêm blog)
Route::get('/admin/blog/create', 'App\Controllers\Admin\BlogController@create');

// POST /Product (tạo mới một blog)
Route::post('/admin/blog', 'App\Controllers\Admin\BlogController@store');

// GET /Product/{id} (lấy chi tiết blog với id cu the)
Route::get('/admin/blog/{id}', 'App\Controllers\Admin\BlogController@edit');

// PUT /Product/{id} (update loại blog với id cụ thể)
Route::put('/admin/blog/{id}', 'App\Controllers\Admin\BlogController@update');

// DELETE /Product/{id} (delete loại blog với id cụ thể)
Route::delete('/admin/blog/{id}', 'App\Controllers\Admin\BlogController@delete');





//  *** Comment
// GET /Comment (lấy danh sách loại sản phẩm)
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');

// GET /Comment/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/comments/create', 'App\Controllers\Admin\CommentController@create');

// POST /Comment (tạo mới một loại sản phẩm)
Route::post('/admin/comments', 'App\Controllers\Admin\CommentController@store');

// GET /Comment/{id} (lấy chi tiết loại sản phẩm với id cu the)
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /Comment/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');










//  *** user
// GET /user (lấy danh sách loại sản phẩm)
//  *** User
// GET /User (lấy danh sách  người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /users/create (hiển thị form thêm  người dùng)
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');

// POST /users (tạo mới một  người dùng)
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');

// GET /users/{id} (lấy chi tiết  người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');

// PUT /users/{id} (update  người dùng với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /users/{id} (delete  người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');


Route::dispatch($_SERVER['REQUEST_URI']);
