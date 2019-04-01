<?php

namespace App\Listeners;

use App\Events\CreateHistory;
use App\Models\OrderHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveHistory {

  public function handle(CreateHistory $event) {
    $unpaid = new OrderHistory(["status" => OrderHistory::defaultStatus()]);
    $event->userTopup->histories()->save($unpaid);
  }
}
