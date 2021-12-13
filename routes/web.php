<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Carbon\Carbon;
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
   

    $today = Carbon::today();
    $today1 = Carbon::parse($today);

    $tomorrow = Carbon::tomorrow(); 
    $tomorrow1 = Carbon::parse($tomorrow);


$info="";

    $datedebut = Carbon::parse('12/11/2021 00:00:00');

    $datefin = Carbon::parse('12/12/2021 10:20:00');

    if($today1->gt( $datedebut))
         {
             if($datefin->gt($today1))
             {
                $info="formation en cours...";
                return view('welcome',compact('info'));
             }
             else if($today1->gt($datefin))
             {
                $info="formation terminer";
                return view('welcome',compact('info'));
             }

       
    }
    else if( $datedebut->gt($today1))
    {
    $info="pas diponible";
        return view('welcome',compact('info'));
    }
    else if($datedebut->eq($today1))
    {

       $info="Ajourd'hui";
        return view('welcome',compact('info'));
    }
     
        
    
   
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
