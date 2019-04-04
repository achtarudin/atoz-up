<?php
namespace App\Services;

use App\Services\Interfaces\PaymentOrder;
use App\Models\Product;

class ProductPayment implements PaymentOrder
{
  public static function payment($shipping_code){
    Product::paid($shipping_code);
  }
}
