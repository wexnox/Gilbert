<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ingredients'] = Ingredient::latest()->paginate(100);

        return view('ingredient.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'images' => 'required',
        ]);

//        $ingredient = new Ingredient();
//        $ingredient->name = $request->name;
//        $ingredient->excerpt = $request->excerpt;
//        $ingredient->description = $request->description;
//        $ingredient->amount = $request->amount;
//        $ingredient->quantity = $request->quantity;
//        $ingredient->images = $request->images;
//        $ingredient->save();

        Ingredient::create($request->all());

        return redirect()->route('dashboard')->with(' Ingredient has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
//        $ingredient = Ingredient::findOrFail($id);
//
//        return view('ingredient.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
//        return view('ingredient.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        // TODO: add more to validate
//        $request->validate([
//            'name' => 'required'
//        ]);
//
//        $ingredient = Ingredient::find($id);
//        $ingredient->name = $request->name;
//
//
//        return redirect()->route('ingredient.index')->with('success', 'Ingredient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
//        $ingredient->delete();
//
//        return redirect()->route('ingredient.index', 'Ingredient has been deleted successfull');
    }
}
