<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();

        return $notifications;
    }

    /**
     * Display the specified resource.
     *
     * @param \Diglabby\Doika\Models\Notification $notification
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Diglabby\Doika\Models\Notification $notification
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request            $request
     * @param \Diglabby\Doika\Models\Notification $notification
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->all());

        return response()->json([
            'message' => '!!!!!!!!!!!!!!!!!!!!!!!YOHOOOOO!!',
        ]);
        //return $notification;
    }
}
