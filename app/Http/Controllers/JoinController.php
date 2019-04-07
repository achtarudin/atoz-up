<?php

namespace App\Http\Controllers;

use App\Models\Topup;
use App\Models\Product;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Models\Sentinel\User;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    public function join()
    {
        // $user = User::findById();
        // $userId = $user->id;

        // $result1 = Topup::with(['histories'])
        //   ->where('topups.user_id', $userId)
        //   ->join('order_histories', 'topups.id', '=', 'order_histories.historiesable_id')
        //   ->where('order_histories.historiesable_type', Topup::class)
        //   ->select('topups.value', 'phone_number', 'code', 'topups.user_id', 'order_histories.status', 'order_histories.updated_at', 'order_histories.historiesable_type')
        //   ->orderBy('order_histories.updated_at', 'desc');

        // $result2 = Product::with(['histories'])
        //   ->where('products.user_id', $userId)
        //   ->join('order_histories', 'products.id', '=', 'order_histories.historiesable_id')
        //   ->where('order_histories.historiesable_type', Product::class)
        //   ->select('products.price', 'product_name', 'code', 'shipping_address', 'order_histories.status', 'order_histories.updated_at', 'order_histories.historiesable_type')
        //   ->orderBy('order_histories.updated_at', 'desc')
        //   ->union($result1);

        //   foreach ($result2->where('code', 'PR89f9c760')->get() as $key => $value) {
        //     echo "<pre>product {$value}</pre>";
        //   }

                  
        // dd($result2->get(), $result2->paginate());

        //  $userTopup = Topup::where('user_id',$userId)->first()->histories->select('user_id')->get();
        //  $userProduct = Product::where('user_id', $userId)->get()[0]->histories();

      //   $holder1 = DB::table('topups')
      // ->join('order_histories', 'topups.id', '=', 'order_histories.historiesable_id')
      // ->where('topups.user_id', '=', 2)
      // ->where('order_histories.historiesable_type', Topup::class)
      // ->select('topups.value', 'phone_number', 'code', 'topups.user_id as ""', 'order_histories.status')->orderBy('order_histories.updated_at', 'desc');

      //   $holder2 = DB::table('products')
      // ->join('order_histories', 'products.id', '=', 'order_histories.historiesable_id')
      // ->where('products.user_id', '=', 2)
      // ->where('order_histories.historiesable_type', Product::class)
      // ->select('products.price', 'product_name', 'code', 'shipping_address', 'order_histories.status')
      // ->orderBy('order_histories.updated_at', 'desc')
      // ->union($holder1);


      //   dd($holder2->get());
      $result  = OrderHistory::where('historiesable_type', 'App\Models\Topup')
      ->get()[0]->historiesable->code;
      dd($result);
    }
}
