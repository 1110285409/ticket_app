@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
<div class="container">
    <header class="my-12 text-center">
        <h1 class="text-4xl font-bold mb-8">Perfil de Usuario</h1>
    </header>
    <div class="flex justify-center mb-8">
        <div class="relative">
            @if($user->photo)
                <img id="photo-preview" src="{{ asset('storage/' . $user->photo) }}" alt="Foto de {{ $user->name }}" class="w-48 h-48 rounded-full object-cover">
            @else
                <div id="photo-preview" class="w-48 h-48 bg-gray-300 rounded-full flex items-center justify-center text-4xl font-bold text-white">
                    {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr($user->surname, 0, 1)) }}
                </div>
            @endif
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 hover:opacity-100 transition-opacity cursor-pointer">
                <i class="fas fa-camera text-white text-2xl"></i>
                <span class="text-white ml-2">Subir Foto</span>
            </div>
            <input type="file" id="photo" name="photo" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewPhoto(event)">
        </div>
    </div>
    <div class="flex justify-center mb-8">
        <button onclick="document.getElementById('photo').click()" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600 mr-4">Cargar Foto</button>
        <form action="/perfil/quitar-foto" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Quitar Foto</button>
        </form>
    </div>
    <form action="/perfil" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="surname" class="block text-gray-700">Apellido:</label>
            <input type="text" name="surname" value="{{ $user->surname }}" class="block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="block w-full p-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed" disabled>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Teléfono:</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700">Dirección:</label>
            <input type="text" name="address" value="{{ $user->address }}" class="block w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="bio" class="block text-gray-700">Biografía:</label>
            <textarea name="bio" class="block w-full p-2 border border-gray-300 rounded">{{ $user->bio }}</textarea>
        </div>
        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">Actualizar</button>
    </form>
    @if (session('success'))
        <p class="text-green-500 mt-4">{{ session('success') }}</p>
    @endif

    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Cambiar Contraseña</h2>
        <form action="/perfil/cambiar-password" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="current_password" class="block text-gray-700">Contraseña Actual:</label>
                <input type="password" name="current_password" class="block w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-gray-700">Nueva Contraseña:</label>
                <input type="password" name="new_password" class="block w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-gray-700">Confirmar Nueva Contraseña:</label>
                <input type="password" name="new_password_confirmation" class="block w-full p-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">Cambiar Contraseña</button>
        </form>
    </div>
</div>

<script>
function previewPhoto(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('photo-preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection