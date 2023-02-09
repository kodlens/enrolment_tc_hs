<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


use App\Models\User;
use App\Models\Category;


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



Auth::routes([
    'login' => 'false'
]);

Route::get('/load-user', function(){
    if(Auth::check()){
        return Auth::user();
    }
});




Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sign-up', [App\Http\Controllers\SignUpController::class, 'index']);
Route::post('/sign-up', [App\Http\Controllers\SignUpController::class, 'store']);

Route::get('/get-user/{id}', [App\Http\Controllers\OpenUserController::class, 'getUser']);



//ADDRESS
Route::get('/load-provinces', [App\Http\Controllers\AddressController::class, 'loadProvinces']);
Route::get('/load-cities', [App\Http\Controllers\AddressController::class, 'loadCities']);
Route::get('/load-barangays', [App\Http\Controllers\AddressController::class, 'loadBarangays']);



// -----------------------ADMINSITRATOR-------------------------------------------

Route::get('/admin-home', [App\Http\Controllers\Administrator\AdminHomeController::class, 'index']);


Route::resource('/accounts', App\Http\Controllers\Administrator\AccountController::class);
Route::get('/get-accounts', [App\Http\Controllers\Administrator\AccountController::class, 'getAccounts']);
Route::post('/user-reset-password/{userid}', [App\Http\Controllers\Administrator\AccountController::class, 'resetPassword']);



Route::resource('/academic-year', App\Http\Controllers\Administrator\AcademicYearController::class);
Route::get('/get-academic-years', [App\Http\Controllers\Administrator\AcademicYearController::class, 'getAcademicYears']);
Route::post('/academic-year-active/{id}', [App\Http\Controllers\Administrator\AcademicYearController::class, 'active']);


Route::resource('/track', App\Http\Controllers\Administrator\TrackController::class);
Route::get('/get-tracks', [App\Http\Controllers\Administrator\TrackController::class, 'getTracks']);

// -----------------------ADMINSITRATOR-------------------------------------------



//open links
Route::get('/load-open-academic-years', [App\Http\Controllers\OpenController::class, 'loadAcademicYears']);
Route::get('/load-open-religions', [App\Http\Controllers\OpenController::class, 'loadReligions']);





Route::get('/session', function(){
    return Session::all();
});



Route::get('/applogout', function(Request $req){
    \Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();


});
