@section('title', 'Justificativos de Estudiantes')

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
                <h4 class="card-title">Detalles del justificativo de Nº {{ $justificativo_estudiante->id }} de {{ $justificativo_estudiante->inscripcion->persona->nombre }}
                    {{ $justificativo_estudiante->inscripcion->persona->apellido }}</h4>
                <p class="card-title-desc">Aquí puede ver los detalles del justificativo seleccionado</p>

                <hr style="margin-top: -10px !important;">

                <!-- Detalles -->
                <div class="form-group row">
                    <label for="asignatura" class="col-md-2 col-form-label">Estudiante</label>
                    <div class="col-md-10 mt-2">
                        <a href="/referenciales/documentales/personas/{{ $justificativo_estudiante->inscripcion->persona_id }}">{{ $justificativo_estudiante->inscripcion->persona->nombre }}
                            {{ $justificativo_estudiante->inscripcion->persona->apellido }}</a>
                    </div>

                    <label for="curso" class="col-md-2 col-form-label">Inscripto en</label>
                    <div class="col-md-10 mt-2">
                        <a href="/referenciales/planes/cursos/{{ $justificativo_estudiante->inscripcion->curso_id }}">{{ $justificativo_estudiante->inscripcion->curso->nivel_acronimo }}
                            {{ $justificativo_estudiante->inscripcion->curso->numero }}° "{{ $justificativo_estudiante->inscripcion->curso->seccion->nombre }}"
                            {{ $justificativo_estudiante->inscripcion->curso->turno }} @if($justificativo_estudiante->inscripcion->curso->bachillerato_id)
                            ({{ $justificativo_estudiante->inscripcion->curso->bachillerato->acronimo }}) @endif</a>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Fecha ausente</label>
                    <div class="col-md-10 mt-2">
                        <p name="asignatura">{{ $justificativo_estudiante->asistenciaestudiante->fecha }}</p>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Causa</label>
                    <div class="col-md-10 mt-2">
                        <a href="/referenciales/documentales/causas/{{ $justificativo_estudiante->causa_id }}">{{ $justificativo_estudiante->causa->nombre }}</a>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Descripción</label>
                    <div class="col-md-10 mt-2">
                        <p name="asignatura">{{ $justificativo_estudiante->descripcion }}</p>
                    </div>
                </div>

                <hr style="margin-top: -10px !important;">

                <div class="row" style="margin-bottom: -16px;">
                    <div class="col-sm-2">
                        <label class="">Justificativo ID</label>
                        <p class="text-primary">{{ $justificativo_estudiante->id }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Estado</label>
                        <p class="text-primary">{{ $justificativo_estudiante->estado }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado por</label>
                        <p class="text-primary">{{ $justificativo_estudiante->user->name }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado el</label>
                        <p class="text-primary">{{ $justificativo_estudiante->creado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Actualizado el</label>
                        <p class="text-primary">{{ $justificativo_estudiante->actualizado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Pertenece a la sede de</label>
                        <p class="text-primary">{{ $justificativo_estudiante->inscripcion->curso->sede->nombre }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-start">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/justificativos">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i>Regresar
                            </button>
                        </a>
                    </div>

                    @if ($justificativo_estudiante->estado == 'Activo')
                    <div class="col-12 col-lg-6"></div>

                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/justificativos/{{ $justificativo_estudiante->id }}/edit">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-edit-alt font-size-16 align-middle mr-1"></i> Editar Justificativo
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/justificativos/{{ $justificativo_estudiante->id }}/anull" method="POST"
                            onsubmit="return confirm('¿Está seguro de que desea anular este justificativo?');">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-block font-size-16 align-middle mr-1"></i> Anular Justificativo
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