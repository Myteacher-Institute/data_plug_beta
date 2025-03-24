<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NINController;
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
// Route::get('/about', [PagesController::class, 'about']);
// Route::get('/how', [PagesController::class, 'how_it_works']);
// Route::get('/features', [PagesController::class, 'features']);
// Route::get('/test', [PagesController::class, 'test']);

Auth::routes();

// User Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

// User NIN Services
Route::get('/nin-services', [App\Http\Controllers\NINController::class, 'nin_services']);
Route::get('/display-value', [App\Http\Controllers\NINController::class, 'display_value']);
Route::post('/nin-retrieval', [App\Http\Controllers\NINController::class, 'nin_retrieval']);
Route::post('/nin-modification', [App\Http\Controllers\NINController::class, 'nin_modification']);
Route::get('/update-request/{id}', [App\Http\Controllers\NINController::class, 'update_request']);
Route::put('/store-update-request/{id}', [App\Http\Controllers\NINController::class, 'store_update_request']);
Route::get('/check-result/{id}', [App\Http\Controllers\NINController::class, 'check_result']);


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
// testimony route
Route::get('/testify', [App\Http\Controllers\HomeController::class, 'testimony'])->name('testify');
Route::post('/add_testify', [App\Http\Controllers\TestifyController::class,'saveTestimonial'])->name('add_testify');

// Admin Routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group( function() {
    Route::get('/index', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/services', [NINController::class, 'services']);
    Route::get('/view-service-requests/{slug}', [NINController::class, 'view_service_requests']);
    Route::get('/view-service-request-history/{slug}', [NINController::class, 'view_service_request_history']);
    Route::get('/view-all-service-request-history', [NINController::class, 'view_all_service_request_history']);
    Route::get('/view-service-requests/{id}/enter-result', [NINController::class, 'view_service_requests_enter_result']);
    Route::post('/view-service-requests/enter-result', [NINController::class, 'view_service_requests_store_result']);
    Route::get('/view-service-requests/update-result/{id}', [NINController::class, 'view_service_requests_update_result']);
    Route::put('/view-service-requests/update-result', [NINController::class, 'view_service_requests_store_update_result']);
    Route::get('/view-service-requests/{id}/enter-result', [NINController::class, 'view_service_requests_enter_result']);
    Route::post('/view-service-requests/enter-result', [NINController::class, 'view_service_requests_store_result']);
    Route::post('/view-service-requests/update-result', [NINController::class, 'view_service_requests_update_result']);
    Route::get('/add-service', [NINController::class, 'add_service']);
    Route::post('/store-service', [NINController::class, 'store_service']);
    Route::get('/edit-service/{id}', [NINController::class, 'edit_service']);
    Route::put('/edit-service/{id}', [NINController::class, 'update_service']);
    Route::delete('/delete-service/{id}', [NINController::class, 'delete_service']);
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
