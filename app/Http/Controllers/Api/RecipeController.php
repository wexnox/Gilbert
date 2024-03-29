<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
    /**
     * Display a listing of the recipes.
     *
     */
    public function index()
    {
        $recipes = Recipe::all();

        return response()->json($recipes);
    }

    /**
     * Store a newly created recipe in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // Add other validation rules as needed
        ]);

        $recipe = Recipe::create($validatedData);

        // Assuming you're receiving a list of ingredient IDs and quantities
        if ($request->has('ingredients')) {
            foreach ($request->ingredients as $ingredient) {
                $recipe->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
            }
        }

        return response()->json($recipe, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::with('ingredients')->findOrFail($id);
        return response()->json($recipe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());

        // Update ingredients if provided
        // You might need to adjust this logic based on how you want to handle ingredient updates
        if ($request->has('ingredients')) {
            $recipe->ingredients()->detach();
            foreach ($request->ingredients as $ingredient) {
                $recipe->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
            }
        }

        return response()->json($recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Recipe::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
