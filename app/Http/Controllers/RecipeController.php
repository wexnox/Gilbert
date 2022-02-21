<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['recipes'] = Recipe::latest()->paginate(9);

        return view('recipe.index', ($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'images' => 'required|url',
            'published_at' => 'required',
            'author' => 'required',
        ]);

        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->excerpt = $request->excerpt;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->images = $request->images;
        $recipe->published_at = $request->published_at;
        $recipe->author = $request->author;

        return redirect()->route('recipe.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe, $id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe, $id)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'images' => 'required|url',
            'published_at' => 'required',
            'author' => 'required',
        ]);

        $recipe = Recipe::find($id);
        $recipe->name = $request->name;
        $recipe->excerpt = $request->excerpt;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->images = $request->images;
        $recipe->published_at = $request->published_at;
        $recipe->author = $request->author;

        return redirect()->route('recipe.index')->with('success', 'Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipe.index')->with('success', 'Recipe has been deleted successfull.');
    }
}
