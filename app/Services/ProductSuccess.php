<?php
namespace App\Services;

use App\Services\Interfaces\ContentSuccess;
use App\Services\Taxs;

class ProductSuccess implements ContentSuccess{

  protected $request;
  protected $content;
  protected $typeOrder = "App\Services\ProductPayment";
  public function setRequest($request, $content) {
    $this->request = $request;
    $this->content = $content;
  }

  public function successOrderNo(){
    $this->flashMessage('orderNo', $this->content->code);
  }

  public function successTotal(){
    $taxs = Taxs::product($this->content->price);
    $this->flashMessage('total', "Rp. {$taxs}");
  }

  public function successMessage(){
    $message ="{$this->content->product_name} that costs 
      {$this->content->price} will be shipped to :
      {$this->content->shipping_address}";
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