<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use Config;

use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
  public function getResizeImage()
    {
       
        return view('imageCompress.resize');
    }
    public function postResizeImage(Request $request)
    {
        //dd(config('globalvar.var1')+6);               //--------->for printing global var
       // dd(Helper::convertToUppercase('now i\'m using my helper class in a controller!!'));
        $detail = $request->all();
        $image=$detail['image'];
        $extension=$image->getClientOriginalExtension();
        $imagename = time().'.'.$image->getClientOriginalExtension(); 
        $destinationPath = public_path('347-260');
        $thumb_img = Image::make($image->getRealPath())->resize(347, 260)->encode($extension);
        
         $hash = md5($thumb_img->__toString());
         $path = "file/347-260/{$hash}.jpg";
      
         
         $thumb_img->save(public_path($path));
         Storage::disk('public_images')->put($imagename, file_get_contents($image->getRealPath()));
        
        return \Redirect::back();
    }
   
}
