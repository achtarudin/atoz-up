<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sentinel;

class OrderHistory extends Model {
  use SoftDeletes;

  protected $table = 'order_histories';
  protected $fillable = [
    'user_id',
    'status',
    'historiesable_id',
    'historiesable_type',
  ];

  public function historiesable () {
    return $this->morphTo();
  }

  public function getStatusAttribute($status = 'unpaid'){
    return $status;
  }

  public static function defaultStatus(){
    return 'unpaid';
  }

  public function scopeUnpaid ($query){
    $idUser = Sentinel::getUser()->id;
    return $query->where('user_id', $idUser)->where('status', 'unpaid')->count();
  }

}
