@extends('layouts.app')

@section('title', $lesson->title)

@section('content')
    <h1>{{ $lesson->title }}</h1>
    <div class="mb-4">{!! nl2br(e($lesson->content)) !!}</div>

    @if(session('rol') === 'profesor')
        <a href="{{ route('lessons.edit', $lesson) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('¿Borrar esta lección?')">
                Borrar
            </button>
        </form>
    @endif

    <a href="{{ route('lessons.index') }}" class="btn btn-secondary mt-3">
        @if(session('rol') === 'profesor')
            Volver a Mis Lecciones
        @else
            Volver a Lecciones
        @endif
    </a>
@endsection
