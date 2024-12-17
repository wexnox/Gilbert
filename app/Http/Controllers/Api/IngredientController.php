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

    public function index(Request $request)
    {
        $ingredients = Ingredient::paginate(10); // 10 items per page
        return response()->json($ingredients, 200);
    }

// { combine in this: Example: GET /api/ingredients?nutrient=protein&value=5
//    public function index(Request $request)
//    {
//        $query = Ingredient::query();
//
//        if ($request->has('nutrient')) {
//            $query->whereJsonContains('nutrients->' . $request->nutrient, '>=', $request->value);
//        }
//
//        return response()->json($query->get(), 200);
//    }

// }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'max:255',
            'allergen_info' => 'nullable|json',
            'nutrients' => 'nullable|json',
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
        $ingredient = Ingredient::find($id);
        if (!$ingredient) {
            return response()->json(['error' => 'Ingredient not found'], 404);
        }

        return response()->json($ingredient, 200);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        if (!$ingredient) {
            return response()->json(['error' => 'Ingredient not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'max:255',
            'allergen_info' => 'nullable|json',
            'nutrients' => 'nullable|json',
            'unit_of_measurement' => 'nullable|max:255',
        ]);

        $ingredient->update($validatedData);

        return response()->json($ingredient, 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        if (!$ingredient) {
            return response()->json(['error' => 'Ingredient not found'], 404);
        }

        $ingredient->delete();
        return response()->json(['message' => 'Ingredient deleted'], 200);
    }
}

