<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class actividadController extends Controller
{
public function create (){

return view('actividad.actividad'); 
}
public function pendientes()
{
    // Lógica para obtener actividades pendientes
    // Esto se enlazará con tu base de datos más adelante

    return view('actividad.pendientes');
   
}

public function finalizados()
{
// Lógica para obtener actividades finalizadas
// Esto se enlazará con tu base de datos más adelante

return view('actividad.finalizados');
}
}