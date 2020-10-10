<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function image(Request $request)
    {  
        $request->validate([
            "file" => "required|image|mimes:jpeg,jpg,png"
        ]);

        $filename = md5(time().rand(0,999).time()).".".$request->file->extension();
        $request->file->move(public_path("media/images"), $filename);

        return [
            "location" => asset("media/images/{$filename}")
        ];
    }
}