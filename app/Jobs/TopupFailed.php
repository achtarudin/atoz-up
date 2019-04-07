<?php

namespace App\Jobs;

use App\Models\Topup;
use App\Models\OrderHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TopupFailed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;
    public $failedStatus = 'failed';
    public $defaultStatus = 'unpaid';
    public $successStatus = 'success';
    public function __construct($order){
      $this->order = $order;
    }

    public function handle(){
      $result = OrderHistory::where('historiesable_type', $this->order['type'])
      ->where('code', $this->order['code'])->first();
      dd($result);
      // $status = Topup::status($this->orderNo);
      // if($status == $this->defaultStatus || $status != 'success'){
      //   Topup::paid($this->orderNo, $this->failedStatus);
      // } 
    }
}
