<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//fontend=============================
Route::get('/','myController@index'); 
//show category product..........
Route::get('/categorybyproduct/{id}','myController@categorybyproduct');
Route::get('/brandbyproduct/{id}','myController@brandbyproduct');
Route::get('/product_details/{id}','myController@product_details');
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_to_cart/{id}','CartController@delete_to_cart');
Route::post('/update_cart','CartController@update_cart');
//checkout.................
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer_signup','CheckoutController@customer_signup');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/checklogin','CheckoutController@checklogin');
//customer logout...................
Route::get('/customer-logout','SuperCustomerController@customer_logout');
Route::post('/save-shiping','CheckoutController@save_shiping');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/customeraccount','AccountController@customeraccount');
Route::get('/confirm/{id}','AccountController@confirm');
 


 


















//backend===============================
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashbord','AdminController@showdashbord')->middleware('CheckAdmin');
Route::post('/admin-dashbord','AdminController@dashbord');
Route::get('/addcategory','CategoryController@index')->middleware('CheckAdmin');
//save category...
Route::post('/savecategory','CategoryController@savecategory')->middleware('CheckAdmin');
Route::get('/manegcategory','CategoryController@manegcategory')->middleware('CheckAdmin');
Route::get('/editcategory/{id}','CategoryController@editcategory')->middleware('CheckAdmin');
Route::post('/updatecat','CategoryController@updatecat')->middleware('CheckAdmin');
Route::get('/deletecategory/{id}','CategoryController@deletecategory')->middleware('CheckAdmin');
//brand............
Route::get('/addbrand','BrandController@index')->middleware('CheckAdmin');
Route::post('/savebrand','BrandController@savebrand')->middleware('CheckAdmin');
Route::get('/manegbrand','BrandController@manegbrand')->middleware('CheckAdmin');
Route::get('/editbrand/{id}','BrandController@editbrand')->middleware('CheckAdmin');
Route::post('/updatebrand','BrandController@updatebrand')->middleware('CheckAdmin');
Route::get('/deletebrand/{id}','BrandController@deletebrand')->middleware('CheckAdmin');
//product.......
Route::get('/addproduct','ProductController@index')->middleware('CheckAdmin');
Route::post('/addproduct','ProductController@addproduct')->middleware('CheckAdmin');
Route::get('/manegproduct','ProductController@manegproduct')->middleware('CheckAdmin');
Route::get('/editproduct/{id}','ProductController@editproduct')->middleware('CheckAdmin');
Route::post('/updateproduct','ProductController@updateproduct')->middleware('CheckAdmin');
Route::get('/deleteproduct/{id}','ProductController@deleteproduct')->middleware('CheckAdmin');
//slider.........................

Route::get('/addslider','SliderController@index');
Route::post('/addslider','SliderController@addslider');
Route::get('/manegslider','SliderController@manegslider');
Route::get('/editslider/{id}','SliderController@editslider');
Route::post('/updateslider','SliderController@updateslider');
Route::get('/deleteslider/{id}','SliderController@deleteslider');
Route::get('/manegorder','CheckoutController@manegorder');
Route::get('/orderdetails/{id}/{orderid}','CheckoutController@orderdetails');
Route::get('/deleteorder/{id}','CheckoutController@deleteorder');
Route::get('/editorder/{order_id}/{payment_id}','CheckoutController@editorder');
Route::post('/updateorder','CheckoutController@updateorder');
