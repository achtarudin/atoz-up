<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;
use App\Http\Requests\ValidateRegister;


class RegisterController extends Controller {
  
  public function index(){
    return view("register.register");
  }

  public function store(ValidateRegister $request){
    $request->validated();
    Sentinel::registerAndActivate($request->all());
    return redirect()->route("login");
  }
}
