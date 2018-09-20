<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    //
    public function getListPage(){
        
        return view('admin.list');
    
    
    }
    public function getCampaignPage(){
        
        return view('admin.campaign');
    
    
    }
    public function getConfigurationPage(){
        
        return view('admin.configuration');
    
    
    }
    public function getCreatePage(){
        
        return view('admin.create');
    
    
    }
}
