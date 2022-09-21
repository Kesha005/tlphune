<?php

use App\Http\Controllers\Admin\firstcontrol;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('',[firstcontrol::class,'index'])->name('index');
    Route::get('/categories',[firstcontrol::class,'categories'])->name('categories');
    Route::get('/users',[firstcontrol::class,'users'])->name('users');
    Route::get('/banusers',[firstcontrol::class,'banuser'])->name('banusers');
    Route::get('/shops',[firstcontrol::class,'shops'])->name('shops');
    Route::get('/marks',[firstcontrol::class,'marks'])->name('marks');
    Route::get('/events',[firstcontrol::class,'events'])->name('events');
    Route::get('/messages',[firstcontrol::class,'messages'])->name('messages');
});







