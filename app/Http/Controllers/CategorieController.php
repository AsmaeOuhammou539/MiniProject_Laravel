<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /* Récupérer la liste des catégories avec leurs sous-catégories */
    public function index()
    {

        $categories = Categorie::with('subcategories')->get();
        return response()->json($categories);

    }
    /* Récupérer les sous-catégories d'une catégorie */
    public function subcategories($id)
    {
        $category = Categorie::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category->subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
