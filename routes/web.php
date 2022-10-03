<?php

use App\Http\Controllers\Admin\authcontrol;
use App\Http\Controllers\Admin\firstcontrol;
use App\Http\Controllers\Admin\markcontrol;
use App\Http\Controllers\Admin\categories;
use App\Http\Controllers\Admin\usercontrol;
use App\Http\Middleware\auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/login', [authcontrol::class, 'login'])->name('login');
Route::post('/post', [authcontrol::class, 'post'])->name('postlog');
Route::post('logout', [authcontrol::class, 'logout'])->name('logout');

Route::middleware(Authenticate::class)->group(function(){
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('', [firstcontrol::class, 'index'])->name('index');
        Route::resource('/marks',markcontrol::class);
        Route::resource('/categories', categories::class);
        Route::get('/users', [usercontrol::class,'index'])->name('users.index');
        Route::get('/banusers', [usercontrol::class,'banuser'])->name('users.banuser');
        Route::post('/banusers/{user}', [usercontrol::class,'ban'])->name('users.ban');
        Route::post('/banusers_del/{user}', [usercontrol::class,'delban'])->name('users.delban');
        // Route::resource('/shops', [firstcontrol::class, 'shops']);
        
        // Route::resource('/events', [firstcontrol::class, 'events']);
        // Route::resource('/messages', [firstcontrol::class, 'messages']);
    });
});
