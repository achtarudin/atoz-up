<?php
namespace App\Services\Interfaces;

interface PaymentOrder {
  public static function payment($orderNo);
}