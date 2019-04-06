<?php
namespace App\Services;

use App\Services\Interfaces\PaymentOrder;
use App\Services\TopupPayment;
use App\Services\ProductPayment;
class PaymentProcess{
  
  protected $orderNo;
  protected $typeService = [
    "App\Models\Topup" => TopupPayment::class,
    "App\Models\Product" => ProductPayment::class

  ];
  public function __construct($orderNo){
    $this->orderNo = $orderNo;
  }

  public function pay(PaymentOrder $order){
    // $this->typeService[$order]->payment($this->orderNo);
    $order->payment($this->orderNo);
  }
}
