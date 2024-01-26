<?php
use Illuminate\Support\Facades\Route;
use Soa\Post\Http\Controllers\PostController;

Route::group(['prefix'=>'posts', 'as'=>'posts.'], function(){
 Route::post('', [PostController::class, 'store'])->middleware('soa-user-auth')->name('store');  
});