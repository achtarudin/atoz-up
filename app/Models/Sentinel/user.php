<?php

namespace App\Models\Sentinel;
use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser {
  protected $topUp = 'App\Models\Topup';
  protected $product = 'App\Models\Product';

  public function topup() {
    return $this->hasMany($this->topUp);
  }

  public function product() {
    return $this->hasMany($this->product);
  }

  public static function findById(){
    return static::find(Sentinel::getUser()->id);
  }
}
