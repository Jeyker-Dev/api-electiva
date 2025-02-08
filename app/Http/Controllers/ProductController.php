<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
        ]);

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    /**
     * Display all resources.
     */
    public function show()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $product->delete();

        return response('Product Deleted', 200);
    }
}
