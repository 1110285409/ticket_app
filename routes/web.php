<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\actividadController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect()->route('login.index'); 
});

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route ::get('/register', [RegisterController::class,'create']) 
    ->name ('register.index');

    Route ::post('/register', [RegisterController::class,'store']) 
    ->name ('register.store');

Route ::get('/login', [SessionsController::class,'create']) 
    ->name ('login.index');

    Route ::post( '/login', [SessionsController::class,'store']) 
    ->name ('login.store');

    Route ::get('/home', [homeController::class,'create']) 
    ->name ('home.index');

    Route ::get('/actividad', [actividadController::class,'create']) 
    ->name ('actividad.index');

    Route::get('/catalogo', [CatalogoController::class, 'index'])
    ->name('catalogo.index');


    Route ::get('/logout', [SessionsController::class,'destroy']) 
    ->name ('login.destroy');

    Route::get('/perfil', [PerfilController::class, 'perfil']);
    Route::post('/perfil', [PerfilController::class, 'update']);

    //tickets
    Route::get('/ticket/request', [TicketController::class, 'requestForm'])->name('ticket.request');

    Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('/ticket/request/{id}', [TicketController::class, 'requestForm'])->name('ticket.requestForm');
    Route::post('/ticket/submit', [TicketController::class, 'submit'])->name('ticket.submit');