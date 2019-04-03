<?php
namespace App\Services;

use App\Services\Interfaces\ContentSuccess;

class TopupSuccess implements ContentSuccess {

  public $request;
  public $content;

  public function setRequest($request, $content) {
    $this->request = $request;
    $this->content = $content;
  }

  public function successOrderNo(){
    $this->flashMessage('orderNo', $this->content->topup_code);
  }

  public function successTotal(){
    $this->flashMessage('total', $this->content->topup_value);
  }

  public function successMessage(){
    $message = "Your mobile phone number {$this->content->phone_number} 
    receive Rp {$this->content->topup_value}";
    $this->flashMessage('message', $message);
  }

  public function flashMessage($key, $value){
    $this->request->session()->put($key, $value);
  }

  public function sendMessage(){
    $this->successOrderNo();
    $this->successTotal();
    $this->successMessage();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
  }

}