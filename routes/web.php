<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Console\AboutCommand;
use App\Http\Controllers\PhotoController;

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

// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

#Ubah code
Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

// #Route Name
// Route::get('/user/profile', function () {
//     //
// })->name('profile');
// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');
// // Generating URLs...
// $url = route('profile');
// // Generating Redirects...
// return redirect()->route('profile');

// #Route Group
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });
//     Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });
// });
// Route::domain('{account}.example.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// #Route Prefixes
// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// #Redirect Routes
// Route::redirect('/here', '/there');

// #View Routes
// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

#Modifikasi 2 Prak 2
Route::get('/', [HomeController::class, 'index']);
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
