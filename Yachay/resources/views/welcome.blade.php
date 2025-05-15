@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }
</style>

<div style="
    position: relative;
    height: 100vh;
    width: 100vw;
    display: flex; 
    justify-content: center; 
    align-items: center; 
    background: none;
    overflow: hidden;
">
    {{-- Fondo con opacidad usando div absoluto --}}
    <div style="
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: url('{{ asset('images/fondo1.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.3;
        z-index: 0;
    "></div>

    {{-- Contenedor principal sobre el fondo --}}
    <div style="
        position: relative;
        background: white;
        padding: 32px;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        max-width: 400px;
        width: 100%;
        z-index: 1;
        overflow: auto;
    ">
        <h1 style="text-align:center; color:#FF00FF; font-weight:bold; margin-bottom:10px;">YACHAY</h1>

        <h2 style="text-align:center; margin-bottom:20px;">Selecciona tu rol</h2>

        @if(session('error'))
            <div style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:6px; margin-bottom:16px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('acceso.login') }}">
            @csrf

            <div style="margin-bottom: 16px;">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" maxlength="8" required pattern="\d{8}" placeholder="Ingresa tu DNI"
                    style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                @error('dni')
                    <div style="color:red; font-size:14px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 16px;">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required placeholder="Ingresa tu contraseña"
                    style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                @error('password')
                    <div style="color:red; font-size:14px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 16px;">
                <label for="rol">Rol:</label><br>
                <label><input type="radio" name="rol" value="alumno" required> Alumno</label>
                <label style="margin-left:20px;"><input type="radio" name="rol" value="profesor"> Profesor</label>
                @error('rol')
                    <div style="color:red; font-size:14px;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                style="width:100%; background:#4f46e5; color:white; padding:10px; border:none; border-radius:6px;">
                Ingresar
            </button>
        </form>

        <div style="text-align:center; margin-top:20px;">
            <p>¿No tienes cuenta?</p>
            <a href="{{ route('acceso.registro', ['rol' => 'alumno']) }}" style="margin-right:10px;">Crear como Alumno</a>
            <a href="{{ route('acceso.registro', ['rol' => 'profesor']) }}">Crear como Profesor</a>
        </div>
    </div>
</div>
@endsection
