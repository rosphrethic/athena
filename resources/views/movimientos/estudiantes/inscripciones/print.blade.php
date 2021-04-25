@section('title', 'Inscripciones')

@section('css')
<!-- Datatable -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />

<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />

<style type="text/css" media="print">
    @page {
        size: auto !important;
        margin: 40px 15px 20px 15px !important;
    }

    @page :first {
        margin-top: -50px !important;
    }

    @media print {

        .dataTables_length,
        .dataTables_filter,
        .dataTables_info,
        .pagination,
        .sorting::before,
        .sorting::after,
        .sorting_asc::before,
        .sorting_asc::after {
            display: none !important;
        }
    }

    body {
        background-color: none !important;
    }

    #page-topbar,
    #themes,
    #topnav {
        display: none !important;
    }

    label,
    p,
    h4,
    h5 {
        color: #1f1f1f !important;
    }

    #generado-el {
        margin-right: 20px !important;
    }

    #cabecera,
    .subtitulo {
        -webkit-print-color-adjust: exact;
        color-adjust: exact
    }
</style>
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Cabecera -->
                <div id='cabecera' class="mb-4 graphics-enabled">
                    <span id="generado-el" class="position-absolute font-size-11 mt-3" style="right: 0; margin-right: 40px">Generado el {{ date('Y-m-d') }}
                        {{ date('g:i a') }}</span>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 invoice-title media mb-1 text-center d-block">
                            <img src="{{ asset('storage/emblema/emblema.png') }}" alt="Emblema de las mercedes" height="70" class="mt-4">
                            <h5 class="mt-3 font-15">{{ $dato_organizacion->nombre }}</h5>
                            <p class="">{{ $dato_organizacion->nombre_administracion }} - Ficha Académica del Estudiante</p>
                        </div>
                    </div>
                </div>

                <p class="subtitulo font-size-14 graphics-enabled text-center py-3">Datos personales</p>
                <div class="form-group row">
                    <label for="nombre-apellido" class="col-3 col-form-label">Nombre y apellido</label>
                    <div class="col-9 mt-2">
                        <p name="nombre-apellido">{{ $inscripcion->persona->nombre }} {{ $inscripcion->persona->apellido }}</p>
                    </div>

                    <label for="documento_tipo" class="col-3 col-form-label">Tipo de documento</label>
                    <div class="col-9 mt-2">
                        <p name="documento_tipo">{{ $inscripcion->persona->documento_tipo }}</p>
                    </div>

                    <label for="documento_numero" class="col-3 col-form-label">Número de documento</label>
                    <div class="col-9 mt-2">
                        <p name="documento_numero">{{ $inscripcion->persona->documento_numero }}</p>
                    </div>

                    <label for="fecha" class="col-3 col-form-label">Fecha de nacimiento</label>
                    <div class="col-9 mt-2">
                        <p name="fecha">{{ $inscripcion->persona->fecha_nacimiento }}</p>
                    </div>

                    <label for="sexo" class="col-3 col-form-label">Sexo</label>
                    <div class="col-9 mt-2">
                        <p name="sexo">{{ $inscripcion->persona->sexo }}</p>
                    </div>
                </div>

                <!-- Datos familiares -->
                <p class="subtitulo font-size-14 graphics-enabled text-center py-3">Datos familiares</p>
                <div class="form-group row">
                    <label for="nombre-apellido" class="col-3 col-form-label">Nombre y apellido del guardián</label>
                    <div class="col-9 mt-2">
                        <p name="nombre-apellido">{{ $guardian->nombre }} {{ $guardian->apellido }}</p>
                    </div>

                    <label for="documento_tipo" class="col-3 col-form-label">Tipo de documento</label>
                    <div class="col-9 mt-2">
                        <p name="documento_tipo">{{ $guardian->documento_tipo }}</p>
                    </div>

                    <label for="documento_numero" class="col-3 col-form-label">Número de documento</label>
                    <div class="col-9 mt-2">
                        <p name="documento_numero">{{ $guardian->documento_numero }}</p>
                    </div>

                    <label for="ciudad" class="col-3 col-form-label">Ciudad</label>
                    <div class="col-9 mt-2">
                        <p name="ciudad">{{ $guardian->ciudad->nombre }}</p>
                    </div>

                    <label for="domicilio" class="col-3 col-form-label">Dirección de domicilio</label>
                    <div class="col-9 mt-2">
                        <p name="domicilio">{{ $guardian->direccion }}</p>
                    </div>

                    <label for="telefono" class="col-3 col-form-label">Teléfono</label>
                    <div class="col-9 mt-2">
                        <p name="telefono">{{ $guardian->telefono }}</p>
                    </div>
                </div>

                <!-- Datos academicos -->
                <p class="subtitulo font-size-14 graphics-enabled text-center py-3">Datos académicos</p>
                <div class="form-group row">
                    <label for="procedencia" class="col-3 col-form-label">Procedencia</label>
                    <div class="col-9 mt-2">
                        <p name="procedencia">{{ $inscripcion->procedencia }}</p>
                    </div>

                    <label for="curso" class="col-3 col-form-label">Inscripto en</label>
                    <div class="col-9 mt-2">
                        <p name="curso">{{ $inscripcion->curso->nivel_acronimo }} {{ $inscripcion->curso->numero }}° "{{ $inscripcion->curso->seccion->nombre }}"
                            {{ $inscripcion->curso->turno }} @if($inscripcion->curso->bachillerato_id) ({{ $inscripcion->curso->bachillerato->acronimo }}) @endif</p>
                    </div>

                    <label for="inscripto-el" class="col-3 col-form-label">Inscripto el</label>
                    <div class="col-9 mt-2">
                        <p name="inscripto-el">{{ $inscripcion->creado_el }}</p>
                    </div>

                    <label for="exonerado" class="col-3 col-form-label">Exonerado</label>
                    <div class="col-9 mt-2">
                        <p name="exonerado">@if($inscripcion->exonerado == 0) No @else Sí @endif</p>
                    </div>
                </div>

                <hr class="d-print-none">

                <div class="row justify-content-start d-print-none">
                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}" class="d-print-none">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light mt-1">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-8"></div>

                    <div class="col-12 col-lg-2">
                        <a href="javascript:window.print()" class="btn btn-custom waves-effect btn-block waves-light"><i class="fa fa-print  mr-2"></i>Imprimir Ficha
                            Académica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Datatables -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection