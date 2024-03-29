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
        // replaced with sendResponse
        return response()->json($ingredients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: Add Create
        // Return a view for creating a new ingredient, typically used for web routes
        return view('ingredients.create');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ingredient = Ingredient::findOrFail($id);

        // Return a view for editing the ingredient, typically used for web routes
        return view('ingredients.edit', compact('ingredient'));
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
/**
 * @OA\Schema(
 *     schema="Ingredient",
 *     type="object",
 *     title="Ingredient",
 *     description="An ingredient object",
 *     properties={
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             description="The unique identifier of an ingredient"
 *         ),
 *         @OA\Property(
 *             property="name",
 *             type="string",
 *             description="The name of the ingredient"
 *         ),
 *         @OA\Property(
 *             property="type",
 *             type="string",
 *             description="The type or category of the ingredient"
 *         ),
 *         @OA\Property(
 *             property="unit_of_measurement",
 *             type="string",
 *             description="The unit of measurement for the ingredient"
 *         ),
 *         @OA\Property(
 *             property="recipes",
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Recipe"),
 *             description="The list of recipes that use this ingredient"
 *         )
 *     }
 * )
 */
