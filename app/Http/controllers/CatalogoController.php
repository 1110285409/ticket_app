<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



class CatalogoController extends Controller
{
    public function index (){
        // Lista de nombres de los servicios
        $servicios = [
            'Acceso carpetas compartidas',
            'Borrado de Información',
            'Configurar Perfil de Equipos',
            'Crear usuario-Ingreso colaborador nuevo',
            'Falla aplicación de Negocio',
            'Falla de impresión',
            'Falla de aplicaciones de oficina',
            'Falla en Equipo de Cómputo',
            'Firewall (Enrutamiento)',
            'Licencia Office 365',
            'Solicitudes de acceso',
            'Windows',
            'Administrativo',
            'Aplicaciones',
            'Desarrollo',
            'Microinformática',
            'Seguridad'
        ];

        return view('catalogo.catalogo', compact('servicios')); 
    }
    
}