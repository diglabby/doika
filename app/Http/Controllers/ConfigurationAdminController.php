<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ConfigurationPageAdmin;
use App\PasswordChange;

class ConfigurationAdminController extends Controller
{
    //
    public function showConfigurations(){
        $data = ConfigurationPageAdmin::getConfigurations();
        //dump($data);
        
        return view('admin.configuration',$data);
        
        
    }
    public function saveConfigurations(Request $request){
        //dump($request->test_payments);
        ConfigurationPageAdmin::createOrUpdateConfigurations($request);
        return redirect('/doika/show-configurations');
    }
    public function changePassword(Request $request){
        
        PasswordChange::changeProfile($request);
        return redirect('/doika/show-configurations');
        
    }
}
