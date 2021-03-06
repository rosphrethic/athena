@section('title', 'Evaluaciones')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />
@endsection

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
                <h4 class="card-title">Editar evaluación {{ $evaluacion->tema }}</h4>
                <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom">Guardar Evaluación</span></p>

                <hr style="margin-top: -10px !important;">

                <form action="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/update" method="POST" autocomplete="off">
                    @method('PATCH')
                    @csrf

                    <div class="form-group row">
                        <label for="etapa" class="col-md-2 col-form-label">Etapa</label>
                        <div class="col-md-10">
                            <select name="etapa" id="etapa" class="form-control select2 select2-r">
                                <option></option>
                                <option value="Primera" @if($evaluacion->etapa == 'Primera') selected @endif>Primera</option>
                                <option value="Segunda" @if($evaluacion->etapa == 'Segunda') selected @endif>Segunda</option>
                            </select>
                            @error('etapa')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Tipo</label>
                        <div class="col-md-10">
                            <select name="tipo" id="tipo" class="form-control select2 select2-r" tabindex="0">
                                <option></option>
                                <option value="Trabajo de Proceso" @if($evaluacion->tipo == 'Trabajo de Proceso') selected @endif>Trabajo de Proceso</option>
                                <option value="Trabajo Práctico" @if($evaluacion->tipo == 'Trabajo Práctico') selected @endif>Trabajo Práctico</option>
                                <option value="Examen Parcial" @if($evaluacion->tipo == 'Examen Parcial') selected @endif>Examen Parcial</option>
                                <option value="Examen Final" @if($evaluacion->tipo == 'Examen Final') selected @endif>Examen Final</option>
                            </select>
                            @error('tipo')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tema" class="col-md-2 col-form-label">Tema</label>
                        <div class="col-md-10">
                            <input id="tema" name="tema" class="form-control @error('tema') is-invalid @enderror" type="text" value="{{ $evaluacion->tema }}" tabindex="0">
                            @error('tema')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ponderacion" class="col-md-2 col-form-label">Ponderación</label>
                        <div class="col-md-10">
                            <input name="ponderacion" class="input-mask form-control" type="text" data-inputmask="'mask': '99'" value="{{ $evaluacion->ponderacion }}">
                            @error('ponderacion')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha" class="col-md-2 col-form-label">Fecha</label>
                        <div class="col-md-10">
                            <input id="fecha" name="fecha" class="form-control" type="date" value="{{ $evaluacion->fecha }}" tabindex="0">
                            @error('fecha')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-start">
                        <div class="col-12 col-lg-2">
                            <a href="/movimientos/planes/evaluaciones">
                                <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1" tabindex="-1">
                                    <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                                </button>
                            </a>
                        </div>

                        <div class="col-12 col-lg-8"></div>

                        <div class="col-12 col-lg-2">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-check font-size-16 align-middle mr-1"></i> Guardar Evaluación
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

<!-- Advanced Forms -->
<script src="{{ asset('assets/js/pages/form-advanced.init.js')}}"></script>

<!-- Input Mask -->
<script src="{{ asset('assets/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-mask.init.js') }}"></script>
@endsection