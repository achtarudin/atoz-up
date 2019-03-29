<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRegister extends FormRequest{

  public function authorize(){
    return true;
  }

  
  public function rules(){
    return [
      "first_name" => "required",
      "email" => "required|unique:users,email",
      "password" => "required|min:6"
    ];
  }
}
