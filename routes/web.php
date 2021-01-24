<?php

use App\Http\Controllers\RegionSelectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/posts', function () {
    return view('posts');
});


Route::get('town/{cityId}',[RegionSelectController::class,'towns']);
Route::get('district/{regionId}',[RegionSelectController::class,'districts']);

Route::get('test',[\App\Http\Controllers\TestController::class,'test']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
