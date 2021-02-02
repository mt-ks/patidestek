<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionSelectController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('main');

//Route::get('/posts', function () {return view('posts');});

Route::get('profile',[ProfileController::class,'index'])->name('user.profile');
Route::get('edit-profile',[ProfileController::class,'edit'])->name('user.profile.edit');
Route::post('edit-profile',[ProfileController::class,'_edit'])->name('user.profile._edit');

Route::post('upload-avatar',[ProfileController::class,'_upload_avatar'])->name('upload.avatar');

Route::get('/station-add', [StationController::class,'index']);
Route::get('/station/{id}', [StationController::class,'getStation'])->name('station.get');
Route::post('/station-add', [StationController::class,'add'])->name('station.add');

Route::post('comment/add',[CommentsController::class,'add'])->name('comment.add');

Route::get('region/town/{cityId}',[RegionSelectController::class,'towns'])->name('region.town');
Route::get('region/district/{townId}',[RegionSelectController::class,'districts'])->name('region.district');

Route::get('test',[\App\Http\Controllers\TestController::class,'test']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
