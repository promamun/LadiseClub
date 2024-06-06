<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apps\UserList;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RollsController;
use App\Http\Controllers\apps\AccessRoles;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\layouts\NavbarFull;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\event\EventController;
use App\Http\Controllers\cards\CardGamifications;
use App\Http\Controllers\notice\NoticeController;
use App\Http\Controllers\layouts\NavbarFullSidebar;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\facilitie\FacilitieController;
use App\Http\Controllers\authentications\ResetPasswordBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;

Route::get('/login', [LoginBasic::class, 'index'])->name('admin.login');
Route::post('/auth-login', [LoginBasic::class, 'AdminLoginRequest'])->name('admin.login.request');
Route::get('/auth-reset-password', [ResetPasswordBasic::class, 'index'])->name('admin.reset.password');
Route::get('/auth-forgot-password', [ForgotPasswordBasic::class, 'index'])->name('admin.forgot.password');
Route::post('/auth-reset-password', [ResetPasswordBasic::class, 'resetPassword'])->name('admin.reset.password.request');
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
  Route::get('/all-routes', [RollsController::class, 'AllRoutes'])->name('AllRoutes');
  Route::get('/user-list', [UserList::class, 'allUserList'])->name('user-list');
  Route::get('/user-role-list', [RollsController::class, 'userRoleList'])->name('user-role-list');
  ///test route
  Route::get('/user-permission', [RollsController::class, 'userPermissionList'])->name('user-permission');
  // user Routes
  Route::middleware('canAccessUser')->group(function () {
    Route::group(['prefix' => 'user'], function () {
      // API Routes
      Route::post('/store', [AdminController::class, 'user_store'])->name('user-store');
      Route::post('/update', [AdminController::class, 'user_update'])->name('user-update');
      Route::delete('/delete/{id}', [AdminController::class, 'user_delete'])->name('user-delete');
      //View Routes
      Route::get('/list', [UserList::class, 'index'])->name('user-list');
      Route::get('/add', [AdminController::class, 'user_add'])->name('user-add');
      Route::get('/edit/{id}', [AdminController::class, 'user_edit'])->name('user-edit');
      Route::get('/view/{id}', [AdminController::class, 'user_view'])->name('user-view');
    });
  });
  // role permission Routes
  Route::group(['prefix' => 'roles'], function () {
    // API Routes
    Route::post('/store', [RollsController::class, 'roles_store'])->name('roles-store');
    Route::post('/update', [RollsController::class, 'roles_update'])->name('roles-update');
    Route::get('/delete/{id}', [RollsController::class, 'roles_delete'])->name('roles-delete');
    //View Routes
    Route::get('/', [AccessRoles::class, 'index'])->name('user-access-roles');
    Route::get('/data', [RollsController::class, 'rolesList'])->name('roles-list');
    Route::get('/permissions/{id}', [RollsController::class, 'rolesPermissionsList'])->name('roles-permissions-list');
    Route::get('/add', [RollsController::class, 'roles_add'])->name('roles-add');
    Route::get('/edit/{id}', [RollsController::class, 'roles_edit'])->name('roles-edit');
    Route::get('/view/{id}', [RollsController::class, 'roles_view'])->name('roles-view');
  });
  // member Routes
  Route::group(['prefix' => 'member'], function () {
    // API Routes
    Route::post('/store', [MemberController::class, 'storeMember'])->name('member.store');
    Route::post('/update/{id}', [MemberController::class, 'updateMember'])->name('member.update');
    Route::get('/delete/{id}', [MemberController::class, 'deleteMember'])->name('member.delete');
    //View Routes
    Route::get('/', [MemberController::class, 'index'])->name('member-list');
    Route::get('/add', [MemberController::class, 'addMember'])->name('member-add');
    Route::get('/edit/{id}', [MemberController::class, 'editMember'])->name('member.edit');
  });
  // memberCategory Routes
  Route::group(['prefix' => 'member-category'], function () {
    // API Routes
    Route::post('/store', [MemberController::class, 'storeMemberCategory'])->name('memberCategory.store');
    Route::post('/update/{id}', [MemberController::class, 'updateMemberCategory'])->name('memberCategory.update');
    Route::get('/delete/{id}', [MemberController::class, 'deleteMemberCategory'])->name('memberCategory.delete');
    //View Routes
    Route::get('/', [MemberController::class, 'MemberCategory'])->name('memberCategory-list');
    Route::get('/add', [MemberController::class, 'addMemberCategory'])->name('memberCategory-add');
    Route::get('/edit/{id}', [MemberController::class, 'editMemberCategory'])->name('memberCategory.edit');
  });
  // gallery Routes
  Route::group(['prefix' => 'gallery'], function () {
    // API Routes
    Route::post('/store', [GalleryController::class, 'storeGallery'])->name('gallery.store');
    Route::post('/update/{id}', [GalleryController::class, 'updateGallery'])->name('gallery.update');
    Route::get('/delete/{id}', [GalleryController::class, 'deleteGallery'])->name('gallery.delete');
    //View Routes
    Route::get('/', [GalleryController::class, 'index'])->name('gallery-list');
    Route::get('/add', [GalleryController::class, 'addGallery'])->name('gallery-add');
    Route::get('/edit/{id}', [GalleryController::class, 'editGallery'])->name('gallery.edit');
  });
  // event Routes
  Route::group(['prefix' => 'event'], function () {
    // API Routes
    Route::post('/store', [EventController::class, 'storeEvent'])->name('event.store');
    Route::post('/update/{id}', [EventController::class, 'updateEvent'])->name('event.update');
    Route::get('/delete/{id}', [EventController::class, 'deleteEvent'])->name('event.delete');
    //View Routes
    Route::get('/', [EventController::class, 'index'])->name('event-list');
    Route::get('/add', [EventController::class, 'addEvent'])->name('event-add');
    Route::get('/edit/{id}', [EventController::class, 'editEvent'])->name('event.edit');
  });
  // notice Routes
  Route::group(['prefix' => 'notice'], function () {
    // API Routes
    Route::post('/store', [NoticeController::class, 'storeNotice'])->name('notice.store');
    Route::post('/update/{id}', [NoticeController::class, 'updateNotice'])->name('notice.update');
    Route::get('/delete/{id}', [NoticeController::class, 'deleteNotice'])->name('notice.delete');
    //View Routes
    Route::get('/', [NoticeController::class, 'index'])->name('notice-list');
    Route::get('/add', [NoticeController::class, 'addNotice'])->name('notice-add');
    Route::get('/edit/{id}', [NoticeController::class, 'editNotice'])->name('notice.edit');
  });
  // facilitie Routes
  Route::group(['prefix' => 'facilitie'], function () {
    // API Routes
    Route::post('/store', [FacilitieController::class, 'storeFacilitie'])->name('facilitie.store');
    Route::post('/update/{id}', [FacilitieController::class, 'updateFacilitie'])->name('facilitie.update');
    Route::get('/delete/{id}', [FacilitieController::class, 'deleteFacilitie'])->name('facilitie.delete');
    //View Routes
    Route::get('/', [FacilitieController::class, 'index'])->name('facilitie-list');
    Route::get('/add', [FacilitieController::class, 'addFacilitie'])->name('facilitie-add');
    Route::get('/edit/{id}', [FacilitieController::class, 'editFacilitie'])->name('facilitie.edit');
  });

  // FacilitieDetail Routes
  Route::group(['prefix' => 'facilitie-detail'], function () {
    // API Routes
    Route::post('/store', [FacilitieController::class, 'storeFacilitieDetail'])->name('facilitieDetail.store');
    Route::post('/update/{id}', [FacilitieController::class, 'updateFacilitieDetail'])->name('facilitieDetail.update');
    Route::get('/delete/{id}', [FacilitieController::class, 'deleteFacilitieDetail'])->name('facilitieDetail.delete');
    //View Routes
    Route::get('/', [FacilitieController::class, 'indexfacilitieDetails'])->name('facilitie-details-list');
    Route::get('/add', [FacilitieController::class, 'addFacilitieDetail'])->name('facilitie-details-add');
    Route::get('/edit/{id}', [FacilitieController::class, 'editFacilitieDetail'])->name('facilitieDetail.edit');
    Route::get('/view/{id}', [FacilitieController::class, 'viewFacilitieDetail'])->name('facilitieDetail.view');
  });
});
