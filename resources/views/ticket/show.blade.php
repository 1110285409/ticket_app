@extends('layouts.app')

@section('title', 'Detalle de Ticket - ' . $ticket['nombre'])

@section('content')
<div class="container mx-auto p-4">
    <div class="grid grid-cols-4 gap-4">
        <!-- Columna izquierda: Detalles del Ticket -->
        <div class="col-span-3 bg-white p-6 rounded-lg shadow-md">
            <div class="relative">
                <!-- Fondo de color para el nombre del servicio -->
                <div class="bg-blue-500 p-4 pl-6 rounded-lg">
                    <h2 class="text-2xl font-bold">{{ $ticket['nombre'] }}</h2>
                </div>
            </div>
            <h3 class="font-bold text-lg mt-4">Descripción</h3>
            <p class="text-gray-700 mt-4">{{ $ticket['descripcion'] }}</p>

            <!-- Calificaciones y revisiones -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold">Calificaciones y Revisiones</h3>
                <div class="flex items-center">
                    @php
                        $promedio = array_sum($calificaciones) / count($calificaciones);
                    @endphp
                    <p class="mr-2 text-yellow-500">Promedio: {{ number_format($promedio, 1) }} ⭐️</p>
                </div>

                <!-- Comentario -->
                <div class="mt-4">
                    <h4 class="font-semibold">Comentario:</h4>
                    <p class="text-gray-600">{{ $ticket['comentario'] ?? 'Sin comentarios' }}</p>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Botón y usuario -->
        <div class="col-span-1 bg-gray-200 p-4 rounded-lg shadow-md">
            <button class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-blue-600" 
                onclick="window.location.href='{{ url('/ticket/request/' . $id) }}'">
                Pedir Ticket
            </button>
            <div class="mt-6">
                <h4 class="font-semibold">Usuario</h4>
                <p>Nombre: {{ auth()->user()->name }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</div>
@endsection