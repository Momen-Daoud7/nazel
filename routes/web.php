<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgnaizitionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

//Home Route
Route::get('/', function () {
    return view('index');
});





Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	// Auth Routes
Route::get('register',[RegisterController::class,"register"])->name('register');
Route::post('register',[RegisterController::class,"store"])->name('register');
Route::get('login',[LoginController::class,"login_page"]);
Route::post('login',[LoginController::class,"login"])->name('login');
Route::post('logout',[LoginController::class,"logout"])->name('logout');
	// Resources Routes
	Route::group(['middleware' => 'auth'] , function() {
		Route::group(['middleware' => 'auth'] , function() {
			Route::resource('users',UserController::class); //users
			Route::resource('orgnaizition',OrgnaizitionController::class); //orgnaizition Route
			Route::resource('branches',BranchController::class); // branch Rotute
		});
	});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


// Route::get('/{page}', 'AdminController@index');
// Auth::routes();

