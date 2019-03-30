<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topup extends Model{

  use SoftDeletes;
  protected $table = "topup";
  protected $fillable = [
    "user_id",
    "phone_number",
    "topup_value",
    "topup_code",
  ];
}
