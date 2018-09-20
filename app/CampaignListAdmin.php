<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ConfigurationPageAdmin;

class CampaignListAdmin extends Model
{
    //Формируем массив данных компаний
    public static function getListAdminPage($campaigns = 0)
    {
        if ($campaigns === 0) {
            $campaigns = Campaign::all();
        }

        $campaignsArr = [];
        if (!ConfigurationPageAdmin::getConfiguration('default_password', true)) {
            $campaignsArr['first_login'] = 1;
        }

        foreach ($campaigns as $campaign) {
            $Arr['title']=$campaign->campaign_title;
            $Arr['id']=$campaign->id;
            if ($campaign->campaign_active) {
                $Arr['active']='On';
            } else {
                $Arr['active']='Off';
            }
            $Arr['collected_amount']= $campaign->payments()->sum('amount');
            $Arr['required_amount']=$campaign->campaign_configurations()
                    ->first()->required_amount;
            $Arr['count_payments']= $campaign->payments()->count();
            $Arr['avg_payment']= $campaign->payments()->avg('amount');
           
            $Arr['time_start']=$campaign->campaign_configurations()
                    ->first()->time_start;
            $Arr['time_start']= date('d.m.Y', strtotime($Arr['time_start']));
            $Arr['time_end']=$campaign->campaign_configurations()
                    ->first()->time_end;
            $Arr['time_end']=date('d.m.Y', strtotime($Arr['time_end']));
            
            $currentTime = time();
            $timeEnd = explode('.', $Arr['time_end']);
            
            $timeEnd = mktime(0, 0, 0, $timeEnd[1], $timeEnd[0], $timeEnd[2]);
            $timeToEnd =  $timeEnd - $currentTime;
            $timeToEnd = round($timeToEnd/86400, 0, PHP_ROUND_HALF_UP);
            
            if ($timeToEnd > 0) {
                $Arr['time_to_end'] = $timeToEnd;
            } else {
                $Arr['time_to_end'] = 'Скончана';
            }
            $campaignsArr['campaigns'][] = $Arr;
        }
        return $campaignsArr;
    }

    public static function getListAdminPageConditions($id)
    {
        if ($id == 1) {
            $campaigns = Campaign::where('campaign_active', 1)->get();
            return self::getListAdminPage($campaigns);
        }
        if ($id == 2) {
            $campaigns = Campaign::where('campaign_active', 0)->get();
            return self::getListAdminPage($campaigns);
        }
        if ($id == 3) {
            $campaigns = Campaign::all();
            $campaignsIsEnded = [];
            foreach ($campaigns as $campaign) {
                $timeEnd = $campaign->campaign_configurations()
                    ->first()->time_end;
                $timeToEnd =  date('Ymd', strtotime($timeEnd)) - date('Ymd');
                if ($timeToEnd < 0) {
                    $campaignsIsEnded[] = $campaign;
                }
            }
            return self::getListAdminPage($campaignsIsEnded);
        }
    }
}
