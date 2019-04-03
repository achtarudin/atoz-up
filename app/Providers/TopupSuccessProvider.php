<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TopupSuccess;

class TopupSuccessProvider extends ServiceProvider
{
  
  public function register(){
    $this->app->bind('topup-success', function ($app) {
    return new TopupSuccess();
  });

  }

  public function boot(){

  }
    
}
