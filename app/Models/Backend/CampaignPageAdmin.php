<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Campaign;
use App\Campaign_configuration;
use App\Campaign_lang_information;
use App\Doika_configuration;
use App\Uploader;

//Модель работающая со страницами компании (создание новой и просмотр/редактирование выбранной)
class CampaignPageAdmin extends Model
{
    static public function getLangDefault(){
        $campaign_lang = Doika_configuration::where('configuration_name','lang')
                ->first()->configuration_value;
        return $campaign_lang;
    }
    static public function createCampaign($request){
        
        // создание новой компании
        $newCampaign = new Campaign;
        $newCampaign->campaign_title = $request->title;
        if($request->campaign_active == "on"){
            $newCampaign->campaign_active = 1;
        }else{
            $newCampaign->campaign_active = 0;
        }
        
        $newCampaign->save();
        
        // создание конфигурации новой компании
        $newCampaignConfiguration = new Campaign_configuration; 
        $newCampaignConfiguration->campaign_id = $newCampaign->id;
        
        if($request->campaign_progress_bar == "on"){
            $newCampaignConfiguration->campaign_progress_bar = 1;
        }else{
            $newCampaignConfiguration->campaign_progress_bar = 0;
        }
        
        if($request->hasFile('photo')){
            $newCampaignConfiguration->photo = Uploader::upload($request);
        }else{
            $newCampaignConfiguration->photo = 'default.jpg';
        }
        $newCampaignConfiguration->required_amount = $request->required_amount;       
        $newCampaignConfiguration->time_start = $request->time_start;
        $newCampaignConfiguration->time_end = $request->time_end;
        $newCampaignConfiguration->save();
        
        // создание страницы информации на языке по умолчанию
        $newLangInformation = new Campaign_lang_information;
        $newLangInformation->campaign_id = $newCampaign->id;
        $newLangInformation->campaign_lang = self::getLangDefault();
        
        $newLangInformation->campaign_title_lang = $request->title;
        $newLangInformation->campaign_description_lang = $request->description;
        
        $newLangInformation->campaign_currency_lang = 
                Doika_configuration::where('configuration_name','currency_lang')
                ->first()->configuration_value;
        $newLangInformation->required_amount_lang = 
                Doika_configuration::where('configuration_name','required_amount_lang')
                ->first()->configuration_value;
        $newLangInformation->other_amount_lang = 
                Doika_configuration::where('configuration_name','other_amount_lang')
                ->first()->configuration_value;
        $newLangInformation->donate_lang = 
                Doika_configuration::where('configuration_name','donate_lang')
                ->first()->configuration_value;
        $newLangInformation->payment_title_lang = 
                Doika_configuration::where('configuration_name','payment_title_lang')
                ->first()->configuration_value;
        $newLangInformation->payment_description_lang = 
                Doika_configuration::where('configuration_name','payment_description_lang')
                ->first()->configuration_value;
        $newLangInformation->save();
    }
    
    static public function getCampaignPage($id){
        
        $campaign = Campaign::find($id);
        $campaignArr=[];
        $campaignArr['id'] = $campaign->id;
        $campaignArr['name']=$campaign->campaign_title;
        if($campaign->campaign_active == 1){
           $campaignArr['check']='checked'; 
        }
        
         $campaignArr['time_start']=$campaign->campaign_configurations()->first()
                ->time_start;
        $dateStart = strtotime($campaignArr['time_start']);       
                
        $campaignArr['time_start']= date('Y-m-d', strtotime($campaignArr['time_start']));
        $campaignArr['time_end']= $campaign->campaign_configurations()->first()
                ->time_end;
        $dateEnd = strtotime($campaignArr['time_end']);
        
        $campaignArr['time_end']= date('Y-m-d', strtotime($campaignArr['time_end']));
        $campaignArr['campaign_progress_bar']=$campaign->campaign_configurations()->first()
                ->campaign_progress_bar;
        $campaignArr['required_amount']=$campaign->campaign_configurations()->first()
                ->required_amount;
        $campaignArr['photo']=$campaign->campaign_configurations()->first()
                ->photo;
        $campaignArr['description']=$campaign->campaign_lang_informations()
                ->where('campaign_lang',self::getLangDefault())
                ->first()->campaign_description_lang;
       
        
        $dateNow = time();       
        
        $progress_start = round(($dateNow - $dateStart) / 86400);
        $progress_end = round(($dateEnd - $dateStart) / 86400);
        $campaignArr['daysPassed'] = ($progress_start >= 0) ? $progress_start: 0;
        $campaignArr['daysToFinish'] = ($progress_end >= 0) ? $progress_end: 0;

        
        return $campaignArr;
        
    }
    static public function updateCampaignPage($id,$request){
        
        // обновление данных компании
        $Campaign = Campaign::find($id);
        $Campaign->campaign_title = $request->title;
        if($request->campaign_active == "on"){
            $Campaign->campaign_active = 1;
        }else{
            $Campaign->campaign_active = 0;
        }
        $Campaign->save();
        
        // обновление конфигурации компании
        $CampaignConfiguration = $Campaign->campaign_configurations()->first(); 
        if($request->hasFile('photo')){
            $CampaignConfiguration->photo = Uploader::upload($request);
        }
        $CampaignConfiguration->required_amount = $request->required_amount;
        $CampaignConfiguration->campaign_progress_bar = $request->campaign_progress_bar;
        $CampaignConfiguration->time_start = $request->time_start;
        $CampaignConfiguration->time_end = $request->time_end;
        $CampaignConfiguration->save();
        
        // обновление информации компании на языке по умолчанию
        $LangInformation = $Campaign->campaign_lang_informations()->where('campaign_lang',self::getLangDefault())->first();
        $LangInformation->campaign_title_lang = $request->title;
        $LangInformation->campaign_description_lang = $request->description;
        $LangInformation->save();
        
        
    }
    static public function deleteCampaign($id){
        $campaign = Campaign::find($id);
        $campaign->campaign_configurations()->delete();
        $campaign->campaign_lang_informations()->delete();
        $campaign->delete();
        
        
    }
    
    
}
