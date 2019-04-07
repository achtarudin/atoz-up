<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Events\CreateHistory;
use App\Models\Sentinel\User;
use App\Http\Controllers\Controller;
use  App\Http\Requests\ValidateProduct;

class ProductController extends Controller{
  
  public function index(Request $request) {
    $request->session()->forget(['orderNo', 'total', 'message', 'type']);
    return view("member.product");
  }

  public function store(ValidateProduct $request){
    $request->validated();
    $user = User::findById();
    $product  = new Product([
      "product_name" => $request->product,
      "shipping_address" => $request->shipping,
      "code" => Product::generateCode(),
      "price" => $request->price,
    ]);
    $userProduct = $user->product()->save($product);
    event(new CreateHistory($userProduct));
    return redirect()->route('success');

  }
}
