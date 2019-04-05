<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topup;
use App\Models\Product;
use App\Models\OrderHistory;
use Illuminate\Support\Facades\DB;



class JoinController extends Controller
{
    public function join(){
      $result1 = OrderHistory::join('topups', 'order_histories.historiesable_id', '=', 'topups.id')
      ->get();
      $result2 = Topup::rightJoin('order_histories', 'topups.id', '=', 'order_histories.historiesable_id')
      ->get();
      $holder;
      foreach($result2 as $items){
        $holder[] = $items->phone_number;
      }

      $holder1 = DB::table('topups')
      ->join('order_histories', 'topups.id', '=', 'order_histories.historiesable_id')
      ->where('topups.user_id', '=', 1)
      ->where('order_histories.historiesable_type', Topup::class)
      ->select('topups.topup_value', 'phone_number','topup_code','user_id as ""', 'order_histories.status')->orderBy('order_histories.updated_at', 'desc');

       $holder2 = DB::table('products')
      ->join('order_histories', 'products.id', '=', 'order_histories.historiesable_id')
      ->where('products.user_id', '=', 1)
      ->where('order_histories.historiesable_type', Product::class)
      ->select('products.price', 'product_name', 'shipping_code', 'shipping_address','order_histories.status')
      ->orderBy('order_histories.updated_at', 'desc')
      ->union($holder1);


      dd($holder2->get());
    }
}
