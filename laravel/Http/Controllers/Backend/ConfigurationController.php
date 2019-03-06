<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Model\ConfigurationPageAdmin;

class ConfigurationController extends Controller{
   
    public function show(){        
        return view('admin.configuration', ConfigurationPageAdmin::getConfigurations());  
    }
	
	
    public function store(Request $request){        
        ConfigurationPageAdmin::createOrUpdateConfigurations($request);
        return redirect('/doika/show-configurations');
    }
}
