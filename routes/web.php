<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addcitycontroller;
use App\Http\Controllers\slidercontroller;
use App\Http\Controllers\InstantservicesController;
use App\Http\Controllers\mobilebrandcontroller;
use App\Http\Controllers\MobileTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProblemTypeController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\dasboardcontroller;
use App\Http\Controllers\TechnicineController;
use App\Http\Controllers\TeachVendorController;
use App\Http\Controllers\ReasonmaintenanceController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\RecentlysoldController;
use App\Http\Controllers\complaintcontroller;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\ServicePointsController;
use App\Http\Controllers\vendor_sliderController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 
//login
Route::get('/',[Usercontroller::class,'index'])->name('login');
Route::post('login_submit',[Usercontroller::class,'check_login'])->name('login_submit');
Route::get('logout',[Usercontroller::class,'log_out'])->name('logout');


//addcity
Route::get('city',[addcitycontroller::class,'index'])->name('city');
Route::post('create-city',[addcitycontroller::class,'create'])->name('create-city');
Route::get('edit-city/{id}',[addcitycontroller::class,'edit'])->name('edit-city');
Route::post('update-city',[addcitycontroller::class,'update'])->name('update-city');
Route::get('destroy-city/{id}',[addcitycontroller::class,'destroy'])->name('destroy-city');

//slider
Route::get('slider',[slidercontroller::class,'index'])->name('slider');
Route::post('create_slider',[slidercontroller::class,'create'])->name('create_slider');
Route::get('edit_slider/{id}',[slidercontroller::class,'edit'])->name('edit_slider');
Route::post('update_slider',[slidercontroller::class,'update'])->name('update_slider');
Route::get('destroy_slider/{id}',[slidercontroller::class,'destroy'])->name('destroy_slider');

//instant_services
Route::get('instant_services',[Instantservicescontroller::class,'index'])->name('instant_services');
Route::post('create_services',[Instantservicescontroller::class,'create'])->name('create_services');
Route::get('edit_services/{id}',[Instantservicescontroller::class,'edit'])->name('edit_services');
Route::post('update_services',[Instantservicescontroller::class,'update'])->name('update_services');
Route::get('destroy_services/{id}',[Instantservicescontroller::class,'destroy'])->name('destroy_services');

//mobile_brand
Route::get('mobile_types',[mobilebrandcontroller::class,'index'])->name('mobile_types');
Route::post('create_mobile',[mobilebrandcontroller::class,'create_mobile_type'])->name('create_mobile');
Route::get('edit_mobile/{id}',[mobilebrandcontroller::class,'edit_m'])->name('edit_mobile');
Route::post('update_mobile',[mobilebrandcontroller::class,'update'])->name('update_mobile');
Route::get('destroy_mobile/{id}',[mobilebrandcontroller::class,'destroy_mt'])->name('destroy_mobile');

//mobile_type_series
Route::get('mobile_series',[MobileTypecontroller::class,'index'])->name('mobile_series');
Route::post('creat_mobile_series',[MobileTypecontroller::class,'creat_mobile_series'])->name('creat_mobile_series');
Route::get('edit_mobile_series/{id}',[MobileTypecontroller::class,'edit_s'])->name('edit_mobile_series');
Route::post('update_mobile_series',[MobileTypecontroller::class,'update_s'])->name('update_mobile_series');
Route::get('destroy_mobile_series/{id}',[MobileTypecontroller::class,'destroy_ms'])->name('destroy_mobile_series');
Route::get('get_mobileseries_id',[MobileTypecontroller::class,'mobile_series'])->name('get_mobileseries_id');
Route::get('delete_added_table/{id}',[MobileTypecontroller::class,'delete_added_table'])->name('delete_added_table');

//mobile_type_module
Route::get('mobile_module',[MobileTypecontroller::class,'index'])->name('mobile_module');
Route::post('creat_module',[MobileTypecontroller::class,'create_mobile_module'])->name('creat_module');
Route::get('edit_module/{id}',[MobileTypecontroller::class,'edit_m'])->name('edit_module');
Route::post('update_module',[MobileTypecontroller::class,'update_m'])->name('update_module');

Route::get('destroy_module/{id}',[MobileTypecontroller::class,'destroy_mo'])->name('destroy_module');
Route::get('get_record',[MobileTypecontroller::class,'getrecord'])->name('get_record');

//problem_type_category
Route::get('problem_category',[ProblemTypeController::class,'index'])->name('problem_category');
Route::post('create_prolem_category',[ProblemTypeController::class,'create_pc'])->name('create_prolem_category');
Route::get('edit_pc/{id}',[ProblemTypeController::class,'edit_pc'])->name('edit_pc');
Route::post('update_pc',[ProblemTypeController::class,'update_pc'])->name('update_pc');
Route::get('destroy_prc/{id}',[ProblemTypeController::class,'destroy_pc'])->name('destroy_prc');

//sub_problem_type_category
Route::get('sub_pc',[ProblemTypeController::class,'index'])->name('sub_pc');
Route::post('create_sub_pc',[ProblemTypeController::class,'create_sub'])->name('create_sub_pc');
Route::get('edit_sub_pc/{id}',[ProblemTypeController::class,'edit_sub'])->name('edit_sub_pc');
Route::post('update_sub_pc',[ProblemTypeController::class,'update_sub'])->name('update_sub_pc');
Route::get('destroy_sub_pc/{id}',[ProblemTypeController::class,'destroy_sub'])->name('destroy_sub_pc');


//notification
Route::get('notification',[NotificationController::class,'index'])->name('notification');
Route::post('create_notification',[NotificationController::class,'create'])->name('create_notification');
Route::get('edit_notification/{id}',[NotificationController::class,'edit'])->name('edit_notification');
Route::post('update_notification',[NotificationController::class,'update'])->name('update_notification');
Route::get('destroy_notification/{id}',[NotificationController::class,'destroy'])->name('destroy_notification');

