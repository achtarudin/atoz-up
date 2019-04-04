<?php
namespace App\Services\Interfaces;

interface ContentSuccess{
  
  public function setRequest($request, $unpaid);
  public function successOrderNo();
  public function successTotal();
  public function successMessage();
  public function sendMessage();
  public function typeOrder ();
  public function flashMessage($key, $value);
}