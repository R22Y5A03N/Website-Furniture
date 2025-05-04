<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CollectionController;


Route::get('/', [FurnitureController::class, 'index'])->name('landing');
Route::get('/furniture/{id}', [FurnitureController::class, 'show'])->name('furniture.detail');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class);
    });
});
Route::get('/', [FurnitureController::class, 'index'])->name('landing');
Route::get('/furniture/{id}', [FurnitureController::class, 'show'])->name('furniture.detail');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class);
        Route::get('users', [DashboardController::class, 'users'])->name('users');
        Route::get('login-history', [DashboardController::class, 'loginHistory'])->name('login-history');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/collection', [CollectionController::class, 'index'])->name('collection');