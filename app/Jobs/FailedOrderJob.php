<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\OrderFailed\Failed;

class FailedOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    public function __construct($order)
    {
      $this->order  = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $failedOrder = new Failed($this->order);
      $failedOrder->typeOrder();
    }
}
