@section('title', 'Calificaciones')

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
                    <div class="col-12 col-lg-4">
                        <h4 class="card-title">Gestión de @yield('title')</h4>
                        @empty(Request()->asignatura_id) <p class="card-title-desc">Seleccione los filtros necesarios para generar la lista de estudiantes</p> @endempty
                        @isset(Request()->asignatura_id) <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom"> Guardar
                                Calificaciones</span></p> @endisset
                    </div>


                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/calificaciones">
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
                        <form action="/movimientos/estudiantes/calificaciones">
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

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/calificaciones">
                            <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">
                            <input type="hidden" name="asignatura_id" value="{{ Request()->asignatura_id }}">

                            <select name="etapa" id="etapa" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                <option value="Primera" @if(Request()->etapa == 'Primera') selected @endif>Primera Etapa</option>
                                <option value="Segunda" @if(Request()->etapa == 'Segunda') selected @endif>Segunda Etapa</option>
                            </select>
                        </form>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/estudiantes/calificaciones">
                            <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">
                            <input type="hidden" name="asignatura_id" value="{{ Request()->asignatura_id }}">
                            <input type="hidden" name="etapa" value="{{ Request()->etapa }}">

                            <select name="evaluacion_id" id="evaluacion_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($evaluaciones as $evaluacion)
                                <option value="{{ $evaluacion->id }}" @if(Request()->evaluacion_id == $evaluacion->id) selected @endif>{{ $evaluacion->tema }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>


                <hr class="add-button-hr">

                @if($evaluacion_seleccionada == null)
                <form action="/movimientos/estudiantes/calificaciones?evaluacion_id={{ Request()->evaluacion_id }}" method="GET" autocomplete="off">
                    <input type="hidden" type="text" name="busqueda_rapida" value="true">
                    <div class="form-group row">
                        <label for="evaluacion_id" class="col-md-2 col-form-label">Busqueda rápida</label>
                        <div class="col-md-10">
                            <input id="evaluacion_id_i" name="evaluacion_id" class="form-control @error('evaluacion_id') is-invalid @enderror" type="text"
                                value="{{ old('evaluacion_id') }}" placeholder="Introduzca el ID de la evaluación" autofocus>
                            @error('evaluacion_id')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <hr>
                    @isset(Request()->evaluacion_id) <p class="float-left text-custom">La evaluación con ID {{ Request()->evaluacion_id }} no existe</p> @endisset
                    <div class="row justify-content-end">
                        <div class="col-12 col-lg-2">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-search font-size-16 align-middle mr-1"></i> Buscar Evaluación
                            </button>
                        </div>
                    </div>
                </form>
                @endempty

                <!-- Tabla -->
                @if($evaluacion_seleccionada != null)
                @isset(Request()->evaluacion_id)
                @empty($calificaciones) <form action="/movimientos/estudiantes/calificaciones/store" method="POST"> @endempty
                    @isset($calificaciones) <form action="/movimientos/estudiantes/calificaciones/update" method="POST"> @method('PATCH') @endisset
                        @csrf
                        <table class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <input type="hidden" name="curso_id" value="{{ $evaluacion_seleccionada->curso_id ?? ''}}">
                            <input type="hidden" name="asignatura_id" value="{{ $evaluacion_seleccionada->asignatura_id ?? ''}}">
                            <input type="hidden" name="evaluacion_id" value="{{ $evaluacion_seleccionada->id ?? ''}}">

                            <thead>
                                <tr>
                                    <th width="1">#</th>
                                    <th>Nombre y apellido</th>
                                    <th width="220">Puntaje obtenido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscripciones as $keys => $inscripcion)
                                <input name="inscripcion_id[]" value="{{ $inscripcion->id }}" type="hidden">

                                <tr>
                                    <td>{{ $keys + 1 }}</td>
                                    <td>{{ $inscripcion->persona->nombre }} {{ $inscripcion->persona->apellido }}</td>
                                    <td class="calificaciones-input-fix">
                                        <div class="row">
                                            @empty($calificaciones)
                                            <div class="col-5">
                                                <input class="form-control form-control-sm" class="" name="puntaje_logrado[]" type="number" min="0"
                                                    max="{{ $evaluacion_seleccionada->ponderacion }}" required>
                                            </div>
                                            <div class="col-2 mt-1">
                                                <p>&nbsp;-</p>
                                            </div>
                                            <div class="col-5">
                                                <input class="form-control form-control-sm" class="" type="number" value="{{ $evaluacion_seleccionada->ponderacion }}"
                                                    disabled>
                                            </div>
                                            @endempty

                                            @isset($calificaciones)
                                            <div class="col-5">
                                                <input class="form-control form-control-sm" name="puntaje_logrado[]" type="number" min="0"
                                                    max="{{ $evaluacion_seleccionada->ponderacion }}" value="{{ $calificaciones[$keys]->puntaje_logrado ?? ''}}" required>
                                            </div>
                                            <div class="col-2 mt-1">
                                                <p>&nbsp;-</p>
                                            </div>
                                            <div class="col-5">
                                                <input class="form-control form-control-sm" name="ponderacion[]" type="number"
                                                    value="{{ $evaluacion_seleccionada->ponderacion }}" disabled>
                                            </div>
                                            <input type="hidden" name="calificacion_id[]" value="@isset($calificaciones[$keys]) {{ $calificaciones[$keys]->id }} @endisset">
                                            @endisset
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>

                        <div class="row justify-content-start">
                            <div class="col-12 col-lg-2">
                                <a href="/movimientos/estudiantes/calificaciones">
                                    <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1" tabindex="-1">
                                        <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                                    </button>
                                </a>
                            </div>

                            <div class="col-12 col-lg-8"></div>

                            <div class="col-12 col-lg-2">
                                <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                    <i class="bx bx-check font-size-16 align-middle mr-1"></i> Guardar Calificaciones
                                </button>
                            </div>
                        </div>
                        @endisset
                    </form>
                    @endif
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

<script>
    document.querySelector("#evaluacion_id_i").addEventListener("keypress", function (evt) {
            if (evt.which != 13 && evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
            }
        });
</script>
@endsection