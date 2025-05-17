@extends('layouts.app') 

@section('content')
<div>
    <h2 class="mb-4 text-center"><i class="fas fa-book-reader"></i> Ñawinchay (Mi Aprendizaje)</h2>

    {{-- Buscador y Filtros --}}
    <div class="d-flex flex-wrap align-items-center gap-2 mb-4">
        <input type="text" class="form-control flex-grow-1" placeholder="Maskhay k'achaykuna (Buscar curso)">
        <select class="form-select w-auto">
            <option selected>Yachay Wasi: Todos</option>
        </select>
        <select class="form-select w-auto">
            <option selected>Tipo: Todos</option>
        </select>
    </div>

    {{-- Sección PRINCIPIANTE --}}
    <h4 class="mb-3 text-primary"><i class="fas fa-seedling"></i> Nivel: Principiante</h4>
    <div class="scroll-wrapper mb-5">
        <div class="scroll-container d-flex flex-nowrap gap-3">
            @for ($i = 1; $i <= 4; $i++)
            <div class="card shadow-sm flex-shrink-0" style="width: 300px;">
                <div class="card-body text-center">
                    <div class="fs-1 text-success mb-2"><i class="fas fa-language"></i></div>
                    <span class="badge bg-success mb-2">PRINCIPIANTE</span>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-university"></i> Universidad Continental</h6>
                    <h5 class="card-title">Quechua I: Frases Básicas {{$i}}</h5>
                    <p class="card-text">Aprende saludos, presentaciones y expresiones esenciales en Quechua.</p>
                    <a href="#" class="btn btn-outline-success btn-sm mt-2">Ver más</a>
                </div>
                <div class="card-footer text-center text-muted">
                    <i class="far fa-calendar-alt"></i> 01 May - 30 Jun
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- Sección INTERMEDIO --}}
    <h4 class="mb-3 text-warning"><i class="fas fa-comments"></i> Nivel: Intermedio</h4>
    <div class="scroll-wrapper mb-5">
        <div class="scroll-container d-flex flex-nowrap gap-3">
            @for ($i = 1; $i <= 4; $i++)
            <div class="card shadow-sm flex-shrink-0" style="width: 300px;">
                <div class="card-body text-center">
                    <div class="fs-1 text-warning mb-2"><i class="fas fa-comments"></i></div>
                    <span class="badge bg-warning text-dark mb-2">INTERMEDIO</span>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-chalkboard-teacher"></i> Yachay Wasi</h6>
                    <h5 class="card-title">Quechua II: Conversaciones Cotidianas {{$i}}</h5>
                    <p class="card-text">Aprende a construir diálogos cotidianos y mejora tu comprensión oral en Quechua.</p>
                    <a href="#" class="btn btn-outline-warning btn-sm mt-2">Ver más</a>
                </div>
                <div class="card-footer text-center text-muted">
                    <i class="far fa-calendar-alt"></i> 01 Jul - 31 Ago
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- Sección AVANZADO --}}
    <h4 class="mb-3 text-danger"><i class="fas fa-brain"></i> Nivel: Avanzado</h4>
    <div class="scroll-wrapper mb-5">
        <div class="scroll-container d-flex flex-nowrap gap-3">
            @for ($i = 1; $i <= 3; $i++)
            <div class="card shadow-sm flex-shrink-0" style="width: 300px;">
                <div class="card-body text-center">
                    <div class="fs-1 text-danger mb-2"><i class="fas fa-brain"></i></div>
                    <span class="badge bg-danger mb-2">AVANZADO</span>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-school"></i> AI Academy</h6>
                    <h5 class="card-title">Quechua III: Narración y Cultura {{$i}}</h5>
                    <p class="card-text">Explora leyendas, cuentos y expresiones culturales del mundo andino.</p>
                    <a href="#" class="btn btn-outline-danger btn-sm mt-2">Ver más</a>
                </div>
                <div class="card-footer text-center text-muted">
                    <i class="far fa-calendar-alt"></i> 01 Sep - 31 Oct
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

{{-- Estilos personalizados --}}
<style>
    /* Scroll horizontal para tarjetas */
    .scroll-wrapper {
        overflow-x: auto;
        overflow-y: hidden;
        padding-bottom: 10px;
        scrollbar-width: thin;
        scrollbar-color: #adb5bd transparent;
        max-width: 100%;
    }

    .scroll-container {
        display: flex;
        flex-wrap: nowrap;
        gap: 1rem;
        overflow: visible;
        padding-top: 20px;
    }

    .scroll-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .scroll-wrapper::-webkit-scrollbar-thumb {
        background: #adb5bd;
        border-radius: 10px;
    }

    .scroll-wrapper::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Scroll vertical para todo el body */
    html, body {
        height: 100%;
        overflow-y: auto;
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    body::-webkit-scrollbar {
        width: 8px;
    }

    body::-webkit-scrollbar-thumb {
        background: #adb5bd;
        border-radius: 10px;
    }

    body::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Tarjetas */
    .card {
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        z-index: 1;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        z-index: 2;
    }
</style>
@endsection