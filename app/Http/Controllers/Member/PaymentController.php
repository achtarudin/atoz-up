<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\Topup;
use App\Services\PaymentProcess;
use App\Http\Controllers\Controller;
use Sentinel;

class PaymentController extends Controller{
  public function index(Request $request) {
    $orderNo = $request->session()->get('orderNo');
    $request->session()->forget(['orderNo', 'total', 'message']);
    return view("member.payment", compact('orderNo'));
  }

  public function store(Request $request){
    try{
      $process = new PaymentProcess($request->orderNo);
      $type = $request->session()->get('type');
      $process->pay(new $type);
      return redirect()->route('order');
    }
    catch(\ErrorException $error){
      Sentinel::logout();
      return redirect()->route('login');
    }
  }
}
