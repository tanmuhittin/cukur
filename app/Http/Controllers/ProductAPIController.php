<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
 
class ProductAPIController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::paginate());
    }
 
    public function show(Product $product)
    {
        return new ProductResource($product->load(['stories']));
    }

    public function store(Request $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
