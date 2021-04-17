@section('title', 'Sanciones y Deserciones de Estudiantes')

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
                <h4 class="card-title">Detalles de la @if($sancion_desercion->causa->tipo = 'Sanción') sanción @else deserción @endif de
                    {{ $sancion_desercion->inscripcion->persona->nombre }} {{ $sancion_desercion->inscripcion->persona->apellido }}</h4>
                <p class="card-title-desc">Aquí puede ver los detalles de la @if($sancion_desercion->causa->tipo = 'Sanción') sanción @else deserción @endif seleccionada</p>

                <hr style="margin-top: -10px !important;">

                <!-- Detalles -->
                <div class="form-group row">
                    <label for="asignatura" class="col-md-2 col-form-label">Estudiante</label>
                    <div class="col-md-10 mt-2">
                        <a href="/referenciales/documentales/personas/{{ $sancion_desercion->inscripcion->persona_id }}">{{ $sancion_desercion->inscripcion->persona->nombre }}
                            {{ $sancion_desercion->inscripcion->persona->apellido }}</a>
                    </div>

                    <label for="curso" class="col-md-2 col-form-label">Inscripto en</label>
                    <div class="col-md-10 mt-2">
                        <a href="/movimientos/planes/cursos/{{ $sancion_desercion->inscripcion->curso_id }}">{{ $sancion_desercion->inscripcion->curso->nivel_acronimo }}
                            {{ $sancion_desercion->inscripcion->curso->numero }}° "{{ $sancion_desercion->inscripcion->curso->seccion->nombre }}"
                            {{ $sancion_desercion->inscripcion->curso->turno }} @if($sancion_desercion->inscripcion->curso->bachillerato_id)
                            ({{ $sancion_desercion->inscripcion->curso->bachillerato->acronimo }}) @endif</a>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Fecha</label>
                    <div class="col-md-10 mt-2">
                        <p name="asignatura">{{ $sancion_desercion->fecha }}</p>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Causa</label>
                    <div class="col-md-10 mt-2">
                        <a href="/referenciales/documentales/causas/{{ $sancion_desercion->causa_id }}">{{ $sancion_desercion->causa->nombre }}</a>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Descripción</label>
                    <div class="col-md-10 mt-2">
                        <p name="asignatura">{{ $sancion_desercion->descripcion }}</p>
                    </div>
                </div>

                <hr style="margin-top: -10px !important;">

                <div class="row" style="margin-bottom: -16px;">
                    <div class="col-sm-2">
                        <label class="">@if($sancion_desercion->causa->tipo = 'Sanción') Sanción @else Deserción @endif ID</label>
                        <p class="text-primary">{{ $sancion_desercion->id }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Estado</label>
                        <p class="text-primary">{{ $sancion_desercion->estado }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado por</label>
                        <p class="text-primary">{{ $sancion_desercion->user->name }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado el</label>
                        <p class="text-primary">{{ $sancion_desercion->creado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Actualizado el</label>
                        <p class="text-primary">{{ $sancion_desercion->actualizado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Pertenece a la sede de</label>
                        <p class="text-primary">{{ $sancion_desercion->inscripcion->curso->sede->nombre }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-start">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/sanciones-deserciones">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i>Regresar
                            </button>
                        </a>
                    </div>

                    @if ($sancion_desercion->estado == 'Activo')
                    <div class="col-12 col-lg-4"></div>

                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/print">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-edit-alt font-size-16 align-middle mr-1"></i> Generar Comprobante
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/edit">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-edit-alt font-size-16 align-middle mr-1"></i>
                                Editar @if($sancion_desercion->causa->tipo = 'Sanción') Sanción @else Deserción @endif
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/anull" method="POST"
                            onsubmit="return confirm('¿Está seguro de que desea anular este justificativo?');">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-block font-size-16 align-middle mr-1"></i>
                                Anular @if($sancion_desercion->causa->tipo = 'Sanción') Sanción @else Deserción @endif
                            </button>
                        </form>
                    </div>
                    @elseif ($sancion_desercion->inscripcion->estado == 'Desertado')
                    <p>Esta inscripción se encuentra actualmente en un estado <b>desertado</b>, en caso de querer volver a reactivar esta inscripción,
                        <a href="/movimientos/estudiantes/inscripciones/{{ $sancion_desercion->inscripcion->id }}/reactivate" class="text-custom">
                            presione este link.
                        </a>
                    </p>

                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection