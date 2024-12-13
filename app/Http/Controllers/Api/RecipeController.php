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
        $recipes = Recipe::with(['author', 'coAuthors', 'ingredients', 'tasks'])->get();
        return response()->json($recipes, 200);
    }

    /**
     * Store a newly created recipe in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'alternative_titles' => 'nullable|json',
            'author_id' => 'required|exists:authors,id',
            'original_source' => 'nullable|string',
            'thumbnail_image' => 'nullable|string',
            'cover_image' => 'nullable|string',
            'image' => 'nullable|image',
            'description' => 'required|string',
            'preparation_steps' => 'required|string',
            'serving_size' => 'required|integer',
            'cooking_time' => 'required|integer',

        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->store('recipes', 'public');
            $validatedData['image'] = $filename;
        }

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
        $recipe = Recipe::with(['author', 'coAuthors', 'ingredients', 'tasks'])->find($id);
        if (!$recipe) {
            return response()->json(['error' => 'Recipe not found'], 404);
        }

        return response()->json($recipe, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['error' => 'Recipe not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'alternative_titles' => 'nullable|json',
            'author_id' => 'required|exists:authors,id',
            'original_source' => 'nullable|string',
            'thumbnail_image' => 'nullable|string',
            'cover_image' => 'nullable|string',
            'image' => 'nullable|image',
            'description' => 'required|string',
            'preparation_steps' => 'required|string',
            'serving_size' => 'required|integer',
            'cooking_time' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->store('recipes', 'public');
            $validatedData['image'] = $filename;
        }

        $recipe = Recipe::findOrFail($id);
        $recipe->update($validatedData);

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
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['error' => 'Recipe not found'], 404);
        }

        $recipe->delete();
        return response()->json(['message' => 'Recipe deleted'], 200);
    }
}
