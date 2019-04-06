<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\TopupFailed;

class SuccessController extends Controller {
  public function index(Request $request) {
    $order = [
      "code" => $request->session()->get('orderNo'),
      "total" => $request->session()->get('total'),
      "type" => $request->session()->get('type'),
      "message" => $request->session()->get('message'),
    ];
    TopupFailed::dispatch($order['code'])->delay(now()->addMinutes(5));
    return view("member.success")->with('order', $order);
  }
}
