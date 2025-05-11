@extends('layouts.app')
@section('content')
    <h1>Editar lección</h1>
    <form method="POST" action="{{ route('lessons.update', $lesson) }}">
        @method('PUT')
        @include('lessons.form')
    </form>
@endsection
