@extends('layouts.app')

@section('title', 'Detalle de Ticket - ' . ($ticket['nombre'] ?? 'Seleccione un servicio'))

@section('content')
<div class="container mx-auto p-4">
    <div class="grid grid-cols-4 gap-4">
        <!-- Columna izquierda: Detalles del Ticket -->
        <div class="col-span-3 bg-white p-6 rounded-lg shadow-md">
            <div class="relative">
                <!-- Fondo de color para el nombre del servicio -->
                <div class="bg-blue-500 p-4 pl-6 rounded-lg">
                    <h2 class="text-2xl font-bold">
                        {{ isset($ticket['nombre']) ? $ticket['nombre'] : 'Acceso a Carpetas compartidas' }}
                    </h2>
                </div>
            </div>
            <h3 class="text-lg font-bold mt-4">Petición para: {{ auth()->user()->name }}</h3>
            
            <!-- Formulario -->
            <form action="{{ route('ticket.submit') }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="servicio" class="block font-medium text-gray-700">Seleccione el servicio</label>
                    <select id="servicio" name="servicio" class="mt-1 block w-full rounded-md border-gray-300" 
                        required onchange="this.form.submit()">
                        <option value="">Seleccione</option>
                        <option value="Acceso carpetas compartidas" {{ old('servicio') == 'Acceso carpetas
                            compartidas' ? 'selected' : '' }}>Acceso carpetas compartidas</option>
                        <!-- Puedes añadir más opciones aquí -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="capacidad" class="block font-medium text-gray-700">Capacidad solicitada en MB o GB</label>
                    <input type="text" name="capacidad" id="capacidad" class="mt-1 block w-full rounded-md 
                        border-gray-300" required>
                </div>
                <div class="mb-4">
                    <label for="centro_costo" class="block font-medium text-gray-700">Centro de costo</label>
                    <input type="text" name="centro_costo" id="centro_costo" class="mt-1 block w-full rounded-md
                        border-gray-300" required>
                </div>
                <div class="mb-4">
                    <label for="autorizador" class="block font-medium text-gray-700">Autorizador centro de costo</label>
                    <input type="text" name="autorizador" id="autorizador" class="mt-1 block w-full rounded-md
                        border-gray-300" required>
                </div>
                <div class="mb-4">
                    <label for="usuario_red" class="block font-medium text-gray-700">Usuario de red a quien se le asigna el permiso</label>
                    <input type="text" name="usuario_red" id="usuario_red" class="mt-1 block w-full rounded-md
                        border-gray-300" required>
                </div>
                <div class="mb-4">
                    <label for="cargo" class="block font-medium text-gray-700">Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="mt-1 block w-full rounded-md border-gray-300"required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block font-medium text-gray-700">Describa su solicitud</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md
                        border-gray-300" required></textarea>
                </div>
                
                <!-- Botón para enviar y cancelar -->
                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Enviar Petición</button>
                    <a href="{{ route('catalogo.index') }}" class="bg-gray-400 text-white py-2 px-4 rounded
                        hover:bg-gray-500">Cancelar</a>
                </div>
            </form>
            
            <!-- Información del usuario -->
            <div class="mt-6">
                <h4 class="font-semibold">Usuario:</h4>
                <p>Nombre: {{ auth()->user()->name }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
            </div>
            
            <!-- Adjuntar archivos -->
            <div class="mt-4">
                <label for="archivo" class="block font-medium text-gray-700">Adjuntar archivos</label>
                <input type="file" id="archivo" name="archivo" class="mt-1 block w-full">
            </div>
        </div>
    </div>
</div>
@endsection
