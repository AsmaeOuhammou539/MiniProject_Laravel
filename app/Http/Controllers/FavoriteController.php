<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favoriteProducts()
                         ->with('category', 'user')
                         ->get()
                         ->map(function ($product) {
                             return [
                                 'id' => $product->pivot  ? $product->pivot->id : null,
                                 'product_id' => $product->id,
                                 'product' => $product
                             ];
                         });
        
        return response()->json($favorites);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $user = Auth::user();
        $productId = $request->product_id;

        // Check if favorite already exists
        if ($user->favoriteProducts()->where('product_id', $productId)->exists()) {
            return response()->json([
                'message' => 'Product is already in favorites',
                'is_favorite' => true
            ], 200);
        }

        // Add to favorites
        $user->favoriteProducts()->attach($productId);

        return response()->json([
            'message' => 'Product added to favorites',
            'is_favorite' => true
        ], 201);
    }

    public function destroy($productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        if (!$user->favoriteProducts()->where('product_id', $productId)->exists()) {
            return response()->json([
                'message' => 'Product not in favorites',
                'is_favorite' => false
            ], 404);
        }

        $user->favoriteProducts()->detach($productId);

        return response()->json([
            'message' => 'Product removed from favorites',
            'is_favorite' => false
        ]);
    }
}