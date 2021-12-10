<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth','isAdmin:true'])->group(function()
{
    Route::get('/private',function()
    {
        return view('dashboard');
    });
});


Route::get('/contact',[ContactController::class,'contact']);
Route::get('/video',[ContactController::class,'video']);

Route::post('/videopost',[ContactController::class,'videopost']);
Route::get('/vueimage',[ContactController::class,'vueimage']);

require __DIR__.'/auth.php';
