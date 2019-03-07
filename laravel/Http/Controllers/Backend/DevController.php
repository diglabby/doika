<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    
    public function getListPage(){
        
        return view('backend.list');    
	
    }
	
    public function getCampaignPage(){
        
        return view('backend.campaign');    
    
    }
	
    public function getConfigurationPage(){
        
        return view('backend.configuration');    
    
    }
	
    public function getCreatePage(){
        
        return view('backend.create');    
    
    }
}
