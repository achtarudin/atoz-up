<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuccessController extends Controller {
  public function index() {
    return view("member.success");
  }
}
