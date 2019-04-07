<?php
namespace App\Services\OrderFailed;

use App\Services\Interfaces\FailedOrder;

class Failed
{
    protected $order;
    protected $failedType = [
      'App\Models\Topup' => FailedTopup::class,
      'App\Models\Product' => FailedProduct::class
    ];
    public function __construct($order)
    {
        $this->order = $order;
    }

    protected function failedOrder(FailedOrder $failedOrder, $code)
    {
        $failedOrder->markFailedStatus($code);
    }

    public function typeOrder()
    {
        $type = $this->order['type'];
        $code = $this->order['code'];
        $this->failedOrder(new $this->failedType[$type], $code);
    }
}
