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
      "product" => "required|between:5,150",
      "shipping" => "required|between:5,150",
      "price" => "required|numeric|digits_between:2,10",
    ];
  }
}
