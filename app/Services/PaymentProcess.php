<?php
namespace App\Services;

use App\Services\Interfaces\PaymentOrder;

class PaymentProcess{
  
  protected $orderNo;
  public function __construct($orderNo){
    $this->orderNo = $orderNo;
  }

  public function pay(PaymentOrder $order){
    $order->payment($this->orderNo);
  }
}
