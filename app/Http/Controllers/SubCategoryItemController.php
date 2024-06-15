<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Product;
use App\Models\SubCategoryItem;

class SubCategoryItemController extends Controller
{

    public function enumerate(Request $request, $name) : JsonResponse{

        $category = SubCategoryItem::where("slug", $name)->firstOrFail();

        return response()->json( Product::where("subcategory_id",$category->id)->get());
    }

    public function create(Request $request) : JsonResponse{
        $subCategory = SubCategoryItem::create($request->all());
        return response()->json($subCategory);
    }

    public function getBySlug(Request $request, $slug) : JsonResponse{
        return response()->json( SubCategoryItem::where("slug",$slug)->firstOrFail());
    }
}
