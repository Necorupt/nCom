<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use HasApiTokens , AuthorizesRequests, ValidatesRequests;
}
