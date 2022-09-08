<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\Guest;
use App\Http\Controllers\Auth as Login;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});
Route::get('clear_database', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('migrate:fresh --seed');
    dd("Cache is cleared");
});

Auth::routes();
Route::get('/google/login', [Login\LoginController::class, 'googleLogin'])->name('googleLogin');
Route::get('/facebook/login', [Login\LoginController::class, 'facebookLogin'])->name('facebookLogin');


Route::get('verify/resend', [Login\TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', Login\TwoFactorController::class)->only(['index', 'store']);

Route::get('/documentation', [Guest\GuestController::class, 'documentation'])->name('documentation');

Route::get('/marketplace', [Guest\GuestController::class, 'marketplace'])->name('marketplace');
Route::get('/create_listing', [Guest\GuestController::class, 'create_listing'])->name('create_listing');
Route::post('/create_listing', [Guest\GuestController::class, 'create'])->name('marketplace.create');
Route::get('/unionbank', [Guest\GuestController::class, 'unionbank'])->name('unionbank');
Route::get('/unionbank_payment', [Guest\GuestController::class, 'unionbank_payment'])->name('unionbank.payment');
Route::get('/unionbank_confirm', [Guest\GuestController::class, 'unionbank_confirm'])->name('unionbank.confirm');
Route::get('/search', [Guest\GuestController::class, 'search'])->name('search');
Route::get('/search/{product}', [Guest\GuestController::class, 'search_product'])->name('search.product');

Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function() {

    //Client
    Route::get('/profile/provinces', [Admin\ClientController::class, 'province'])->name('province');
    Route::get('/profile/{user}', [Admin\ClientController::class, 'profile'])->name('profile');
    Route::get('/profile', [Admin\ClientController::class, 'get_profile'])->name('get_profile');
    Route::post('/profile/registration', [Admin\ClientController::class, 'registration'])->name('registration');
    Route::resource('products', Admin\ProductController::class);
});

Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function() {

    //Admin
    Route::get('/dashboard', [Admin\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/clients', [Admin\AdminController::class, 'clients'])->name('clients');
    Route::get('/client/{user}', [Admin\AdminController::class, 'client'])->name('client');
    Route::post('/client/{user}', [Admin\AdminController::class, 'set_status'])->name('set_status');
    Route::get('/users', [Admin\AdminController::class, 'users'])->name('users');
    Route::resource('products', Admin\ProductController::class)->only('show');
    Route::post('/products/{product}', [Admin\ProductController::class, 'product'])->name('product');
    Route::get('/reports', [Admin\AdminController::class, 'reports'])->name('reports');

});

