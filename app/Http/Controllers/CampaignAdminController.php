<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCampaign;
use App\CampaignPageAdmin;
use App\CampaignListAdmin;

class CampaignAdminController extends Controller
{
    //
    public function create(CreateCampaign $request)
    {
        CampaignPageAdmin::createCampaign($request);
        return redirect('/doika/show-list');
    }

    public function show($id)
    {
        $data = CampaignPageAdmin::getCampaignPage($id);
        return view('admin.campaign', $data);
    }

    public function update($id, CreateCampaign $request)
    {
        CampaignPageAdmin::updateCampaignPage($id, $request);
        return back();
    }

    public function delete($id)
    {
        CampaignPageAdmin::deleteCampaign($id);
        return redirect('/doika/show-list');
    }

    public function showList()
    {
        $data = CampaignListAdmin::getListAdminPage();
        return view('admin.list', $data);
    }

    public function showListConditions($id)
    {
        $data = CampaignListAdmin::getListAdminPageConditions($id);
        $data['conditions_id'] = $id;
        return view('admin.list', $data);
       //dump ($data);
    }

    public function getOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
