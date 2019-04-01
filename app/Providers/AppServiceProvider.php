<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider {

  public function register(){
      //
  }

  public function boot() {
    Schema::defaultStringLength(191);
    Blade::directive('rupiah', function ($expression) {
      return "<?php echo 'Rp . ' . {$expression}; ?>";
    });
  }
}
