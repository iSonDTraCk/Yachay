{{-- filepath: c:\xampp\htdocs\Yachay\Yachay\resources\views\welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="welcome-container">
    {{-- Fondo con opacidad --}}
    <div class="welcome-background"></div>

    {{-- Contenedor principal --}}
    <div class="welcome-content">
        <h1 class="welcome-title">YACHAY</h1>
        <h2 class="welcome-subtitle">Selecciona tu rol</h2>

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('acceso.login') }}">
            @csrf

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" maxlength="8" required pattern="\d{8}" placeholder="Ingresa tu DNI" class="form-input">
                @error('dni')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required placeholder="Ingresa tu contraseña" class="form-input">
                @error('password')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="rol">Rol:</label><br>
                <label><input type="radio" name="rol" value="alumno" required> Alumno</label>
                <label><input type="radio" name="rol" value="profesor"> Profesor</label>
                @error('rol')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

        <div class="register-links">
            <p>¿No tienes cuenta?</p>
            <a href="{{ route('acceso.registro', ['rol' => 'alumno']) }}">Crear como Alumno</a>
            <a href="{{ route('acceso.registro', ['rol' => 'profesor']) }}">Crear como Profesor</a>
        </div>
    </div>
</div>
@endsection