@section('title', 'Informes Académicos')

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
                    <li class="breadcrumb-item">Informes</li>
                    <li class="breadcrumb-item active">Académicos</li>
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
                    <div class="col-12 col-lg-8">
                        <h4 class="card-title">@yield('title')</h4>
                        <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom">Generar Informe</span></p>
                    </div>

                    <div class="col-12 col-lg-4">
                        <form action="/informes/academicos">
                            <select name="movimiento" id="movimiento" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                <option value="cursos" @if(Request()->movimiento == 'cursos') selected @endif>Cursos</option>
                                <option value="requisitos" @if(Request()->movimiento == 'requisitos') selected @endif>Requisitos</option>
                                <option value="habilitaciones" @if(Request()->movimiento == 'habilitaciones') selected @endif>Habilitaciones</option>
                                <option value="horarios" @if(Request()->movimiento == 'horarios') selected @endif>Horarios</option>
                                <option value="evaluaciones" @if(Request()->movimiento == 'evaluaciones') selected @endif>Evaluaciones</option>
                            </select>
                        </form>
                    </div>
                </div>

                <hr class="add-button-hr">

                <!-- Contenido -->
                @isset(Request()->movimiento)
                <form action="/informes/academicos/print" method="GET">
                    <input type="hidden" name="movimiento" value="{{ Request()->movimiento }}">
                    <input type="hidden" name="sede_id" value="{{ Request()->sede_id }}">
                    <input type="hidden" name="ano" value="{{ Request()->ano }}">


                    <!-- Inputs that are available in every form -->
                    <div class="form-group row">
                        <label for="sede_id" class="col-md-2 col-form-label">Sede</label>
                        <div class="col-md-10">
                            <select name="sede_id" id="sede_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}" @if(Request()->sede_id == $sede->id) selected @endif>{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sede_id" class="col-md-2 col-form-label">Año</label>
                        <div class="col-md-10">
                            <select name="ano" id="ano" class="form-control select2">
                                <option></option>
                                @foreach ($anos as $ano)
                                <option value="{{ $ano->ano }}" @if(Request()->ano == $ano->ano) selected @endif>{{ $ano->ano }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Inputs that are specific to some forms -->
                    @if (Request()->movimiento == 'cursos')
                    <div class="form-group row">
                        <label for="nivel" class="col-md-2 col-form-label">Nivel</label>
                        <div class="col-md-10">
                            <select name="nivel" id="nivel" class="form-control select2 @error('nivel') is-invalid @enderror" tabindex="0">
                                <option></option>
                                <option value="Educación Escolar Básica" @if (old('nivel')=='Educación Escolar Básica' ) selected @endif>Educación Escolar Básica</option>
                                <option value="Educación Media" @if (old('nivel')=='Educación Media' ) selected @endif>Educación Media</option>
                            </select>
                            @error('nivel')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bachillerato_id" class="col-md-2 col-form-label">Bachillerato</label>
                        <div class="col-md-10">
                            <select name="bachillerato_id" id="bachillerato_id" class="form-control select2" tabindex="0">
                                <option></option>
                                @foreach ($bachilleratos as $bachillerato)
                                <option value="{{ $bachillerato->id }}" @if($bachillerato->id == old('bachillerato_id')) selected @endif>{{ $bachillerato->nombre }}
                                    ({{ $bachillerato->acronimo }})</option>
                                @endforeach
                            </select>
                            @error('bachillerato_id')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nivel" class="col-md-2 col-form-label">Turno</label>
                        <div class="col-md-10">
                            <select name="turno" id="turno" class="form-control select2 @error('turno') is-invalid @enderror" tabindex="0">
                                <option></option>
                                <option value="Mañana" @if (old('turno')=='Mañana' ) selected @endif>Mañana</option>
                                <option value="Tarde" @if (old('turno')=='Tarde' ) selected @endif>Tarde</option>
                                <option value="Noche" @if (old('turno')=='Noche' ) selected @endif>Noche</option>
                                <option value="Especial" @if (old('turno')=='Especial' ) selected @endif>Especial</option>
                            </select>
                            @error('turno')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Estado</label>
                        <div class="col-md-10">
                            <select id="estado" name="estado" class="form-control select2">
                                <option></option>
                                <option value="Activo" @if(old('estado')=='Activo' ) selected @endif>Activo</option>
                                <option value="Inactivo" @if(old('estado')=='Inactivo' ) selected @endif>Inactivo</option>
                            </select>
                            @error('estado')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <hr>

                    @if (Request()->movimiento == 'cursos')
                    <p class="card-title-desc text- float-left">Los filtros
                        <span class="text-custom">Nivel</span>,
                        <span class="text-custom">Bachillerato</span>,
                        <span class="text-custom">Turno</span> y
                        <span class="text-custom">Estado</span> son opcionales. Dejar un filtro sin seleccionar es sinónimo de seleccionar
                        <span class="text-custom">todos los items</span> de ese filtro.
                    </p>
                    @endif
                    <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                        <i class="bx bx-printer font-size-16 align-middle mr-1"></i> Generar Informe
                    </button>
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