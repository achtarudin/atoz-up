<?php

namespace App\Http\Controllers\MultiUpload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function upload(){
      return view('multiupload.upload');
    }

    public function uploadImage(Request $request){
      dd($request->pictures);
    }
}
