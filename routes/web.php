<?php

use App\Support\SitePages;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return redirect()->to(url('/'));
});

Route::get('/', function () {
    return SitePages::response('home');
});

Route::get('/{page}', function (string $page) {
    return SitePages::response($page);
})->whereIn('page', SitePages::slugs());
