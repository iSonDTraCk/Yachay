@extends('layouts.app')

@section('title', 'Panel del Profesor')

@section('content')
<div style="padding: 40px; font-family: 'Segoe UI', sans-serif;">
    <h1 style="font-size: 28px; color: #4f46e5;">Bienvenido, Profesor</h1>
    <p style="margin-top: 12px; font-size: 16px;">Desde aquí puedes crear, editar y eliminar lecciones.</p>

    <a href="{{ route('lessons.index') }}"
       style="display: inline-block; margin-top: 24px; padding: 12px 24px; background: #4f46e5; color: white; text-decoration: none; border-radius: 6px;">
        Ver Lecciones
    </a>
</div>
@endsection
