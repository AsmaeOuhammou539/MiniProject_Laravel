<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    LoginController,
    AuthController,
    CategorieController,
    ProductController,
    FavoriteController,
    TestController
};

// Public routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/categories', [CategorieController::class, 'index']);
Route::get('/categories/{id}/subcategories', [CategorieController::class, 'subcategories']);
Route::get('/categories/{id}/products', [ProductController::class, 'getProductsByCategory']);
Route::get('/categories/{id}/SubcategorieProducts', [ProductController::class, 'getProductsBySubCategory']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // User routes
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/user/products', [UserController::class, 'products']);
    
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    
    // Product routes
    Route::post('/products', [ProductController::class, 'store']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    
    // Favorite routes
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::delete('/favorites/{productId}', [FavoriteController::class, 'destroy']);
    Route::get('/products/{productId}/is-favorite', [ProductController::class, 'checkFavorite']);
    
    // Message routes
    Route::post('/message', [TestController::class, 'store']);
    Route::get('/messages/received', [TestController::class, 'receivedMessages']);
    Route::get('/messages/conversation/{id}', [TestController::class, 'conversationWithUser']);
    Route::delete('/message/{id}', [TestController::class, 'deleteMessage']);
});