<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\TopupFailed;

class SuccessController extends Controller {
  public function index(Request $request) {
    $orderNo = $request->session()->get('orderNo');
    TopupFailed::dispatch($orderNo)
    ->delay(now()->addMinutes(5));
    return view("member.success");
  }
}
