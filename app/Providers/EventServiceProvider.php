<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {
    
  protected $listen = [
    'App\Events\TopUpEvent' => [
      'App\Listeners\ProcessTopUp',
    ],
    'App\Events\CreateHistory' => [
      'App\Listeners\SaveHistory',
    ]
  ];

    
  public function boot() {
    parent::boot();

      //
  }
}
