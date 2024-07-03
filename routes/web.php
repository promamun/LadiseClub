<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('user_ui.home.home'); })->name('home');
Route::get('/about-us', function () { return view('user_ui.about.about_us'); })->name('about.us');
Route::get('/members', function () { return view('user_ui.member.member'); })->name('members');
Route::get('/facilities', function () { return view('user_ui.facilities.facilities'); })->name('facilities');
Route::get('/events', function () { return view('user_ui.event.event'); })->name('event');
Route::get('/notices', function () { return view('user_ui.notice.notice'); })->name('notice');
Route::get('/gallery', function () { return view('user_ui.gallery.photo_gallery'); })->name('photo.gallery');
Route::get('/contact', function () { return view('user_ui.contact.contact'); })->name('contact');


require __DIR__.'/auth.php';
