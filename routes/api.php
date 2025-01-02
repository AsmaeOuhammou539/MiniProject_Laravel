<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;

// Route pour enregistrer un utilisateur
Route::post('/users', [UserController::class, 'store']);

// Route pour se connecter
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route pour se déconnecter
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Route pour récupérer les catégories avec leurs sous-catégories
Route::get('/categories', [CategorieController::class, 'index']);


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
