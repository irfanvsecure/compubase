<?php

use App\Support\Catalog;
use Illuminate\Support\Facades\Route;

Route::get('/home', fn () => redirect()->route('home'));

// English pages
Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/courses', 'pages.courses')->name('courses');
Route::view('/schedule', 'pages.schedule')->name('schedule');
Route::view('/corporate', 'pages.corporate')->name('corporate');

// Arabic pages, under /ar/
Route::prefix('ar')->group(function () {
    Route::view('/', 'pages.home-ar')->name('home-ar');
    Route::view('/about', 'pages.about-ar')->name('about-ar');
    Route::view('/contact', 'pages.contact-ar')->name('contact-ar');
    Route::view('/courses', 'pages.courses-ar')->name('courses-ar');
    Route::view('/schedule', 'pages.schedule-ar')->name('schedule-ar');
    Route::view('/corporate', 'pages.corporate-ar')->name('corporate-ar');
});

// Old Arabic addresses (/home-ar, /about-ar, ...) move permanently to /ar/.
foreach (['home', 'about', 'contact', 'courses', 'schedule', 'corporate'] as $page) {
    Route::get("/{$page}-ar", fn () => redirect()->route("{$page}-ar", request()->query(), 301));
}

// Courses that were retired from the catalogue send visitors to the course list.
foreach (['pmp', 'cia', 'cma', 'cisa', 'ceh', 'cyber', 'ai', 'prompt', 'english', 'ielts', 'arabic', 'office'] as $old) {
    Route::get("/{$old}", fn () => redirect()->route('courses', [], 301));
    Route::get("/{$old}-ar", fn () => redirect()->route('courses-ar', [], 301));
    Route::get("/ar/{$old}", fn () => redirect()->route('courses-ar', [], 301));
}

// Course pages: /course/{course} and /ar/course/{course}.
$coursePage = function (string $view, string $course) {
    $found = Catalog::find($course);
    abort_if($found === null, 404);

    return view($view, ['course' => $found]);
};

Route::get('/ar/course/{course}', fn (string $course) => $coursePage('pages.course-ar', $course))->name('course-ar');
Route::get('/course/{course}', fn (string $course) => $coursePage('pages.course', $course))->name('course');

// The earlier /{category}/{course} addresses move permanently to /course/{course}.
$categories = array_keys(config('courses.categories'));
Route::get('/ar/{category}/{course}', fn (string $category, string $course) => redirect("/ar/course/{$course}", 301))
    ->whereIn('category', $categories);
Route::get('/{category}/{course}', fn (string $category, string $course) => redirect("/course/{$course}", 301))
    ->whereIn('category', $categories);
