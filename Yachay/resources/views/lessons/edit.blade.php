@extends('layouts.app')

@section('title', 'Editar Lección')

@section('content')
  <h1>Editar Lección</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('lessons.update', $lesson) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" name="title" id="title" class="form-control"
             value="{{ old('title', $lesson->title) }}" required>
    </div>

    <div class="mb-3">
      <label for="content" class="form-label">Contenido</label>
      <textarea name="content" id="content" rows="6" class="form-control" required>
        {{ old('content', $lesson->content) }}
      </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
