<?php

use App\Admin\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('admin')->middleware(['auth'])->name('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
});
