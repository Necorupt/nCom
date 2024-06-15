<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\CategoryItem;
use App\Models\SubCategoryItem;

class CategoryItemController extends Controller
{
    public function enumerate(Request $request) : JsonResponse{
        return response()->json(CategoryItem::all());
    }

    public function enumerateByName(Request $request, $name) : JsonResponse{

        $category = CategoryItem::where("slug", $name)->firstOrFail();

        return response()->json( SubCategoryItem::where("category_id",$category->id)->get());
    }

    public function create(Request $request) : JsonResponse{
        $category = CategoryItem::create($request->all());
        return response()->json($category);
    }

    public function getBySlug(Request $request, $slug) : JsonResponse{
        return response()->json( CategoryItem::where("slug",$slug)->firstOrFail());
    }
}
