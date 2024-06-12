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
}
