<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\event\EventController;
use App\Http\Controllers\notice\NoticeController;
use App\Http\Controllers\aboutus\AboutUsController;
use App\Http\Controllers\facilitie\FacilitieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::middleware('auth')->group(function () {
  Route::get('/member-list', [MemberController::class, 'membersList'])->name('member.list');
  Route::get('/member-category-list', [MemberController::class, 'memberCategoryList'])->name('memberCategory.list');
  Route::get('/gallery-list', [GalleryController::class, 'galleryList'])->name('gallery.list');
  Route::get('/event-list', [EventController::class, 'eventList'])->name('event.list');
  Route::get('/notice-list', [NoticeController::class, 'noticeList'])->name('notice.list');
  Route::get('/facilitie-list', [FacilitieController::class, 'facilitieList'])->name('facilitie.list');
  Route::get('/facilitie-detail-list', [FacilitieController::class, 'facilitieDetailsList'])->name('facilitieDetails.list');
  Route::get('/about-us-list', [AboutUsController::class, 'aboutUsList'])->name('aboutUs.list');
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
