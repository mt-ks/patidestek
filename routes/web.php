<?php

use App\Http\Controllers\RegionSelectController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/station-add', [StationController::class,'index']);

Route::get('region/town/{cityId}',[RegionSelectController::class,'towns'])->name('region.town');
Route::get('region/district/{townId}',[RegionSelectController::class,'districts'])->name('region.district');

Route::get('test',[\App\Http\Controllers\TestController::class,'test']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
