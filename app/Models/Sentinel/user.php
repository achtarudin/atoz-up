<?php

namespace App\Models\Sentinel;
use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser {
  protected $topUp = 'App\Models\Topup';

  public function topup() {
    return $this->hasMany($this->topUp);
  }

  public static function findById(){
    return static::find(Sentinel::getUser()->id);
  }
}
