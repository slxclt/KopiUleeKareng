    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Landing Page
Route::get('/', [ProductController::class, 'landing'])
    ->name('landing');

// Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.process');
});

// Halaman khusus pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class)
        ->except(['show']);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
