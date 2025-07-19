<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn() => redirect()->route('provinces.index'));
Route::resource('provinces', ProvinceController::class);
Route::resource('regencies', RegencyController::class);

// Laporan
Route::get('/report/province', [ProvinceController::class, 'report'])->name('report.province');
Route::get('/report/regency', [RegencyController::class, 'report'])->name('report.regency');