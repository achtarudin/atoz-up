<?php

namespace App\Http\Controllers\MakePdf;

use Faker\Generator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GeneratePdfController extends Controller
{
  public function index() {
    $data = $this->generateRandomString();
    return view('make_pdf.generate_pdf', compact('data'));
  }

  protected function generateRandomString(){
    $faker = \Faker\Factory::create();
    $str = [];

    for ($i=0; $i < 30; $i++) {
      array_push($str, [
        'Name' =>$faker->name,
        'Email' => $faker->unique()->email,
          'Password' => $faker->phoneNumber, // password
        ]);
    }
    return collect($str);
  }
}
