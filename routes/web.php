<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Auth/Register');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/marketplace', function () {
    return Inertia::render('Marketplace/Marketplace');
})->name('marketplace');

Route::middleware(['auth:sanctum', 'verified'])->get('/marketplace/new-product', function () {
    return Inertia::render('Marketplace/Components/Form');
})->name('marketplace/new-product');

Route::middleware(['auth:sanctum', 'verified'])->get('/task-list', function () {
    return Inertia::render('TaskList');
})->name('task-list');
