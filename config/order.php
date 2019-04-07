<?php
return [
  'time' => 1, // Job Order Failed in Minutes,
  'models' => [
    'topup' => 'App\Models\Topup',
    'product' => 'App\Models\Product'
  ], 
  'status' => [
    'success' => 'success',
    'failed' => 'failed',
    'unpaid' => 'unpaid'
  ],
];