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
    "value",
    "code",
  ];

  public static function generateCode($length = 8){ 
    $code = substr(md5(time()), 0, $length);
    return "TP{$code}";
  }
  
  public function scopePaid($query, $orderNo, $status='success'){
    return $query->where('code', $orderNo)->first()->histories->update(["status" => $status]);
  }

  public function scopeStatus($query, $orderNo) {
    return $query->where('code', $orderNo)->first()->histories->status;
  }
  public function histories () {
    return $this->morphOne($this->orderHistories, 'historiesable');
  }
  
  public function user(){
    return $this->belongsTo($this->user, 'user_id');
  }
}
