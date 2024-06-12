<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/{vue_capture?}', function() {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');
