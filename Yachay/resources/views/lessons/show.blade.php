@extends('layouts.app')
@section('content')
    <h1>{{ $lesson->title }}</h1>
    <p>{{ $lesson->content }}</p>
    <p>Nivel: {{ $lesson->level }}</p>
    <a href="{{ route('lessons.edit', $lesson) }}">Editar</a>
    <a href="{{ route('lessons.index') }}">Volver</a>
@endsection
