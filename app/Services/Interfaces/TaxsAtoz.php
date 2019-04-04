<?php
namespace App\Services\Interfaces;

interface TaxsAtoz {
  public static function topup($price);
  public static function product($price);
}