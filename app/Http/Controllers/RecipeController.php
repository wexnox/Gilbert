<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
    /**
     * @OA\Get(
     *     path="/api/recipes",
     *     tags={"Recipes"},
     *     summary="List all recipes",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Recipe")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $recipes = Recipe::all();
        return response()->json($recipes);
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/recipes",
     *     tags={"Recipes"},
     *     summary="Create a new recipe",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Recipe")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Recipe created",
     *         @OA\JsonContent(ref="#/components/schemas/Recipe")
     *     )
     * )
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        TODO: Add create
        // Return a view for creating a new recipe, typically used for web routes
        return view('recipes.create');
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/recipes/{id}",
     *     tags={"Recipes"},
     *     summary="Get a single recipe",
     *     description="Retrieves details of a specific recipe by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="The recipe ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Recipe")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Recipe not found"
     *     )
     * )
     */
    public function show(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        return response()->json($recipe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        TODO: Add edit
        $recipe = Recipe::findOrFail($id);

        // Return a view for editing the recipe, typically used for web routes
        return view('recipes.edit', compact('recipe'));
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
/**
 * @OA\Schema(
 *     schema="Recipe",
 *     type="object",
 *     title="Recipe",
 *     description="A recipe object",
 *     properties={
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             description="The unique identifier of a recipe"
 *         ),
 *         @OA\Property(
 *             property="title",
 *             type="string",
 *             description="The title of the recipe"
 *         ),
 *         @OA\Property(
 *             property="description",
 *             type="string",
 *             description="A brief description of the recipe"
 *         ),
 *         @OA\Property(
 *             property="preparation_steps",
 *             type="string",
 *             description="The preparation steps of the recipe"
 *         ),
 *         @OA\Property(
 *             property="serving_size",
 *             type="integer",
 *             description="The number of servings the recipe makes"
 *         ),
 *         @OA\Property(
 *             property="cooking_time",
 *             type="integer",
 *             description="The cooking time in minutes"
 *         ),
 *         @OA\Property(
 *             property="ingredients",
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Ingredient"),
 *             description="The list of ingredients used in the recipe"
 *         )
 *     }
 * )
 */
