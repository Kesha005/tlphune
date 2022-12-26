<?php

use App\Http\Controllers\API\addpostcontrol;
use App\Http\Controllers\API\logincontrol;
use App\Http\Controllers\API\basecontrol;
use App\Http\Controllers\API\contractcontrol;
use App\Http\Controllers\API\profilcontrol;
use App\Http\Controllers\API\shopcontrol;
use App\Models\contract;
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
Route::get('/welayat',[addpostcontrol::class,'place']);


Route::get('/category/{id}',[basecontrol::class,'category']);

Route::get('/category/{category_id}/marks/{mark_id}',[basecontrol::class,'filter']);
Route::get('/category/{category_id}',[basecontrol::class,'category']);




Route::get('/event/{event_id}',[basecontrol::class,'event']);
Route::get('/new/{new_id}',[basecontrol::class,'new']);


Route::get('/model',[basecontrol::class,'models']);
Route::post('/add',[addpostcontrol::class,'add_event']);
Route::post('/new_add',[addpostcontrol::class,'newevent']);

Route::get('shops',[shopcontrol::class,'shops']);
Route::get('shop_product/{id}',[shopcontrol::class,'products']);
Route::post('/shop_add',[shopcontrol::class,'store']);
Route::get('/myshop/{user_id}',[shopcontrol::class,'index']);
Route::post('/delshop/{user_id}',[shopcontrol::class,'destroy']);

Route::get('/about/{user_id}',[profilcontrol::class,'about']);
Route::get('/all/{user_id}',[profilcontrol::class,'all']);
Route::get('/success/{user_id}',[profilcontrol::class,'success']);
Route::get('/onproses/{user_id}',[profilcontrol::class,'onproses']);
Route::get('/mymsg/{user_id}',[basecontrol::class,'messages']);

Route::get('/contract',[contractcontrol::class,'index']);

Route::get('/color',[basecontrol::class,'color']);

Route::middleware('auth:sanctum')->group(function () {
    

    Route::get('/me', [logincontrol::class,'me']);
    
});

