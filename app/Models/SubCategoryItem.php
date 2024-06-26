<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category_id",
        "slug",
        "image_url"
    ];
}
