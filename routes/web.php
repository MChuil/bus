<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservarController;
use App\Http\Controllers\SearchController;
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
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/contacto', function(){
    return view('contact');
})->name('contacto');
Route::get('/empresa', function(){
    return view('company');
})->name('empresa');
Route::get('/servicios', function(){
    return view('services');
})->name('servicios');


Route::get('/buscar', [SearchController::class, 'loadSeats'])->name('asientos');
Route::post('/buscar', [SearchController::class, 'index'])->name('buscar');

Route::get('reservar/{id}/{date}/{route_id}', [ReservarController::class, 'index'])->name('reservar');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    
    if(!empty(session('search'))){
        return redirect('buscar');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
