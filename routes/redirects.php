<?php

// temp redirects for testers and new devs to make them understand that everything works

Route::redirect('/', '/doika/campaigns/1');

Route::redirect('/doika/admin', '/doika/dashboard');
Route::redirect('/doika/{locale}/admin', '/doika/dashboard');

Route::redirect('/doika/admin/{something}', '/doika/dashboard');
Route::redirect('/doika/{locale}/admin/{something}', '/doika/dashboard');

Route::redirect('/doika/admin/{something}/{id}', '/doika/dashboard');
Route::redirect('/doika/{locale}/admin/{something}/{id}', '/doika/dashboard');
