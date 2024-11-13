@extends('layouts.app')

@section('title', 'Catálogo - Ticket App')

@section('content')
<div class="container mx-auto p-4">
    <!-- Título de la sección -->
    <header class="my-12 text-center">
        <h1 class="text-4xl font-bold mb-8">Catálogo</h1>
        <h2 class="text-2xl font-semibold mb-8">Peticiones más Frecuentes</h2>
    </header>

    <!-- Contenedor de las tarjetas -->
    <div class="grid grid-cols-3 gap-6">
        @foreach ($servicios as $index => $servicio)
            <a href="{{ url('/ticket/' . ($index + 1)) }}" class="flex items-center bg-gray-100 p-4 rounded-lg 
                shadow-md hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/ticket_' . ($index + 1) . '.jpg') }}" alt="Ticket {{ $index + 1 }}" 
                    class="w-20 h-20 rounded-full mr-4">
                <h3 class="text-xl font-medium">{{ $servicio }}</h3>
            </a>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Estilos del contenedor de las tarjetas */
    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    /* Estilos de las cards */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .card {
        display: flex;
        align-items: center;
        background-color: #f2f2f2;
        padding: 15px;
        border-radius: 8px;
        text-decoration: none;
        color: #333;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .card h3 {
        margin: 0;
        font-size: 18px;
    }
</style>
@endsection