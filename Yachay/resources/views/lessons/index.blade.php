{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Mi Aplicación')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Si tienes CSS compilado, cárgalo aquí --}}
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    {{-- O si no usas Mix/Vite, carga tu propio CSS --}}
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
</head>
<body style="margin:0; padding:0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f7f9fc;">

    {{-- Aquí va el contenido específico de cada vista --}}
    @yield('content')

</body>
</html>


{{-- resources/views/lessons/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Lecciones')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: flex-start; min-height: 100vh; padding: 20px;">
    {{-- DIV de prueba para comprobar que esta vista se está cargando --}}
    <div style="background: red; color: white; padding: 8px 16px; margin-bottom: 16px;">
        VISTA INDEX.CARGADA CORRECTAMENTE
    </div>

    <div style="width: 100%; max-width: 700px; background: #ffffff; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); overflow: hidden;">
        <div style="background: #4f46e5; padding: 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 32px; color: #ffffff;">Lecciones</h1>
        </div>
        <div style="padding: 24px; text-align: center;">
            <a href="{{ route('lessons.create') }}"
               style="display: inline-block; margin-bottom: 16px; padding: 12px 24px; background: #4f46e5; color: #ffffff; text-decoration: none; font-weight: 600; border-radius: 6px; transition: background 0.3s;">
                + Nueva lección
            </a>

            @if(session('success'))
                <div style="margin-bottom: 16px; padding: 12px; background: #d1fae5; color: #065f46; border-radius: 6px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($lessons->isEmpty())
                <p style="color: #6b7280; font-size: 18px;">No hay lecciones disponibles.</p>
            @else
                <table style="width: 100%; border-collapse: collapse; margin-top: 16px;">
                    <thead>
                        <tr>
                            <th style="text-align: left; padding: 12px; border-bottom: 2px solid #e5e7eb;">Título</th>
                            <th style="text-align: center; padding: 12px; border-bottom: 2px solid #e5e7eb;">Nivel</th>
                            <th style="text-align: center; padding: 12px; border-bottom: 2px solid #e5e7eb;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                        <tr style="transition: background 0.2s;">
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                <a href="{{ route('lessons.show', $lesson) }}" style="color: #4f46e5; text-decoration: none; font-weight: 500;">
                                    {{ $lesson->title }}
                                </a>
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #e5e7eb; text-transform: capitalize; color: #374151;">
                                {{ $lesson->level }}
                            </td>
                            <td style="padding: 12px; text-align: center; border-bottom: 1px solid #e5e7eb;">
                                <a href="{{ route('lessons.edit', $lesson) }}"
                                   style="margin-right: 8px; padding: 6px 12px; background: #fbbf24; color: #1f2937; text-decoration: none; border-radius: 4px; font-size: 14px;">
                                    Editar
                                </a>
                                <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas eliminar esta lección?');"
                                        style="padding: 6px 12px; background: #ef4444; color: #ffffff; border: none; border-radius: 4px; font-size: 14px; cursor: pointer;">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
