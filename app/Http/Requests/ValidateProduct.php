<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
{
  public function authorize(){
      return true;
  }

  public function rules(){
    return [
      "product" => "required|between:10,150",
      "shipping" => "required|between:10,150",
      "price" => "required|digits:1",
    ];
  }
}
