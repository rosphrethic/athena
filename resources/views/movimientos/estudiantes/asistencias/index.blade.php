@section('title', 'Asistencias')

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
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h4 class="card-title">Gestión de @yield('title')</h4>
                        @empty(Request()->asignatura_id) <p class="card-title-desc">Seleccione los filtros necesarios para generar la lista de estudiantes</p> @endempty
                        @isset(Request()->asignatura_id) <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom"> Guardar
                                Asistencia</span></p> @endisset
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/asistencias" method="GET">
                            <input id="fecha" name="fecha" class="form-control @isset(Request()->fecha) is-invalid @endisset" type="date"
                                value="{{ Request()->fecha ?? date('Y-m-d') }}" onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/asistencias">
                            <input type="hidden" name="fecha" value="{{ Request()->fecha ?? date('Y-m-d') }}">

                            <select name="curso_id" id="curso_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" @if(Request()->curso_id == $curso->id) selected @endif>{{ $curso->nivel_acronimo }} {{ $curso->numero }}°
                                    "{{ $curso->seccion->nombre }}" {{ $curso->turno }} @if($curso->bachillerato_id) ({{ $curso->bachillerato->acronimo }}) @endif</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/asistencias">
                            <input type="hidden" name="fecha" value="{{ Request()->fecha ?? date('Y-m-d') }}">
                            <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">

                            <select name="asignatura_id" id="asignatura_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->asignatura_id }}" @if(Request()->asignatura_id == $asignatura->asignatura_id) selected
                                    @endif>{{ $asignatura->asignatura->nombre }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>


                <hr class="add-button-hr">

                <!-- Tabla -->
                @isset(Request()->asignatura_id)
                <!-- Formulario -->
                @empty($asistencias) <form action="/movimientos/estudiantes/asistencias/store" method="POST"> @endempty
                    @isset($asistencias) <form action="/movimientos/estudiantes/asistencias/update" method="POST"> @method('PATCH') @endisset
                        @csrf
                        <!-- Input ayudantes -->
                        <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">
                        <input type="hidden" name="asignatura_id" value="{{ Request()->asignatura_id }}">
                        <input type="hidden" name="fecha" value="{{ Request()->fecha }}">

                        <table class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="1">#</th>
                                    <th>Nombre y apellido</th>
                                    <th width="1">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscripciones as $keys => $inscripcion)
                                <input name="inscripcion_id[]" value="{{ $inscripcion->id }}" type="hidden">

                                <tr>
                                <tr>
                                    <td>{{ $keys + 1 }}</td>
                                    <td>{{ $inscripcion->persona->nombre }} {{ $inscripcion->persona->apellido }}</td>
                                    <td>
                                        <div class="col-xl-6">
                                            <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                @empty($asistencias)
                                                <label class="btn btn-outline-primary btn-sm active">
                                                    <input type="radio" name="estado[{{ $keys }}]" value="Presente" checked> Presente</input>
                                                </label>
                                                <label class="btn btn-outline-primary btn-sm">
                                                    <input type="radio" name="estado[{{ $keys }}]" value="Ausente"> Ausente</input>
                                                </label>
                                                @endempty

                                                @isset($asistencias)
                                                <label class="btn btn-outline-primary btn-sm active">
                                                    <input type="radio" name="estado[{{ $keys }}]" value="Presente" @empty($asistencias[$keys]) checked @endempty
                                                        @isset($asistencias[$keys]) @if ($asistencias[$keys]->estado == 'Presente') checked @endif @endisset> Presente</input>
                                                </label>
                                                <label class="btn btn-outline-primary btn-sm">
                                                    <input type="radio" name="estado[{{ $keys }}]" value="Ausente" @isset($asistencias[$keys]) @if ($asistencias[$keys]->estado
                                                    == 'Ausente') checked @endif @endisset> Ausente</input>
                                                </label>
                                                <input type="hidden" name="asistencia_id[]" value="@isset($asistencias[$keys]) {{ $asistencias[$keys]->id }} @endisset">
                                                @endisset
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>

                        <div class="row justify-content-end">
                            <div class="col-12 col-lg-2">
                                <a href="/movimientos/estudiantes/asistencias">
                                    <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1" tabindex="-1">
                                        <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                                    </button>
                                </a>
                            </div>

                            <div class="col-12 col-lg-8"></div>

                            <div class="col-12 col-lg-2">
                                <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                    <i class="bx bx-check font-size-16 align-middle mr-1"></i> Guardar Asistencia
                                </button>
                            </div>
                        </div>
                    </form>
                    @endisset
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