<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryItemController;
use App\Http\Controllers\SubCategoryItemController;
use App\Http\Controllers\ProductController;

Route::get('/category/enumerate',[CategoryItemController::class,'enumerate']);
Route::get('/category/{name}/enumerateByName',[CategoryItemController::class,'enumerateByName']);

Route::get('/subcategory/{name}/enumerate',[SubCategoryItemController::class,'enumerate']);

Route::get('/category/{slug}/getBySlug',[CategoryItemController::class,'getBySlug']);
Route::get('/subcategory/{slug}/getBySlug',[SubCategoryItemController::class,'getBySlug']);
Route::get('/product/{slug}/getBySlug',[ProductController::class,'getBySlug']);

Route::middleware(['web'])->group(function(){

    Route::post('/category/create',[CategoryItemController::class,'create']);
    Route::post('/subcategory/create',[SubCategoryItemController::class,'create']);
    Route::post('/product/create',[ProductController::class,'create']);
    Route::post('/product/update',[ProductController::class,'update']);

    Route::post('/category/remove');
    Route::post('/subcategory/remove');
    Route::post('/product/remove');

});
