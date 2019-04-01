<?php
Route::group(['middleware' => "visitor"], function () {
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get("register", "Auth\RegisterController@index")->name("register");
  Route::post("register", "Auth\RegisterController@store")->name("post-register");
  Route::get("login", "Auth\LoginController@index")->name("login");
  Route::post("login", "Auth\LoginController@store")->name("post-login");
});

Route::group(['middleware' => "member"], function () {
  Route::get("prepaid-balance", "Member\PrepaidController@index")->name("prepaid-balance");
  Route::post("prepaid-balance", "Member\PrepaidController@store")->name("post-prepaid-balance");

  Route::get("product", "Member\ProductController@index")->name("product");
  Route::get("success", "Member\SuccessController@index")->name("success");
  Route::get("payment", "Member\PaymentController@index")->name("payment");
  Route::get("order", "Member\OrderController@index")->name("order");
});

