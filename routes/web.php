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
});

