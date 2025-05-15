@extends('layouts.app')

@section('title', 'Crear Lección')

@section('content')
  <h1>Crear Nueva Lección</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('lessons.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" name="title" id="title" class="form-control"
             value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
      <label for="content" class="form-label">Contenido</label>
      <textarea name="content" id="content" rows="6" class="form-control"
                required>{{ old('content') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
