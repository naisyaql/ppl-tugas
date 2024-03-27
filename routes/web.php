<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/addresses', AddressesController::class)->names([
    'index' => 'addresses.index',
    'store' => 'addresses.store',
]);

Route::resource('/Contact', ContactController::class)->names([
    'index' => 'Contact.index',
    'store' => 'Contact.store',
]);

Route::get('/addresses/create', [AddressesController::class, 'create'])->name('addresses.create');
Route::get('/Contact/create', [ContactController::class, 'create'])->name('Contact.create');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/edit', [AuthController::class, 'editProfile'])->name('edit.profile');
    Route::put('/update-profile', [AuthController::class, 'updateProfile'])->name('update.profile');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});


