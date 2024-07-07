<?php

use App\Models\AboutUs;
use App\Models\Event;
use App\Models\Member;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\ContactUs;
use App\Models\Facilitie;
use App\Models\MemberCategory;
use App\Models\FacilitieDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aboutus\AboutUsController;

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

Route::get('/', function () {
  $sliders = Slider::all();
  $aboutUs = AboutUs::first();
  $facility = Facilitie::with('facilitiesDetails')->get();
  $notices = Notice::all();
  $galleries = Gallery::where('key','Photo')->paginate();
  return view('user_ui.home.home',compact('aboutUs','facility','notices','galleries','sliders'));
})->name('home');
Route::get('/about-us', [AboutUsController::class, "aboutUs"])->name('about.us');
Route::get('/members/{name}', function ($name) {
  $id = request()->query('id');
  $categoryMember = MemberCategory::with('members')->findOrFail($id);
  return view('user_ui.member.member', compact('categoryMember'));
})->name('members');
Route::get('/facilities/{name}', function () {
  $id = request()->query('id');
  $facility = Facilitie::with('facilitiesDetails')->find($id);
  return view('user_ui.facilities.facilities', compact('facility'));
})->name('user.facilities');
Route::get(
  '/events',
  function () {
    $events = Event::all();
    return view('user_ui.event.event', compact('events'));
  }
)->name('event');
Route::get('/notices', function () {
  $notices = Notice::all();
  return view('user_ui.notice.notice', compact("notices"));
})->name('notice');
Route::get('/notice-details/{name}', function () {
  $id = request()->query('id');
  $notice_details = Notice::findOrFail($id);
  return view('user_ui.notice.notice_details', compact("notice_details"));
})->name('notice-details');
Route::get('/photo-gallery', function () {
  $galleries = Gallery::where('key','Photo')->paginate();
  return view('user_ui.gallery.photo_gallery', compact("galleries"));
})->name('photo.gallery');
Route::get('/video-gallery', function () {
  $galleries = Gallery::where('key','Video')->paginate();
  return view('user_ui.gallery.video_gallery',compact("galleries"));
})->name('video.gallery');
Route::get('/contact', function () {
  $contactUs= ContactUs::first();
  return view('user_ui.contact.contact', compact("contactUs"));
})->name('contact');


require __DIR__ . '/auth.php';
