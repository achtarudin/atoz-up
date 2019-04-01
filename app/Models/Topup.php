<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topup extends Model{

  use SoftDeletes;
  
  protected $orderHistories = 'App\Models\OrderHistory';
  protected $user = 'App\Models\Sentinel\User';
  protected $table = "topups";
  protected $fillable = [
    "user_id",
    "phone_number",
    "topup_value",
    "topup_code",
  ];

  public static function generateCode($length = 6){ 
     $code = substr(md5(time()), 0, $length);
     return "TP{$code}";
  }

  public function histories () {
    return $this->morphMany($this->orderHistories, 'historiesable');
  }
  
  public function user(){
    return $this->belongsTo($this->user, 'user_id');
  }
}
