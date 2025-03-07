<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Console\AboutCommand;
use App\Http\Controllers\PhotoController;
#Soal Praktikum
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [PageController::class, 'index']); #Modif Prak 2

Route::get('/hello', [WelcomeController::class, 'hello']); #Modif Prak 2

Route::get('/world', function () {
    return 'World';
});

Route::get('/salam', function () {
    return 'Selamat Datang';
});

// Route::get('/about', [PageController::class, 'about']); #Modif Prak 2

Route::get('/user/{nama}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', [PageController::class, 'articles']); #Modif Prak 2

#Ubah code
Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

#Modifikasi 2 Prak 2
// Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);

#Prak 2 Step 8
Route::resource('photos', PhotoController::class);
#Jika tidak semua route pada resource controller dibutuhkan
Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

#Prak 3
// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Alka']);
// });
#Modif
// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Alka']);
// });
#Modif Menampilkan View dari Controller
Route::get('/greeting', [WelcomeController::class, 'greeting']);

#SOAL PRAKTIKUM
// Home
Route::get('/', [HomeController::class, 'index']);
// Category Routes
Route::get('/category/food-beverage', [ProductController::class, 'foodBeverage']);
Route::get('/category/beauty-health', [ProductController::class, 'beautyHealth']);
Route::get('/category/home-care', [ProductController::class, 'homeCare']);
Route::get('/category/baby-kid', [ProductController::class, 'babyKid']);

// Sales (Penjualan)
Route::get('/penjualan', [SaleController::class, 'index']);

// User Profile
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);