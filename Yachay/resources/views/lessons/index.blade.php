@extends('layouts.app')

@section('title')
    @if(session('rol') === 'profesor')
        Mis Lecciones
    @else
        Aprender Lecciones
    @endif
@endsection

@section('content')
    <h1>
        @if(session('rol') === 'profesor')
            Mis Lecciones
        @else
            Lecciones Disponibles
        @endif
    </h1>

    @if(session('rol') === 'profesor')
        @if($lessons->isEmpty())
            <p>No tienes ninguna lección aún.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <td>{{ $lesson->title }}</td>
                            <td>
                                <a href="{{ route('lessons.show', $lesson) }}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{ route('lessons.edit', $lesson) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Borrar esta lección?')">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @else
        @if($lessons->isEmpty())
            <p>No hay lecciones disponibles en este momento.</p>
        @else
            <ul class="list-group">
                @foreach($lessons as $lesson)
                    <li class="list-group-item">
                        <a href="{{ route('lessons.show', $lesson) }}">
                            {{ $lesson->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
@endsection
