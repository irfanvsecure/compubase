<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', fn () => redirect()->route('home'));

// English pages
Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/courses', 'pages.courses')->name('courses');
Route::view('/schedule', 'pages.schedule')->name('schedule');
Route::view('/corporate', 'pages.corporate')->name('corporate');
Route::view('/pmp', 'pages.pmp')->name('pmp');
Route::view('/cia', 'pages.cia')->name('cia');
Route::view('/cma', 'pages.cma')->name('cma');
Route::view('/cisa', 'pages.cisa')->name('cisa');
Route::view('/ceh', 'pages.ceh')->name('ceh');
Route::view('/cyber', 'pages.cyber')->name('cyber');
Route::view('/ai', 'pages.ai')->name('ai');
Route::view('/prompt', 'pages.prompt')->name('prompt');
Route::view('/english', 'pages.english')->name('english');
Route::view('/ielts', 'pages.ielts')->name('ielts');
Route::view('/arabic', 'pages.arabic')->name('arabic');
Route::view('/office', 'pages.office')->name('office');

// Arabic pages
Route::view('/home-ar', 'pages.home-ar')->name('home-ar');
Route::view('/about-ar', 'pages.about-ar')->name('about-ar');
Route::view('/contact-ar', 'pages.contact-ar')->name('contact-ar');
Route::view('/courses-ar', 'pages.courses-ar')->name('courses-ar');
Route::view('/schedule-ar', 'pages.schedule-ar')->name('schedule-ar');
Route::view('/corporate-ar', 'pages.corporate-ar')->name('corporate-ar');
Route::view('/pmp-ar', 'pages.pmp-ar')->name('pmp-ar');
Route::view('/cia-ar', 'pages.cia-ar')->name('cia-ar');
Route::view('/cma-ar', 'pages.cma-ar')->name('cma-ar');
Route::view('/cisa-ar', 'pages.cisa-ar')->name('cisa-ar');
Route::view('/ceh-ar', 'pages.ceh-ar')->name('ceh-ar');
Route::view('/cyber-ar', 'pages.cyber-ar')->name('cyber-ar');
Route::view('/ai-ar', 'pages.ai-ar')->name('ai-ar');
Route::view('/prompt-ar', 'pages.prompt-ar')->name('prompt-ar');
Route::view('/english-ar', 'pages.english-ar')->name('english-ar');
Route::view('/ielts-ar', 'pages.ielts-ar')->name('ielts-ar');
Route::view('/arabic-ar', 'pages.arabic-ar')->name('arabic-ar');
Route::view('/office-ar', 'pages.office-ar')->name('office-ar');
