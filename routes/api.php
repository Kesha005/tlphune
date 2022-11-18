<?php

use App\Http\Controllers\API\addpostcontrol;
use App\Http\Controllers\API\logincontrol;
use App\Http\Controllers\API\basecontrol;
use App\Http\Controllers\API\shopcontrol;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/control',[logincontrol::class,'control']);
Route::post('/login',[logincontrol::class,'login']);
Route::post('/register',[logincontrol::class,'register']);
Route::post('/password_re',[logincontrol::class,'password_reset']);


Route::get('/categories',[basecontrol::class,'get_category']);
Route::post('/sendmsg',[basecontrol::class,'send_msg']);
Route::get('/events',[basecontrol::class,'get_events']);
Route::get('/images',[basecontrol::class,'images']);
Route::get('/marks',[basecontrol::class,'marks']);


Route::get('/category/{id}',[basecontrol::class,'category']);

Route::get('/category/{category_id}/marks/{mark_id}',[basecontrol::class,'filter']);

Route::get('/category/{category_id}',[basecontrol::class,'allmark']);

Route::get('/event/{event_id}',[basecontrol::class,'event']);

Route::get('/model',[basecontrol::class,'models']);
Route::post('/add',[addpostcontrol::class,'add_event']);
Route::post('/shop_add',[shopcontrol::class,'store']);
Route::post('new_add',[addpostcontrol::class,'newevent']);
Route::middleware('auth:sanctum')->group(function () {
    

    Route::get('/me', [logincontrol::class,'me']);
    
});

