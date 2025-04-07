<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Subcategorie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('user', 'category')->get();
        return response()->json($products);
    }

    public function getProductsByCategory($categoryId)
    {
        $products = Product::with('user', 'category')
            ->where('category_id', $categoryId)
            ->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found for this category'], 404);
        }

        return response()->json($products);
    }

    
    public function getProductsBySubCategory($categoryId)
    {
        // Charger les sous-catégories liées à la catégorie donnée
        $subCategories = Subcategorie::where('category_id', $categoryId)->get();

        if ($subCategories->isEmpty()) {
            return response()->json(['message' => 'No subcategories found for this category'], 404);
        }

        // Récupérer les produits pour chaque sous-catégorie
        $subCategoriesWithProducts = $subCategories->map(function ($subCategory) {
            $subCategory->products = Product::where('sub_category_id', $subCategory->id)->get();
            return $subCategory;
        });

        // Vérifier si des produits ont été trouvés pour chaque sous-catégorie
        $subCategoriesWithProducts->each(function ($subCategory) {
            if ($subCategory->products->isEmpty()) {
                $subCategory->products = [];
            }
        });

        return response()->json([
            'category_id' => $categoryId,
            'subcategories' => $subCategoriesWithProducts,
        ]);
    }


    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'phone_number' => 'required|string|max:20',
            'ville' => 'required|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        // Obtenir l'utilisateur connecté
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié'], 401);
        }
    
        // Gérer le stockage de l'image
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('images', 'public');
            $validatedData['image_url'] = $path;
        }
    
        // Associer l'utilisateur connecté et créer le produit
        $product = $user->products()->create($validatedData);
    
        // Retourner une réponse JSON avec le produit créé
        return response()->json($product, 201);
    }
 


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        return response()->json($product);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $product = Product::findOrFail($id);

    if ($product->user_id !== auth()->id()) {
        return response()->json(['message' => 'You do not have permission to update this product'], 403);
    }

    $validatedData = $request->validate([
        'category_id' => 'sometimes|exists:categories,id',
        'sub_category_id' => 'sometimes|exists:subcategories,id',
        'name' => 'sometimes|string|max:255',
        'description' => 'sometimes|string',
        'price' => 'sometimes|numeric|min:0',
        'phone_number' => 'sometimes|string|max:20',
        'ville' => 'sometimes|string',
        'image_url' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image_url')) {
        $path = $request->file('image_url')->store('images', 'public');
        $validatedData['image_url'] = $path;
    }

    $product->update($validatedData);

    return response()->json($product);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->user_id !== auth()->id()) {
            return response()->json(['message' => 'You do not have permission to delete this product'], 403);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
    public function checkFavorite($productId)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['is_favorite' => false]);
        }

        $isFavorite = $user->favoriteProducts()
            ->where('product_id', $productId)
            ->exists();

        return response()->json(['is_favorite' => $isFavorite]);
    }
}
