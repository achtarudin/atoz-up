<?php

namespace App\Jobs;

use App\Models\Topup;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TopupFailed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $orderNo;
    public $failedStatus = 'failed';
    public $defaultStatus = 'unpaid';
    public $successStatus = 'success';
    public function __construct($orderNo){
      $this->orderNo = $orderNo;
    }

    public function handle(){
      $status = Topup::status($this->orderNo);
      if($status == $this->defaultStatus || $status != 'success'){
        Topup::paid($this->orderNo, $this->failedStatus);
      } 
    }
}
