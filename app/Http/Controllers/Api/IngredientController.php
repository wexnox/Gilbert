<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;


class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'unit_of_measurement' => 'nullable|max:255',
        ]);

        $ingredient = Ingredient::create($validatedData);

        return response()->json($ingredient, 201);
    }

    /**
     * Display the specified resource.
     */
    // The edit method usually returns a view for web routes and might not need API documentation

    public function show(string $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        // replaced with sendResponse
        return response()->json($ingredient);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //
        $ingredient = Ingredient::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'unit_of_measurement' => 'nullable|max:255',
        ]);

        $ingredient->update($validatedData);

        return response()->json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return response()->json(null, 204);
    }
}

