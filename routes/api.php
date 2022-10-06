<?php

use App\Http\Controllers\API\addpostcontrol;
use App\Http\Controllers\API\logincontrol;
use App\Http\Controllers\API\basecontrol;
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

Route::post('/auth',[logincontrol::class,'isnew']);
Route::get('/categories',[basecontrol::class,'get_category']);
Route::post('/sendmsg',[basecontrol::class,'send_msg']);
Route::get('/events',[basecontrol::class,'get_events']);
Route::post('/add',[addpostcontrol::class,'add_event'])->middleware('auth:sanctum');


