<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderHistory extends Model {
  use SoftDeletes;

  protected $table = 'order_histories';
  protected $fillable = [
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


}
