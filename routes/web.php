<?php

use App\Http\Controllers\Admin\a_changecontrol;
use App\Http\Controllers\Admin\apkcontrol;
use App\Http\Controllers\Admin\authcontrol;
use App\Http\Controllers\Admin\firstcontrol;
use App\Http\Controllers\Admin\markcontrol;
use App\Http\Controllers\Admin\categories;
use App\Http\Controllers\Admin\colorcontrol;
use App\Http\Controllers\Admin\eventcontrol;
use App\Http\Controllers\Admin\gallerycontrol;
use App\Http\Controllers\Admin\msgscontrol;
use App\Http\Controllers\Admin\shopscontrol;
use App\Http\Controllers\Admin\designcontrol;
use App\Http\Controllers\Admin\etrapcontrol;
use App\Http\Controllers\Admin\newpostcontrol;
use App\Http\Controllers\Admin\placecontrol;
use App\Http\Controllers\Admin\usercontrol;
use App\Http\Controllers\Admin\productcontrol;
use App\Http\Middleware\admin;
use App\Http\Middleware\auth;
use App\Http\Middleware\Authenticate;
use App\Models\gallery;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/login', [authcontrol::class, 'login'])->name('login');
Route::post('/post', [authcontrol::class, 'post'])->name('postlog');
Route::post('logout', [authcontrol::class, 'logout'])->name('logout');






Route::middleware(Authenticate::class, admin::class)->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('', [firstcontrol::class, 'index'])->name('index');
        Route::resource('/marks', markcontrol::class);
        Route::resource('/categories', categories::class);
        Route::get('/users', [usercontrol::class, 'index'])->name('users.index');
        Route::get('/banusers', [usercontrol::class, 'banuser'])->name('users.banuser');
        Route::post('/banusers/{user}', [usercontrol::class, 'ban'])->name('users.ban');
        Route::post('/banusers_del/{user}', [usercontrol::class, 'delban'])->name('users.delban');
        Route::delete('user/{user}', [usercontrol::class, 'destroy'])->name('users.destroy');
        Route::get('/apk', [apkcontrol::class, 'index'])->name('apk.index');
        Route::post('/apk_add', [apkcontrol::class, 'create'])->name('apk.create');
        Route::delete('/apk_delete/{apk}', [apkcontrol::class, 'destroy'])->name('apk.destroy');
        Route::get('/apk_download/{apk}', [apkcontrol::class, 'download'])->name('apk.download');
        Route::get('/messages', [msgscontrol::class, 'index'])->name('messages.index');
        Route::get('/messages/{msg}', [msgscontrol::class, 'show'])->name('messages.show');
        Route::delete('/messages_del/{msg}', [msgscontrol::class, 'destroy'])->name('messages.destroy');
        Route::post('/messages_multi_del/', [msgscontrol::class, 'multi_del'])->name('messages.multi_del');
        #__________________Admin profil routes_______________
        Route::get('/profile', [a_changecontrol::class, 'index'])->name('profile.index');
        Route::put('profile_update/{user}', [a_changecontrol::class, 'change_profil'])->name('profile.update');
        Route::put('profile_update_password/{user}', [a_changecontrol::class, 'change_password'])->name('profile.update.password');

        #__________________________________Gallery_Routes______________________
        Route::get('gallery', [gallerycontrol::class, 'index'])->name('gallery.index');
        Route::post('img_store', [gallerycontrol::class, 'store'])->name('gallery.store');
        Route::delete('img_destroy/{image}', [gallerycontrol::class, 'destroy'])->name('gallery.destroy');
        #_________________________________Event routes_______________________________________________

        Route::resource('design', designcontrol::class);
        Route::get('download/{id}', [designcontrol::class, 'download'])->name('design.download');

        Route::get('events', [eventcontrol::class, 'index'])->name('events.index');
        Route::get('event_show/{id}', [eventcontrol::class, 'show'])->name('events.show');
        Route::delete('event_destroy/{event}', [eventcontrol::class, 'destroy'])->name('events.destroy');
        Route::post('event_del', [eventcontrol::class, 'multi_del'])->name('events.multi_del');
        Route::post('event_check', [eventcontrol::class, 'multi_check'])->name('events.multi_check');
        Route::post('event_check_single/{id?}', [eventcontrol::class, 'check'])->name('events.check');


        #________________________________________NEW_EVENTS____________________________________________________
        Route::get('new_event',[newpostcontrol::class,'index'])->name('new_event.index');
        Route::get('new_event/show/{id}',[newpostcontrol::class,'show'])->name('new_event.show');
        Route::post('new_event/delete/{id}',[newpostcontrol::class,'destroy'])->name('new_event.destroy');
        Route::post('new_event/multidel',[newpostcontrol::class,'multi_del'])->name('new_event.multi_del');
        

        Route::resource('/shops', shopscontrol::class);
        Route::post('/shops/multi_confirm', [shopscontrol::class, 'multi_confirm'])->name('shops.multi_confirm');
        Route::post('/shops/multi_delete', [shopscontrol::class, 'multi_destroy'])->name('shops.multi_destroy');

        #______________________________________Model Product Routes_____________________________________________________
        Route::resource('/products', productcontrol::class);
        Route::resource('/color', colorcontrol::class);

        Route::resource('/place',placecontrol::class);
        Route::resource('/etrap',etrapcontrol::class);
    });
});
