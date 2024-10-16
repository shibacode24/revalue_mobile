<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { return $request->user();});
Route::get('get_slider',[ApiController::class,'get_slider']);
Route::get('get_instant_services',[ApiController::class,'get_instant_services']);

Route::get('get_problem_type',[ApiController::class,'get_problem_type']);
Route::get('get_notification',[ApiController::class,'get_notification']);
Route::get('get_city',[ApiController::class,'get_city']);
Route::get('get_sub_problem_type',[ApiController::class,'get_sub_problem_type']);
Route::get('get_mobile_type',[ApiController::class,'get_mobile_type']);
Route::get('get_complaint1',[ApiController::class,'get_complaint1']);
Route::post('update_city',[ApiController::class,'update_city']);
Route::get('demo',[ApiController::class,'demo']);
Route::post('update_complaint',[ApiController::class,'update_complaint']);
Route::post('update_profile',[ApiController::class,'update_profile']);
Route::get('get_profile',[ApiController::class,'get_profile']);
Route::get('get_user',[ApiController::class,'get_user']);

Route::post('image_upload',[ApiController::class,'image_upload']);
Route::get('get_image',[ApiController::class,'get_image']);

	Route::get('get_complaintassign_Fromteachid',[ApiController::class,'get_complaintassign_Fromteachid']);