<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::post("add-subscriber", [PageController::class, 'add_subscriber']);
Route::get('/lang', [PageController::class, 'lang']);
Route::get('/{slug1?}/{slug2?}/{slug3?}', [PageController::class, 'slug']);