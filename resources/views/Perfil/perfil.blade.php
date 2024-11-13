@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
<div class="container mt-5">
    <header class="text-center mb-5">
        <h1 class="display-4">Perfil de {{ Auth::user()->nombre ?? 'Usuario' }} {{ Auth::user()->apellido ?? '' }}</h1>
    </header>
    <div class="text-center">
        <div class="perfil-foto mb-4">
            <img src="{{ Auth::user()->foto ?? 'default.jpg' }}" alt="Foto de {{ Auth::user()->nombre ?? 'Usuario' }}"
                 class="rounded-circle img-thumbnail mx-auto d-block mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #007bff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="d-flex justify-content-center mt-3">
                <a href="#" class="mt-6 inline-block bg-white text-blue-600 font-semibold py-2 px-4 rounded 
                    hover:bg-blue-500 hover:text-white transition duration-300 me-2">
                    <i class="fas fa-upload"></i> Cargar Imagen
                </a>
                <a href="#" class="mt-6 inline-block bg-white text-blue-600 font-semibold py-2 px-4 rounded 
                    hover:bg-blue-500 hover:text-white transition duration-300">
                    <i class="fas fa-trash-alt"></i> Quitar Imagen
                </a>
            </div>
        </div>
        <div class="info-usuario text-start mb-4" style="max-width: 600px; margin: 0 auto; text-align: left;">
            <div class="form-group mb-4">
                <label for="nombre"><strong>Nombre:</strong></label>
                <input type="text" class="form-control rounded-pill auto-size mb-3" id="nombre" value="
                    {{ Auth::user()->nombre ?? '' }}" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="apellido"><strong>Apellido:</strong></label>
                <input type="text" class="form-control rounded-pill auto-size mb-3" id="apellido" value="
                    {{ Auth::user()->apellido ?? '' }}" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="email"><strong>Email:</strong></label>
                <input type="text" class="form-control rounded-pill auto-size mb-3" id="email" value="
                    {{ Auth::user()->email ?? '' }}" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="telefono"><strong>Teléfono:</strong></label>
                <input type="text" class="form-control rounded-pill auto-size mb-3" id="telefono" value="
                    {{ Auth::user()->telefono ?? '' }}" readonly>
            </div>
        </div>
        <form class="mt-4" style="max-width: 600px; margin: 0 auto; text-align: left;">
            <div class="form-group mb-4">
                <label for="current-password"><strong>Contraseña Anterior:</strong></label>
                <input type="password" class="form-control rounded-pill auto-size mb-3" id="current-password" 
                    placeholder="Ingrese su contraseña anterior">
            </div>
            <div class="form-group mb-4">
                <label for="new-password"><strong>Nueva Contraseña:</strong></label>
                <input type="password" class="form-control rounded-pill auto-size mb-3" id="new-password" 
                    placeholder="Ingrese su nueva contraseña">
            </div>
            <div class="form-group mb-4">
                <label for="confirm-password"><strong>Confirmar Contraseña:</strong></label>
                <input type="password" class="form-control rounded-pill auto-size mb-3" id="confirm-password" 
                    placeholder="Confirme su nueva contraseña">
            </div>
            <div class="text-center">
                <a href="#" class="mt-6 inline-block bg-white text-blue-600 font-semibold py-2 px-4 rounded 
                    hover:bg-blue-500 hover:text-white transition duration-300">
                    <i class="fas fa-save"></i> Guardar Cambios
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
.auto-size {
    display: inline-block;
    width: 100%; /* Asegura que todos los campos tengan el mismo ancho */
    padding: 0.375rem 0.75rem;
    border-radius: 50px; /* Aumenta el radio del borde para hacerlo más redondeado */
}
</style>