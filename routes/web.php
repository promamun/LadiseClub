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
  $sliders = Slider::orderBy('created_at', 'desc')->get();
  $aboutUs = AboutUs::first();
  $facility = Facilitie::with('facilitiesDetails')->get();
  $notices = Notice::all();
  $galleries = Gallery::where('key','Photo')->paginate();
  return view('user_ui.home.home',compact('aboutUs','facility','notices','galleries','sliders'));
})->name('home');
Route::get('/about-us', [AboutUsController::class, "aboutUs"])->name('about.us');

Route::get('/members/{slug}', function ($slug) {
  $categoryMember = MemberCategory::where('slug', $slug)->firstOrFail();

  $members = $categoryMember->members()
    ->select('members.*') // Ensures that only columns from the members table are selected
    ->orderByRaw('SUBSTRING(members.member_id, 1, 2) ASC, CAST(SUBSTRING(members.member_id, 4) AS UNSIGNED) ASC')
    ->paginate(); // Adjust the number as needed

  return view('user_ui.member.member', compact('categoryMember', 'members'));
})->name('members');


Route::get('/facilities/{slug}', function ($slug) {
  $facility = Facilitie::where('slug',$slug)->with('facilitiesDetails')->firstOrFail();
  return view('user_ui.facilities.facilities', compact('facility'));
})->name('user.facilities');
Route::get(
  '/events',
  function () {
    $events = Event::paginate();
    return view('user_ui.event.event', compact('events'));
  }
)->name('event');
Route::get('/notices', function () {
  $notices = Notice::paginate();
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
