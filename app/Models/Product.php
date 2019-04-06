<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model{

  use SoftDeletes;
  protected $orderHistories = 'App\Models\OrderHistory';
  protected $user = 'App\Models\Sentinel\User';
  protected $table = "products";
  protected $fillable = [
    "user_id",
    "product_name",
    "shipping_address",
    "code",
    "price",
  ];

  public static function generateCode($length = 8){ 
     $code = substr(md5(time()), 0, $length);
     return "PR{$code}";
  }

  public function scopePaid($query, $code){
    return $query->where('code', $code)->first()->histories->update(["status" => "success"]);
  }

  public function histories () {
    return $this->morphOne($this->orderHistories, 'historiesable');
  }

  public function user(){
    return $this->belongsTo($this->user, 'user_id');
  }
}
