<?php
namespace App\Services\Interfaces;

interface FailedOrder{
  public function markFailedStatus($code);
}