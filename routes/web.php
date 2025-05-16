<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\AggregateServiceProvider;

Route::get('/', function () {
    return view('home');
});
