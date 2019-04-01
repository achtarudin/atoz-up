<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePrepaid extends FormRequest
{
  
  public function authorize(){
    return true;
  }

    
  public function rules(){
      return [
        'phone_number' => 'required|regex:/^081/|digits_between:7,12',
        'topup_value' => 'required'
      ];
  }
}
