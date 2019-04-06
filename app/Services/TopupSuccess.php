<?php
namespace App\Services;

use App\Services\Interfaces\ContentSuccess;
use App\Services\Taxs;

class TopupSuccess implements ContentSuccess {

  protected $request;
  protected $content;
  protected $typeOrder = "App\Models\Topup";

  public function setRequest($request, $content) {
    $this->request = $request;
    $this->content = $content;
  }

  public function successOrderNo(){
    $this->flashMessage('orderNo', $this->content->code);
  }

  public function successTotal(){
    $taxs = Taxs::topup($this->content->value);
    $this->flashMessage('total',"Rp. {$taxs}");
  }

  public function successMessage(){
    $message = "Your mobile phone number {$this->content->phone_number} 
    receive Rp {$this->content->value}";
    $this->flashMessage('message', $message);
  }

  public function typeOrder (){
    $this->flashMessage('type', $this->typeOrder);
  }

  public function flashMessage($key, $value){
    $this->request->session()->put($key, $value);
  }
  
  public function sendMessage(){
    $this->successOrderNo();
    $this->successTotal();
    $this->successMessage(); 
    $this->typeOrder();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
  }
}