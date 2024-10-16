<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Api\StoreApiController;
use App\Http\Controllers\Api\ServicePointApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user_registration',[ApiController::class,'user_registration']);
Route::post('send_mobile_verify_otp',[ApiController::class,'send_mobile_verify_otp']);
Route::get('get_slider',[ApiController::class,'get_slider']);
Route::get('get_instant_services',[ApiController::class,'get_instant_services']);

Route::get('get_problem_type',[ApiController::class,'get_problem_type']);
Route::get('get_notification',[ApiController::class,'get_notification']);
Route::get('get_city',[ApiController::class,'get_city']);
Route::get('get_sub_problem_type',[ApiController::class,'get_sub_problem_type']);
Route::get('get_mobile_type',[ApiController::class,'get_mobile_type']);

Route::post('post_complaint',[ApiController::class,'post_complaint']);
Route::get('update_city',[ApiController::class,'update_city']);

Route::get('demo',[ApiController::class,'demo']);

Route::post('update_complaint',[ApiController::class,'update_complaint']);
Route::post('update_profile',[ApiController::class,'update_profile']);
Route::get('get_profile',[ApiController::class,'get_profile']);
Route::post('image_upload',[ApiController::class,'image_upload']);
Route::get('get_image',[ApiController::class,'get_image']);

Route::get('get_user',[ApiController::class,'get_user']);

Route::get('get_mobile_brand',[ApiController::class,'get_mobile_brand']);
Route::get('get_mobile_model',[ApiController::class,'get_mobile_model']);
Route::get('get_mobile_series',[ApiController::class,'get_mobile_series']);
Route::get('get_mobile_brandall',[ApiController::class,'get_mobile_brandall']);

Route::get('get_mobile_model1',[ApiController::class,'get_mobile_model1']);
Route::get('get_mobile_model_no',[ApiController::class,'get_mobile_model_no']);
Route::get('get_mobile_five_brand',[ApiController::class,'get_mobile_five_brand']);

Route::post('post_sale',[ApiController::class,'post_sale']);
Route::get('get_sale',[ApiController::class,'get_sale']);
Route::get('get_complaintassign_Fromteachid',[ApiController::class,'get_complaintassign_Fromteachid']);
Route::get('get_complaintallfromtechid',[ApiController::class,'get_complaintallfromtechid']);
Route::get('get_tech',[ApiController::class,'get_tech']);
Route::post('update_tech',[ApiController::class,'update_tech']);
Route::post('registration_api',[ApiController::class,'registration_api']);
Route::post('update_remark',[ApiController::class,'update_remark']);
Route::post('update_status',[ApiController::class,'update_status']);

Route::get('mobile_model_series',[ApiController::class,'mobile_model_series']);
Route::post('confirm_complaint',[ApiController::class,'confirm_complaint']);
Route::post('cancel_complaint',[ApiController::class,'cancel_complaint']);
Route::get('get_recentlysold',[ApiController::class,'get_recentlysold']);
Route::post('cancel_sale',[ApiController::class,'cancel_sale']);
Route::get('get_mobile_model_series',[ApiController::class,'get_mobile_model_series']);
Route::get('get_sale_history',[ApiController::class,'get_sale_history']);
Route::get('get_sale_history1',[ApiController::class,'get_sale_history1']);
Route::get('get_sold_data',[ApiController::class,'get_sold_data']);

Route::get('get_complaintassign_Fromteachid1',[ApiController::class,'get_complaintassign_Fromteachid1']);

Route::post('donate',[ApiController::class,'donate']);

// Routes for StoresApiController
Route::get('stores', [StoreApiController::class, 'index']);
Route::get('stores/{id}', [StoreApiController::class, 'show']);
Route::post('stores', [StoreApiController::class, 'store']);
Route::put('stores/{id}', [StoreApiController::class, 'update']);
Route::delete('stores/{id}', [StoreApiController::class, 'destroy']);

// Routes for ServicePointsApiController
Route::get('service-points', [ServicePointApiController::class, 'index']);
Route::get('service-points/{id}', [ServicePointApiController::class, 'show']);
Route::post('service-points', [ServicePointApiController::class, 'store']);
Route::put('service-points/{id}', [ServicePointApiController::class, 'update']);
Route::delete('service-points/{id}', [ServicePointApiController::class, 'destroy']);

Route::get('get_vendor_slider', [ApiController::class, 'get_vendor_slider']);

