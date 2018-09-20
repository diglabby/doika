<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ConfigurationPageAdmin;

class PasswordChange extends Model
{
    //
    static public function changeProfile($request){
        
        $user = $request->user();
        if($request->login){
            $user->email = $request->login;
        }
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        ConfigurationPageAdmin::createOrUpdateConfiguration('default_password', '0');
        
        
    }
    
    
    
}
