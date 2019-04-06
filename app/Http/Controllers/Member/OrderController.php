<?php

namespace App\Http\Controllers\Member;

use Sentinel;
use App\Models\Topup;
use App\Models\Product;
use App\Models\OrderHistory;
use App\Models\Sentinel\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller{
  
  public function index() {
    $user = User::findById();
    $userHistory = collect([]);
    foreach($user->topup as $userIsTopup){
      $userHistory[] = $userIsTopup;
    }
    foreach ($user->product as $userHasProduct) {
    $userHistory[] = $userHasProduct;
  }
  return view("member.order", compact('userHistory'));
  }

  public function payOrder (Request $request, $id){
    $orderHistory =  OrderHistory::find($id);
    $orderNo = $orderHistory->historiesable->code;
    $type = $orderHistory->historiesable_type;
    $request->session()->flash('type', $type);
    return view('member.payment', compact("orderNo"));
  }
}