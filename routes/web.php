<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('contact', [PagesController::class, 'contact'])->name('contact');
Route::get('about', [PagesController::class, 'about'])->name('about');

// Route::get('/admin-page', [AdminPagesController::class, 'admin'])->name('admin');
Route::get('dashboard', [AdminPagesController::class, 'dashboard'])
->name('dashboard')
->middleware('auth');

Route::get('/sales-filter/{filter}', [AdminPagesController::class, 'SalesFilter'])
->name('sales')
->middleware('auth');

Route::get('/revenue-filter/{filter}', [AdminPagesController::class, 'RevenueFilter'])
->name('revenue')
->middleware('auth');

Route::get('/user-filter/{filter}', [AdminPagesController::class, 'UserFilter'])
->name('user')
->middleware('auth');

Route::get('/recent-filter/{filter}', [AdminPagesController::class, 'RecentFilter'])
->name('recent')
->middleware('auth');

Route::get('/top-filter/{filter}', [AdminPagesController::class, 'TopFilter'])
->name('top')
->middleware('auth');


Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('orders', OrderController::class)->middleware('auth');
Route::resource('items', OrderItemController::class)->middleware('auth');
Route::resource('carts', CartController::class)->middleware('auth');
Route::resource('reviews', ReviewController::class)->middleware('auth');

// auth 

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('signup', [AuthController::class, 'signUp'])->name('signup');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('signin', [AuthController::class, 'signIn'])->name('signin');

// Log out

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
