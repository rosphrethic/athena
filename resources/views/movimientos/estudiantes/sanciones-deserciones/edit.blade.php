@section('title', 'Sanciones y Deserciones de Estudiantes')

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
                <h4 class="card-title">Editar @if($sancion_desercion->causa->tipo = 'Sanción') sanción @else deserción @endif de
                    {{ $sancion_desercion->inscripcion->persona->nombre }} {{ $sancion_desercion->inscripcion->persona->apellido }}</h4>
                <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom">Guardar @if($sancion_desercion->causa->tipo = 'Sanción')
                        Sanción @else Deserción @endif</span></p>

                <hr style="margin-top: -10px !important;">

                <!-- Formulario -->
                <form action="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/update" method="POST" autocomplete="off">
                    @method('PATCH')
                    @csrf
                    <!-- Input ayudantes -->
                    <div class="form-group row">
                        <label for="asignatura_id" class="col-md-2 col-form-label">Causa</label>
                        <div class="col-md-10">
                            <select name="causa_id" id="causa_id" class="form-control select2" tabindex="0">
                                <option></option>
                                @foreach ($causas as $causa)
                                <option value="{{ $causa->id }}" @if($sancion_desercion->causa_id == $causa->id) selected @endif>{{ $causa->nombre }}</option>
                                @endforeach
                            </select>
                            @error('causa_id')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="descripcion" class="col-md-2 col-form-label">Descripción</label>
                        <div class="col-md-10">
                            <textarea id="descripcion" name="descripcion" rows="5" class="form-control @error('descripcion') is-invalid @enderror"
                                tabindex="0">{{ $sancion_desercion->descripcion }}</textarea>
                            @error('descripcion')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha" class="col-md-2 col-form-label">Fecha</label>
                        <div class="col-md-10">
                            <input id="fecha" name="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" tabindex="0"
                                value="{{ $sancion_desercion->fecha }}">
                            @error('fecha')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <hr>


                </form>

                <div class="row justify-content-start">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/sanciones-deserciones">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1" tabindex="-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-8"></div>

                    <div class="col-12 col-lg-2">
                        <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                            <i class="bx bx-check font-size-16 align-middle mr-1"></i> Guardar @if($sancion_desercion->causa->tipo = 'Sanción') Sanción @else Deserción @endif
                        </button>
                    </div>
                </div>
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
@endsection