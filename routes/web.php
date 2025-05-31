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

// Tambahkan route berikut

// User routes
Route::middleware(['auth'])->group(function () {
    Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');
    
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
});
// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Tambahkan route untuk feedback admin
    Route::get('/feedbacks', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/{feedback}', [App\Http\Controllers\Admin\FeedbackController::class, 'show'])->name('feedbacks.show');
    Route::post('/feedbacks/{feedback}/respond', [App\Http\Controllers\Admin\FeedbackController::class, 'respond'])->name('feedbacks.respond');
    
    // Route baru untuk edit dan delete
    Route::get('/feedbacks/{feedback}/edit', [App\Http\Controllers\Admin\FeedbackController::class, 'edit'])->name('feedbacks.edit');
    Route::put('/feedbacks/{feedback}', [App\Http\Controllers\Admin\FeedbackController::class, 'update'])->name('feedbacks.update');
    Route::delete('/feedbacks/{feedback}', [App\Http\Controllers\Admin\FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
});