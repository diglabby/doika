<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

Breadcrumbs::register('home', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->push(trans('labels.frontend.titles.home'), route('home'));
});

Breadcrumbs::register('user.home', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('labels.user.titles.space'), route('user.home'));
});

Breadcrumbs::register('user.account', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->parent('user.home');
    $breadcrumbs->push(trans('labels.user.titles.account'), route('user.account'));
});