//dashboard
Route::get('dashboard',[dasboardcontroller::class,'index'])->name('dashboard');
// Route::post('modal_dasboard',[dasboardcontroller::class,'create'])->name('modal_dasboard');
// Route::get('edit_modal/{id}',[dasboardcontroller::class,'emodal'])->name('edit_modal');
// Route::post('update_modal',[dasboardcontroller::class,'umodal'])->name('update_modal');
Route::post('assign_technician',[dasboardcontroller::class,'assign_technician'])->name('assign_technician');
Route::get('destroy_dashboard/{id}',[dasboardcontroller::class,'destroy'])->name('destroy_dashboard');

//technicine
Route::get('technicine',[TechnicineController::class,'index'])->name('technicine');
Route::post('create_technician',[TechnicineController::class,'create'])->name('create_technician');
Route::get('edit_technicine/{id}',[TechnicineController::class,'edit'])->name('edit_technicine');
Route::post('update_technicine',[TechnicineController::class,'update'])->name('update_technicine');
Route::get('destroy_technicine/{id}',[TechnicineController::class,'destroy'])->name('destroy_technicine');
Route::post('mail',[TechnicineController::class,'mail_and_downloadpdf'])->name('mail');
//technician vendor
Route::get('techvendor',[TeachVendorController::class,'index'])->name('techvendor');
Route::post('create_teachvendor',[TeachVendorController::class,'creat'])->name('create_teachvendor');
Route::get('edit_techvendor/{id}',[TeachVendorController::class,'edit'])->name('edit_techvendor');
Route::post('update_teachvendor',[TeachVendorController::class,'update'])->name('update_teachvendor');
Route::get('destroy_techvendor/{id}',[TeachVendorController::class,'destroy'])->name('destroy_techvendor');
Route::get('status',[TeachVendorController::class,'statustoggle'])->name('status');

//resoan maintenance
Route::get('maintenance',[ReasonmaintenanceController::class,'index'])->name('maintenance');
Route::post('crete_maintenance',[ReasonmaintenanceController::class,'create'])->name('crete_maintenance');
Route::get('edit_maintenance/{id}',[ReasonmaintenanceController::class,'edit'])->name('edit_maintenance');
Route::post('update_maintenance',[ReasonmaintenanceController::class,'update'])->name('update_maintenance');
Route::get('destroy_maintenance/{id}',[ReasonmaintenanceController::class,'destroy'])->name('destroy_maintenance');

//sale
Route::get('sales',[SaleController::class,'index'])->name('sales');
//  Route::get('edit_sale/{id}',[SaleController::class,'edit'])->name('edit_sale');
Route::post('sales_create',[SaleController::class,'update'])->name('sales_create');
Route::post('update_vendor',[SaleController::class,'update_vendor'])->name('update_vendor');
Route::get('complaint',[complaintcontroller::class,'index'])->name('complaint');
Route::get('destroy_sale/{id}',[SaleController::class,'destroy'])->name('destroy_sale');

//recently sold
Route::get('sold',[RecentlysoldController::class,'index'])->name('sold');
Route::post('create_sold',[RecentlysoldController::class,'create'])->name('create_sold');
Route::get('edit_sold/{id}',[RecentlysoldController::class,'edit'])->name('edit_sold');
Route::post('update_sold',[RecentlysoldController::class,'update'])->name('update_sold');
Route::get('destroy_sold/{id}',[RecentlysoldController::class,'destroy'])->name('destroy_sold');

Route::get('donate',[DonateController::class,'index'])->name('donate');
Route::get('donate_destroy/{id}',[DonateController::class,'destroy'])->name('donate_destroy');



Route::get('/stores',[StoresController::class,'index'])->name('stores.index');
Route::get('/stores/create',[StoresController::class,'create'])->name('stores.create');
Route::post('/stores',[StoresController::class,'store'])->name('stores.store');
Route::get('/stores/{id}/edit',[StoresController::class,'edit'])->name('stores.edit');
Route::put('/stores/{id}',[StoresController::class,'update'])->name('stores.update');
Route::delete('/stores/{id}',[StoresController::class,'destroy'])->name('stores.destroy');


Route::get('/service-points',[ServicePointsController::class,'index'])->name('service-points.index');
Route::get('/service-points/create',[ServicePointsController::class,'create'])->name('service-points.create');
Route::post('/service-points',[ServicePointsController::class,'store'])->name('service-points.store');
Route::get('/service-points/{id}/edit',[ServicePointsController::class,'edit'])->name('service-points.edit');
Route::put('/service-points/{id}',[ServicePointsController::class,'update'])->name('service-points.update');
Route::delete('/service-points/{id}',[ServicePointsController::class,'destroy'])->name('service-points.destroy');
Route::get('mobile_modules_table_backup',[ServicePointsController::class,'mobile_modules_table_backup'])->name('mobile_modules_table_backup');
Route::get('database_backup',[ServicePointsController::class,'database_backup'])->name('database_backup');
Route::post('updateMobileModuleDataFromCSV',[ServicePointsController::class,'updateMobileModuleDataFromCSV'])->name('updateMobileModuleDataFromCSV');

//vendor slider
Route::get('vendor_slider',[vendor_sliderController::class,'index'])->name('vendor_slider');
Route::post('create_vendor_slider',[vendor_sliderController::class,'create'])->name('create_vendor_slider');
Route::get('destroy_vendor_slider/{id}',[vendor_sliderController::class,'destroy'])->name('destroy_vendor_slider');
