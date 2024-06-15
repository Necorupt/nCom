<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Product;

class ProductController extends Controller
{
    public function getBySlug(Request $request, $slug) : JsonResponse{
        return response()->json( Product::where("slug",$slug)->firstOrFail());
    }

    public function create(Request $request) : JsonResponse{
        $product = Product::create($request->all());
        return response()->json($product);
    }
}
