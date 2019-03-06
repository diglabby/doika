<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploader extends Model
{
    //
    static public function upload($request){
        if($request->isMethod('post')){

            if($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path() . '/images',$fileName);
                return $fileName;
            }
        }
        
    }
}
