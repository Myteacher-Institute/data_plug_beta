<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\VTUController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PagesController::class, "index"]);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/how', [PagesController::class, 'how_it_works']);
Route::get('/features', [PagesController::class, 'features']);

Auth::routes();

// User Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services']);
Route::get('/transactions', [App\Http\Controllers\HomeController::class, 'transactions']);
Route::get('/view_transaction_table', [App\Http\Controllers\HomeController::class, 'view_transaction_table']);
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help']);
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings']);
Route::put('/update_details', [App\Http\Controllers\HomeController::class, 'update_details']);
Route::put('/update_password', [App\Http\Controllers\HomeController::class, 'update_password']);

// User Purchase Airtime
Route::post('/buy-airtime', [App\Http\Controllers\VTUController::class, 'buy_airtime']);
Route::post('/buy-data', [App\Http\Controllers\VTUController::class, 'buy_data']);

// Payment Routes
Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'payment']);
Route::get('/make_payment', [App\Http\Controllers\PaymentController::class, 'make_payment']);


Route::get('/buy_item/{item}', [App\Http\Controllers\Front\BuyItemController::class, 'buy_item']);

// service Route added by me
Route::get('/nin', [App\Http\Controllers\HomeController::class, 'nin']);
Route::get('/tin', [App\Http\Controllers\HomeController::class, 'tin']);
Route::get('/mobile_data', [App\Http\Controllers\HomeController::class, 'mobile_data']);
Route::get('/sme', [App\Http\Controllers\HomeController::class, 'sme']);
Route::get('/electricity', [App\Http\Controllers\HomeController::class, 'electricity']);
Route::get('/bills', [App\Http\Controllers\HomeController::class, 'bills']);
 

// Admin Routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group( function() {
    Route::get('/index', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::put('/profile', [AdminController::class, 'update_profile']);
    Route::put('/password', [AdminController::class, 'update_password']);
    Route::get('/settings', [AdminController::class, 'get_settings']);
    Route::post('/settings', [AdminController::class, 'update_settings']);
    Route::post('/add_help', [AdminController::class, 'add_help']);
    Route::delete('/delete_help', [AdminController::class, 'delete_help']);
    Route::get('/transactions', [AdminController::class, 'get_transactions']);
    Route::delete('/user-delete/{user_id}', [AdminController::class, 'user_delete']);
    Route::get('/api_manegement', [AdminController::class, 'api_manegement']);
    Route::delete('/help-delete/{help_id}', [AdminController::class, 'help_delete']);
});
