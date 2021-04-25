@section('title', 'Evaluaciones')

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
                    <li class="breadcrumb-item">Planes</li>
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
                <h4 class="card-title">Detalles de la evaluación de {{ $evaluacion->tema }}</h4>
                <p class="card-title-desc">Aquí puede ver los detalles de la evaluación seleccionado</p>

                <hr style="margin-top: -10px !important;">

                <!-- Detalles -->
                <div class="form-group row">
                    <label for="curso" class="col-md-2 col-form-label">Curso</label>
                    <div class="col-md-10 mt-2">
                        <p name="curso">{{ $evaluacion->curso->nivel_acronimo }} {{ $evaluacion->curso->numero }}° "{{ $evaluacion->curso->seccion->nombre }}"
                            {{ $evaluacion->curso->turno }} @if($evaluacion->curso->bachillerato_id) ({{ $evaluacion->curso->bachillerato->acronimo }}) @endif</p>
                    </div>

                    <label for="asignatura" class="col-md-2 col-form-label">Asignatura</label>
                    <div class="col-md-10 mt-2">
                        <p name="asignatura">{{ $evaluacion->asignatura->nombre }}</p>
                    </div>

                    <label for="etapa" class="col-md-2 col-form-label">Etapa</label>
                    <div class="col-md-10 mt-2">
                        <p name="etapa">{{ $evaluacion->etapa }}</p>
                    </div>

                    <label for="tipo" class="col-md-2 col-form-label">Tipo</label>
                    <div class="col-md-10 mt-2">
                        <p name="tipo">{{ $evaluacion->tipo }}</p>
                    </div>

                    <label for="tema" class="col-md-2 col-form-label">Tema</label>
                    <div class="col-md-10 mt-2">
                        <p name="tema">{{ $evaluacion->tema }}</p>
                    </div>

                    <label for="etapa" class="col-md-2 col-form-label">Ponderación</label>
                    <div class="col-md-10 mt-2">
                        <p name="etapa">{{ $evaluacion->ponderacion }}</p>
                    </div>

                    <label for="fecha" class="col-md-2 col-form-label">Fecha</label>
                    <div class="col-md-10 mt-2">
                        <p name="fecha">{{ $evaluacion->fecha }}</p>
                    </div>

                </div>

                <hr style="margin-top: -10px !important;">

                <div class="row" style="margin-bottom: -16px;">
                    <div class="col-sm-2">
                        <label class="">Evaluación ID</label>
                        <p class="text-primary">{{ $evaluacion->id }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Estado</label>
                        <p class="text-primary">{{ $evaluacion->estado }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado por</label>
                        <p class="text-primary">{{ $evaluacion->user->name }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Creado el</label>
                        <p class="text-primary">{{ $evaluacion->creado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Actualizado el</label>
                        <p class="text-primary">{{ $evaluacion->actualizado_el }}</p>
                    </div>
                    <div class="col-sm-2">
                        <label>Pertenece a la sede de</label>
                        <p class="text-primary">{{ $evaluacion->curso->sede->nombre }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-start">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/planes/evaluaciones">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i>Regresar
                            </button>
                        </a>
                    </div>


                    @if ($evaluacion->estado == 'Activo')
                    <div class="col-12 col-lg-4"></div>

                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/edit">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-edit-alt font-size-16 align-middle mr-1"></i> Editar Evaluación
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/anull" method="POST"
                            onsubmit="return confirm('¿Está seguro de que desea anular esta evaluación?');">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-block font-size-16 align-middle mr-1"></i> Anular Evaluación
                            </button>
                        </form>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/delete" method="POST"
                            onsubmit="return confirm('¿Está seguro de que desea eliminar esta evaluación?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-trash font-size-16 align-middle mr-1"></i> Eliminar Evaluación
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