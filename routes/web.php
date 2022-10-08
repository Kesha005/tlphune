<?php

use App\Http\Controllers\Admin\a_changecontrol;
use App\Http\Controllers\Admin\apkcontrol;
use App\Http\Controllers\Admin\authcontrol;
use App\Http\Controllers\Admin\firstcontrol;
use App\Http\Controllers\Admin\markcontrol;
use App\Http\Controllers\Admin\categories;
use App\Http\Controllers\Admin\eventcontrol;
use App\Http\Controllers\Admin\msgscontrol;
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
        Route::get('/apk',[apkcontrol::class,'index'])->name('apk.index');
        Route::post('/apk_add',[apkcontrol::class,'create'])->name('apk.create');
        Route::delete('/apk_delete/{apk}',[apkcontrol::class,'destroy'])->name('apk.destroy');
        Route::get('/apk_download/{apk}',[apkcontrol::class,'download'])->name('apk.download');
        Route::get('/messages', [msgscontrol::class,'index'])->name('messages.index');
        Route::get('/messages/{msg}', [msgscontrol::class,'show'])->name('messages.show');
        Route::delete('/messages_del/{msg}', [msgscontrol::class,'destroy'])->name('messages.destroy');
        Route::post('/messages_multi_del/', [msgscontrol::class,'multi_del'])->name('messages.multi_del');
        #__________________Admin profil routes_______________
        Route::get('/profile',[a_changecontrol::class,'index'])->name('profile.index');
        Route::put('profile_update/{user}',[a_changecontrol::class,'change_profil'])->name('profile.update');
        Route::put('profile_update_password/{user}',[a_changecontrol::class,'change_password'])->name('profile.update.password');

        #_________________________________Event routes_______________________________________________

        Route::get('events',[eventcontrol::class,'index'])->name('events.index');
        Route::get('events/{event}',[eventcontrol::class,'index'])->name('events.show');
        Route::delete('event_destroy/{event}',[eventcontrol::class,'destroy'])->name('events.destroy');
        // Route::resource('/shops', [firstcontrol::class, 'shops']);
        
        
    });
});
