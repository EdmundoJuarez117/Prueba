<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CmodalidadController;
use App\Http\Controllers\CcarreraController;
use App\Http\Controllers\CplanestudioController;
use App\Http\Controllers\CescalaevalController;
use App\Http\Controllers\ReportController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [LoginController::class, 'showLoginForm']);

// Auth::routes();
Auth::routes([
		'register' => false,
		'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/plantilla', [App\Http\Controllers\TemplateController::class, 'index'])->name('plantilla');

// Route::resource('/modalidades', CmodalidadController::class)->middleware('can:modalidades.index')->name("*", 'modalidades');
Route::get('/modalidades/{offset}/{data}', [CmodalidadController::class, 'index'])->name('/modalidades/{offset}/{data}');

Route::get('/carreras/{offset}/{data}', [CcarreraController::class, 'index'])->name('/carreras/{offset}/{data}');

Route::get('/planestudios/{offset}/{data}', [CplanestudioController::class, 'index'])->name('/planestudios/{offset}/{data}');

Route::get('/escalaevals/{offset}/{data}',[CescalaevalController::class, 'index'])->name('/escalaevals/{offset}/{data}');

Route::resource('/modalidades', CmodalidadController::class)->name("*", 'modalidades');

Route::resource('/carreras', CcarreraController::class)->name("*", 'carreras');

Route::resource('/planestudios', CplanestudioController::class)->name("*", 'planestudios');

Route::resource('/escalaevals', CescalaevalController::class)->name("*", 'escalaevals');

Route::get('report_example', [ReportController::class, 'example'])->name('report_example');
