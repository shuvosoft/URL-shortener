<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WebSettiingController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/profile', ProfileController::class);
Route::post('/profile-update', [ProfileController::class,'profile_update']);
Route::post('/password-update', [ProfileController::class,'password_update']);
Route::post('/image-upload', [ProfileController::class,'image_upload']);
Route::get('/user-list', [ProfileController::class,'user_list']);
Route::get('/user-all', [ProfileController::class,'user_all']);
Route::get('/links', [ProfileController::class,'link']);
Route::get('/getLinks', [ProfileController::class,'get_link']);
// web Setting --------------
Route::get('/settings', [WebSettiingController::class,'setting']);
Route::post('/web_setting', [WebSettiingController::class,'store_web_setting']);
Route::get('/get_setting', [WebSettiingController::class,'get_web_setting']);
Route::post('/footer', [WebSettiingController::class,'footer']);
Route::post('/contract', [WebSettiingController::class,'contract']);
// Setting -----------------
Route::get('/app-setting', [SettingController::class,'app_setting']);
Route::post('/app-setting-store', [SettingController::class,'app_setting_store']);
Route::get('/app-setting-get', [SettingController::class,'app_setting_get']);

Route::post('/app-url-store', [SettingController::class,'app_url_store']);
Route::post('/app-add-store', [SettingController::class,'app_add_store']);

