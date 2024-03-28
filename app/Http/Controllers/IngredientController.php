<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/ingredients",
     *     tags={"Ingredients"},
     *     summary="List all ingredients",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Ingredient")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $ingredients = Ingredient::all();
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
    /**
     * @OA\Post(
     *     path="/api/ingredients",
     *     tags={"Ingredients"},
     *     summary="Create a new ingredient",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Ingredient")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ingredient created",
     *         @OA\JsonContent(ref="#/components/schemas/Ingredient")
     *     )
     * )
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

    /**
     * @OA\Get(
     *     path="/api/ingredients/{id}",
     *     tags={"Ingredients"},
     *     summary="Get a single ingredient",
     *     description="Retrieves details of a specific ingredient by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="The ingredient ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Ingredient")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ingredient not found"
     *     )
     * )
     */
    public function show(string $id)
    {
        $ingredient = Ingredient::findOrFail($id);
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
    /**
     * @OA\Put(
     *     path="/api/ingredients/{id}",
     *     tags={"Ingredients"},
     *     summary="Update an ingredient",
     *     description="Updates the details of an existing ingredient",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="The ingredient ID"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Ingredient object with updated data",
     *         @OA\JsonContent(ref="#/components/schemas/Ingredient")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ingredient updated"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ingredient not found"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
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
    /**
     * @OA\Delete(
     *     path="/api/ingredients/{id}",
     *     tags={"Ingredients"},
     *     summary="Delete an ingredient",
     *     description="Removes an ingredient from the collection",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="The ingredient ID"
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Ingredient deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ingredient not found"
     *     )
     * )
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
