<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['shoppingcarts'] = ShoppingCart::latest()->paginate(5);

        return view('shoppingcart.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shoppingcart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
        ]);

        ShoppingCart::create($request->all());
//        $shoppingcart = new ShoppingCart();
//        $shoppingcart->name = $request->name;
//        $shoppingcart->excerpt = $request->excerpt;
//        $shoppingcart->description = $request->description;
//        $shoppingcart->save();

        return redirect()->route('shoppingcart.index')->with('Shopping cart has been created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ShoppingCart $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart, $id)
    {
        $shoppingCart = ShoppingCart::findorfail($id);

        return view('ingredient.show', compact('shoppingCart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ShoppingCart $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        return view('shoppingcart.edit', compact('shoppingCart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ShoppingCart $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCart $shoppingCart, $id)
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
        ]);

        $shoppingCart = ShoppingCart::find($id);
        $shoppingCart->name = $request->name;
        $shoppingCart->excerpt = $request->excerpt;
        $shoppingCart->description = $request->description;

        return redirect()->route('shoppingcart.index')->with('Shoppingcart has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ShoppingCart $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        $shoppingCart->delete();

        return redirect()->route('shoppingcart.index', 'Shoppingcart has been sucessfully deleted');
    }
}