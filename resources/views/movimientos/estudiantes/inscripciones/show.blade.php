@section('title', 'Inscripciones')

@extends('layouts.app')

@section('content')
<!-- Titulo y descripcion -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- Titulo de la pagina -->
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <!-- Ruta de navegacion -->
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Movimientos</li>
                    <li class="breadcrumb-item">Estudiantes</li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- Contenido de la pagina -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Titulo y descripcion de la carta -->
                <h4 class="card-title">Detalles de la inscripción Nº {{ $inscripcion->id }} de {{ $inscripcion->persona->nombre }} {{ $inscripcion->persona->apellido }}</h4>
                <p class="card-title-desc">Aquí puede ver los detalles de la inscripción seleccionada</p>

                <hr style="margin-top: -10px !important;">

                <!-- Detalles -->
                <div class="form-group row">
                    <label for="nivel" class="col-md-2 col-form-label">Inscripto en</label>
                    <div class="col-md-10 mt-2">
                        <p>
                            <a href="/movimientos/planes/cursos/{{ $inscripcion->curso_id }}">{{ $inscripcion->curso->nivel_acronimo }} {{ $inscripcion->curso->numero }}°
                                "{{ $inscripcion->curso->seccion->nombre }}" {{ $inscripcion->curso->turno }} @if($inscripcion->curso->bachillerato_id)
                                ({{ $inscripcion->curso->bachillerato->acronimo }}) @endif</a>
                        </p>
                    </div>

                    <label for="fecha_inscripcion" class="col-md-2 col-form-label">Inscripto el</label>
                    <div class="col-md-10 mt-2">
                        <p name="fecha_inscripcion">{{ $inscripcion->fecha_inscripcion }}</p>
                    </div>

                    <label for="nombre-apellido" class="col-md-2 col-form-label">Nombre y apellido</label>
                    <div class="col-md-10 mt-2">
                        <p>
                            <a href="/referenciales/documentales/personas/{{ $inscripcion->persona_id }}">{{ $inscripcion->persona->nombre }}
                                {{ $inscripcion->persona->apellido }}</a>
                        </p>
                    </div>

                    <label for="procedencia" class="col-md-2 col-form-label">Procedencia</label>
                    <div class="col-md-10 mt-2">
                        <p name="procedencia">{{ $inscripcion->procedencia }}</p>
                    </div>

                    <label for="exonerado" class="col-md-2 col-form-label">Exonerado</label>
                    <div class="col-md-10 mt-2">
                        <p name="exonerado">@if($inscripcion->exonerado == 0) No @else Sí @endif</p>
                    </div>
                </div>

                <hr style="margin-top: -10px !important;">

                <div class="row" style="margin-bottom: -16px;">
                    <div class="col-sm-2">
                        <label class="">Inscripción ID</label>
                        <p class="text-primary">{{ $inscripcion->id }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Estado</label>
                        <p class="text-primary">{{ $inscripcion->estado }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado por</label>
                        <p class="text-primary">{{ $inscripcion->user->name }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado el</label>
                        <p class="text-primary">{{ $inscripcion->creado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Actualizado el</label>
                        <p class="text-primary">{{ $inscripcion->actualizado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Pertenece a la sede de</label>
                        <p class="text-primary">{{ $inscripcion->curso->sede->nombre }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-start">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/inscripciones">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i>Regresar
                            </button>
                        </a>
                    </div>

                    @if ($inscripcion->estado == 'Activo')
                    <div class="col-12 col-lg-6"></div>

                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}/print">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-edit-alt font-size-16 align-middle mr-1"></i> Generar Ficha Académica
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}/anull" method="POST"
                            onsubmit="return confirm('¿Está seguro de que desea anular esta inscripción?');">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-block font-size-16 align-middle mr-1"></i> Anular Inscripción
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection