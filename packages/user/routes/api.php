<?php
use Illuminate\Support\Facades\Route;
use Soa\User\Http\Controllers\UserController;

Route::group(['prefix'=>'auth', 'as'=>'auth.'], function(){
 Route::post('login', [UserController::class, 'login'])->name('login');
 Route::post('logout', [UserController::class, 'logout'])->name('logout')->middleware(['auth:sanctum']);
 Route::get('check', [UserController::class, 'check_authentication'])->middleware(['auth:sanctum'])->name('check');
});

