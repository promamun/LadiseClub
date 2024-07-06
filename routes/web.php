<?php

use App\Http\Controllers\aboutus\AboutUsController;
use App\Models\Facilitie;
use App\Models\FacilitieDetail;
use App\Models\Member;
use App\Models\MemberCategory;
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
Route::get('/about-us',[ AboutUsController::class, "aboutUs" ])->name('about.us');
Route::get('/members/{name}', function ($name) {
  $id = request()->query('id');
  $categoryMember = MemberCategory::with('members')->findOrFail($id);
  return view('user_ui.member.member',compact('categoryMember'));
})->name('members');
Route::get('/facilities/{name}', function () {
  $id = request()->query('id');
  $facility = Facilitie::find($id);
  $data = FacilitieDetail::where('id',$id)->get();
  return view('user_ui.facilities.facilities',compact('data','facility'));
})->name('user.facilities');
Route::get('/events', function () { return view('user_ui.event.event'); })->name('event');
Route::get('/notices', function () { return view('user_ui.notice.notice'); })->name('notice');
Route::get('/gallery', function () { return view('user_ui.gallery.photo_gallery'); })->name('photo.gallery');
Route::get('/contact', function () { return view('user_ui.contact.contact'); })->name('contact');


require __DIR__.'/auth.php';
