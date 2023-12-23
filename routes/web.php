<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsumAPIController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ConsumAPIController::class, 'index']);
Route::get('/ideas', [ConsumAPIController::class, 'index'])->name('ideas-index');
Route::get('/work', [HomeController::class, 'index_work'])->name('work-index');
Route::get('/about', [HomeController::class, 'index_about'])->name('about-index');
Route::get('/services', [HomeController::class, 'index_services'])->name('services-index');
Route::get('/careers', [HomeController::class, 'index_careers'])->name('careers-index');
Route::get('/contact', [HomeController::class, 'index_contact'])->name('contact-index');