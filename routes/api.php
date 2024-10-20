<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('kategoris', KategoriController::class);
Route::apiResource('bukus', BukuController::class);
// Pastikan route search berada sebelum resource routes
Route::get('bukus/search', [BukuController::class, 'search']);
Route::resource('bukus', BukuController::class);
