<?php

namespace App\Http\Controllers\App;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::paginate());
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

        return new JsonResponse(['message' => 'successfuly deleted.'], Response::HTTP_NO_CONTENT);
    }
}
