<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller{

  public function logout() {
    Sentinel::logout();
    return redirect()->route('login');
  }
  
}
