<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('my-name/{name}', function($name){
    return 'My Name Is ' . strtoupper($name);
});


Route::get('pages', [PagesController::class, 'index']);
Route::get('pages/Cek_Saldo', [PagesController::class, 'Cek_Saldo']);
Route::get('pages/Profile', [PagesController::class, 'Profile']);
