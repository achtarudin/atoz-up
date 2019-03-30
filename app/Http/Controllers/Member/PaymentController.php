<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller{
  public function index() {
    return view("member.payment");
  }
}
