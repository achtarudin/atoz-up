<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrepaidController extends Controller
{
  public function index() {
    return view("member.prepaid_balance");
  }
}
