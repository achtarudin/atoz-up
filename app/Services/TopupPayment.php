<?php
namespace App\Services;

use App\Services\Interfaces\PaymentOrder;
use App\Models\Topup;

class TopupPayment implements PaymentOrder{

  public static function payment($orderNo){
    Topup::paid($orderNo);
  }
}