<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Product;

class ProductController extends Controller
{
    public function getBySlug(Request $request, $slug): JsonResponse
    {
        return response()->json(Product::where("slug", $slug)->firstOrFail());
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        $file = $request->file('image')->store('images');

        $product = Product::create(
            [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'subcategory_id' => $data['subcategory_id'],
                'image_url' => $file
            ]
        );
        return response()->json($product);
    }

    public function update(Request $request) : JsonResponse{
        $data = $request->all();

        $product = Product::findOrFail($data['id']);
        $product->update($data);
        return response()->json($product);
    }

}
