@section('title', 'Inscripciones')

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
                <h4 class="card-title">Agregar nueva inscripción</h4>
                <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom"> Guardar Inscripción</span></p>

                <hr style="margin-top: -10px !important;">

                <!-- Formularios ayudantes -->
                <form action="/movimientos/estudiantes/inscripciones/create" method="GET">
                    <div class="form-group row">
                        <label for="nivel" class="col-md-2 col-form-label">Curso</label>
                        <div class="col-md-10">
                            <select name="curso_id" id="curso_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" @if(Request()->curso_id == $curso->id) selected @endif>{{ $curso->nivel_acronimo }} {{ $curso->numero }}°
                                    "{{ $curso->seccion->nombre }}" {{ $curso->turno }} @if($curso->bachillerato_id) ({{ $curso->bachillerato->acronimo }}) @endif</option>
                                @endforeach
                            </select>
                            @error('curso_id')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </form>

                @isset (Request()->curso_id)

                <div class="form-group row">
                    <div class="col-12 col-md-2"></div>

                    <div class="col-12 col-md-5">
                        <h4 class="card-title">Requisitos de inscripción</h4>
                        <div class="form-group row">
                            <div class="col-md-12 mt-2">
                                @foreach ($requisitos as $keys => $requisito)
                                <p name="requisito">- {{ $requisito->nombre }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <h4 class="card-title">Matrícula y cuota</h4>
                        <div class="form-group row">
                            <label for="matricula" class="col-md-3 col-form-label">Matrícula</label>
                            <div class="col-md-9 mt-2">
                                <p name="matricula">{{ $curso_seleccionado->matricula }} PYG</p>
                            </div>

                            <label for="cuota" class="col-md-3 col-form-label">Cuota</label>
                            <div class="col-md-9 mt-2">
                                <p name="cuota">{{ $curso_seleccionado->cuota }} PYG</p>
                            </div>

                            <label for="cuota_cantidad" class="col-md-3 col-form-label">Cantidad de cuotas</label>
                            <div class="col-md-9 mt-2">
                                <p name="cuota_cantidad">{{ $curso_seleccionado->cuota_cantidad }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario -->
                <form action="/movimientos/estudiantes/inscripciones/store" method="POST" autocomplete="off">
                    @csrf
                    <!-- Input ayudantes -->
                    <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">

                    <div class="form-group row">
                        <label for="persona_id" class="col-md-2 col-form-label">Estudiante</label>
                        <div class="col-md-10">
                            <select name="persona_id" id="estudiante_id" class="form-control select2" tabindex="0">
                                <option></option>
                                @foreach ($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" @if($estudiante->id == old('persona_id')) selected @endif>{{ $estudiante->documento_numero }} -
                                    {{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                                @endforeach
                            </select>
                            @error('persona_id')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="procedencia" class="col-md-2 col-form-label">Procedencia</label>
                        <div class="col-md-10">
                            <input id="procedencia" name="procedencia" class="form-control @error('procedencia') is-invalid @enderror" type="text"
                                value="{{ old('procedencia') ?? 'Colegio Público de Gestión Privada Subvencionada Las Mercedes' }}" tabindex="0">
                            @error('procedencia')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exonerado" class="col-md-2 col-form-label">Exonerar</label>
                        <div class="col-md-10">
                            <select name="exonerado" id="exonerado" class="form-control select2" tabindex="0">
                                <option></option>
                                <option value="0" @if(old('exonerado')=='0' ) selected @endif>No</option>
                                <option value="1" @if(old('exonerado')=='1' ) selected @endif>Sí</option>
                            </select>
                            @error('exonerado')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-start">
                        <div class="col-12 col-lg-2">
                            <a href="/movimientos/planes/cursos">
                                <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1" tabindex="-1">
                                    <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                                </button>
                            </a>
                        </div>

                        <div class="col-12 col-lg-8"></div>

                        <div class="col-12 col-lg-2">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-check font-size-16 align-middle mr-1"></i> Guardar Inscripción
                            </button>
                        </div>
                    </div>
                </form>
                @endisset
                @empty(Request()->curso_id)
                <hr>
                <div class="row justify-content-start">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/inscripciones">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1" tabindex="-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endempty
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