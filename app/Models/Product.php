<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model{

  use SoftDeletes;
  protected $orderHistories = 'App\Models\OrderHistory';
  protected $table = "products";
  protected $fillable = [
    "user_id",
    "product_name",
    "shipping_address",
    "shipping_code",
    "price",
  ];

  public function histories () {
    return $this->morphMany($this->orderHistories, 'historiesable');
  }
}
