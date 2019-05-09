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
  Route::post("product", "Member\ProductController@store")->name("post-product");

  Route::get("success", "Member\SuccessController@index")->name("success");

  Route::get("payment", "Member\PaymentController@index")->name("payment");
  Route::post("payment", "Member\PaymentController@store")->name("post-payment");

  Route::get("order", "Member\OrderController@index")->name("history-order");
  Route::get("pay-order/{id}", "Member\OrderController@payOrder")->name("pay-order");
  Route::post("search-order/{userId}", "Member\OrderController@searchOrder")->name("search-order");


  Route::get("logout", "Auth\LogoutController@logout")->name("logout");
});

Route::get('join', 'JoinController@join');
Route::get('upload', 'MultiUpload\UploadController@upload');
Route::post('upload', 'MultiUpload\UploadController@uploadImage');

// Generete Pdf with makepdfjs
Route::get('make/pdf', 'MakePdf\GeneratePdfController@index');

