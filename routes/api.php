<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
