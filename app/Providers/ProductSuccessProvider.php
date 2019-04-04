<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductSuccess;

class ProductSuccessProvider extends ServiceProvider
{
  public function register(){
     $this->app->bind('product-success', function ($app) {
         return new ProductSuccess();
     });
  }

  public function boot()
  {
      //
  }
}
