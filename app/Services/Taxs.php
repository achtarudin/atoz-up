<?php
namespace App\Services;

use App\Services\Interfaces\TaxsAtoz;
class Taxs implements TaxsAtoz{

  public static function topup($price) {
    $price  = (int)$price;
    $persentace = 0.05;
    $taxs = $price * $persentace;
    return $price + $taxs;
  }

  public static function product($price) {
    $price  = (int)$price;
    $persentace = 10000;
    return $price + $persentace;
  }
}