<?php

namespace App\Listeners;

use App\Models\Topup;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Events\CreateHistory;
use App\Models\Sentinel\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class SaveHistory {

  public $request;
  public function __construct(Request $request){
    $this->request = $request;
  }

  public function handle(CreateHistory $event) {
    $unpaid = new OrderHistory([
      "status" => OrderHistory::defaultStatus(),
      "user_id" => User::findById()->id
      ]);
    $event->history->histories()->save($unpaid);
    if ($event->history instanceof Topup){
      $successMessage = resolve('topup-success');
      $successMessage->setRequest($this->request, $event->history);
      $successMessage->sendMessage();
    }
    else{
      $successMessage = resolve('product-success');
      $successMessage->setRequest($this->request, $event->history);
      $successMessage->sendMessage();
    }
  }
}
