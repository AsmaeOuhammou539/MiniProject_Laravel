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
Route::get('/users', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->get('/users/{id}', [UserController::class, 'show']);
Route::middleware('auth:sanctum')->put('/users/{id}', [UserController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/users/{id}', [UserController::class, 'destroy']);
// Récupérer les produits partagés par un utilisateur.
Route::middleware('auth:sanctum')->get('/user/products', [UserController::class, 'products']);

// Route pour se connecter
Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route pour se déconnecter
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
//changer le mot de pass
Route::middleware('auth:sanctum')->post('/change-password', [AuthController::class, 'changePassword']);

// Route pour récupérer les catégories avec leurs sous-catégories
Route::get('/categories', [CategorieController::class, 'index']);
//Récupérer les sous-catégories d'une catégorie
Route::get('/categories/{id}/subcategories', [CategorieController::class, 'subcategories']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/products/{id}', [ProductController::class, 'destroy']);
