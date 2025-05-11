@extends('layouts.app')

@section('title', 'Crear Nueva Lección')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: #f0f4f8;">
    <div style="width: 100%; max-width: 600px; background: #ffffff; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); padding: 32px;">
        <h2 style="text-align: center; color: #4f46e5; margin-bottom: 24px;">Crear Nueva Lección</h2>

        <form method="POST" action="{{ route('lessons.store') }}">
            @csrf

            {{-- Título --}}
            <div style="margin-bottom: 20px;">
                <label for="title" style="display: block; margin-bottom: 8px; color: #374151;">Título de la Lección:</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title') }}"
                       required
                       style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                @error('title')
                    <div style="color: red; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nivel --}}
            <div style="margin-bottom: 20px;">
                <label for="level" style="display: block; margin-bottom: 8px; color: #374151;">Nivel:</label>
                <select name="level" id="level"
                        required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="" disabled selected>Selecciona un nivel</option>
                    <option value="básico" {{ old('level') == 'básico' ? 'selected' : '' }}>Básico</option>
                    <option value="intermedio" {{ old('level') == 'intermedio' ? 'selected' : '' }}>Intermedio</option>
                    <option value="avanzado" {{ old('level') == 'avanzado' ? 'selected' : '' }}>Avanzado</option>
                </select>
                @error('level')
                    <div style="color: red; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botones --}}
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('lessons.index') }}"
                   style="text-decoration: none; padding: 10px 20px; background: #9ca3af; color: white; border-radius: 6px;">
                    Cancelar
                </a>
                <button type="submit"
                        style="padding: 10px 24px; background: #4f46e5; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
