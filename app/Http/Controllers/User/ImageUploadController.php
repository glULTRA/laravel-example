<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index(){
        
    }

    public function store(Request $request)
    {
        $data= new PostImage();
        dd('back here babe');
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
    }
}
