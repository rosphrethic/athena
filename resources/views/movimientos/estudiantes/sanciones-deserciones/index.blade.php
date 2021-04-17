@section('title', 'Sanciones y Deserciones de Estudiantes')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />

<!-- Datatables -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <!-- Titulo y descripcion de la carta -->
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h4 class="card-title">Estudiantes activos</h4>
                        @empty(Request()->estudiante_id)<p class="card-title-desc">Seleccione un estudiante para ver más detalles</p>@endempty
                        @isset(Request()->estudiante_id)<p class="card-title-desc">Aquí puede ver los detalles del estudiante seleccionado</p>@endisset
                    </div>

                    <div class="col-12 col-lg-4">
                        <form action="/movimientos/estudiantes/sanciones-deserciones">
                            <select name="estudiante_id" id="estudiante_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($inscripciones as $inscripcion)
                                <option value="{{ $inscripcion->id }}" @if(Request()->estudiante_id == $inscripcion->id) selected
                                    @endif>{{ $inscripcion->persona->documento_numero }} - {{ $inscripcion->persona->nombre }} {{ $inscripcion->persona->apellido }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <hr class="add-button-hr">

                @isset(Request()->estudiante_id)
                <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label">Inscripto en</label>
                    <div class="col-md-8 mt-2">
                        <p name="nombre">{{ $inscripcion_seleccionada->curso->nivel_acronimo }} {{ $inscripcion_seleccionada->curso->numero }}°
                            "{{ $inscripcion_seleccionada->curso->seccion->nombre }}" {{ $inscripcion_seleccionada->curso->turno }}
                            @if($inscripcion_seleccionada->curso->bachillerato_id) ({{ $inscripcion_seleccionada->curso->bachillerato->acronimo }}) @endif</p>
                    </div>

                    <hr>

                    <label for="apellido" class="col-md-4 col-form-label">Nombre y apellido</label>
                    <div class="col-md-8 mt-2">
                        <p name="apellido">{{ $inscripcion_seleccionada->persona->nombre }} {{ $inscripcion_seleccionada->persona->apellido }}</p>
                    </div>

                    <label for="documento_tipo" class="col-md-4 col-form-label">Tipo de documento</label>
                    <div class="col-md-8 mt-2">
                        <p name="documento_tipo">{{ $inscripcion_seleccionada->persona->documento_tipo }}</p>
                    </div>

                    <label for="documento_numero" class="col-md-4 col-form-label">Número de documento</label>
                    <div class="col-md-8 mt-2">
                        <p name="documento_numero">{{ $inscripcion_seleccionada->persona->documento_numero }}</p>
                    </div>

                    <label for="nacionalidad" class="col-md-4 col-form-label">Nacionalidad</label>
                    <div class="col-md-8 mt-2">
                        <a
                            href="/referenciales/documentales/nacionalidades/{{ $inscripcion_seleccionada->persona->nacionalidad_id }}">{{ $inscripcion_seleccionada->persona->nacionalidad->nombre }}</a>
                    </div>

                    <label for="fecha_nacimiento" class="col-md-4 col-form-label">Nacido el</label>
                    <div class="col-md-8 mt-2">
                        <p name="fecha_nacimiento">{{ $inscripcion_seleccionada->persona->fecha_nacimiento }}</p>
                    </div>

                    <label for="sexo" class="col-md-4 col-form-label">Sexo</label>
                    <div class="col-md-8 mt-2">
                        <p name="sexo">{{ $inscripcion_seleccionada->persona->sexo }}</p>
                    </div>

                    <label for="sexo" class="col-md-4 col-form-label">Guardián</label>
                    <div class="col-md-8 mt-2">
                        <a href="/referenciales/documentales/personas/{{ $guardian->id }}" name="sexo">{{ $guardian->nombre }} {{ $guardian->apellido }}</a>
                    </div>

                    <div class="col-md-12 mt-2">
                        <a href="/referenciales/documentales/personas/{{ $inscripcion_seleccionada->persona->id }}" target="_blank">Ver más detalles</a>
                    </div>

                    <div class="col-md-12 mt-2">
                        <hr>
                        <p>Esta inscripción se encuentra actualmente en un estado <b>activo</b>, en caso de que quiera cambiarlo a un estado <b>desertado</b>,
                            <a href="/movimientos/estudiantes/sanciones-deserciones/create?tipo=Deserción&inscripcion_id={{ $inscripcion_seleccionada->id }}"
                                class="text-custom">
                                presione este link.
                            </a>
                        </p>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <!-- Titulo y descripcion de la carta -->
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h4 class="card-title">Gestión de @yield('title')</h4>
                        @empty(Request()->estudiante_id)<p class="card-title-desc">Seleccione un estudiante para ver más detalles</p>@endempty
                        @isset(Request()->estudiante_id)<p class="card-title-desc">Presione una sanción para ver más detalles</p>@endisset
                    </div>

                    <div class="col-12 col-lg-4">
                        <a href="/movimientos/estudiantes/sanciones-deserciones/create?tipo=Sanción" class="btn btn-custom btn-block">
                            <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Agregar Sanción
                        </a>
                    </div>
                </div>

                <hr class="add-button-hr">

                @isset(Request()->estudiante_id)
                @if($inscripcion_seleccionada->estado == 'Activo')
                <!-- Tabla -->
                <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Causa</th>
                            <th>Fecha</th>
                            <th width="100">Estado</th>
                            <th width="90">Atajos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanciones_deserciones as $sancion_desercion)
                        <tr>
                            <td><a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}">{{ $sancion_desercion->causa->nombre }}</a></td>
                            <td><a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}">{{ $sancion_desercion->fecha }}</a></td>
                            <td><a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}">{{ $sancion_desercion->estado }}</a></td>
                            <td>
                                <div class="row justify-content-start">
                                    @if ($sancion_desercion->estado == 'Activo')
                                    <!-- Print -->
                                    <div class="col-2 mr-2">
                                        <a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/print" class="text-custom mr-5">
                                            <i class="bx bx-printer font-size-18 align-middle mr-3 mt-"></i>
                                        </a>
                                    </div>

                                    <!-- Edit -->
                                    <div class="col-2 mr-2">
                                        <a href="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/edit" class="text-custom mr-5">
                                            <i class="bx bx-edit-alt font-size-18 align-middle mr-3 mt-"></i>
                                        </a>
                                    </div>

                                    <!-- Anull -->
                                    <div class="col-2 mr-2">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('anull-button-{{ $sancion_desercion->id }}').click();"
                                            class="text-custom">
                                            <i class="bx bx-block font-size-18 align-middle mr-3"></i>
                                        </a>
                                        <form action="/movimientos/estudiantes/sanciones-deserciones/{{ $sancion_desercion->id }}/anull" method="POST" hidden
                                            onsubmit="return confirm('¿Está seguro de que desea anular esta sanción?');"> @method('PATCH') @csrf
                                            <button id="anull-button-{{ $sancion_desercion->id }}" type="submit" hidden></button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @elseif ($inscripcion_seleccionada->estado == 'Desertado')
                <!-- Anull -->
                <p>Esta inscripción se encuentra actualmente en un estado <b>desertado</b>, en caso de querer volver a reactivar esta inscripción,
                    <a href="#" onclick="event.preventDefault(); document.getElementById('reactivate-button-{{ $inscripcion_seleccionada->id }}').click();"
                        class="text-custom">
                        presione este link.
                    </a>
                </p>
                <form action="/movimientos/estudiantes/inscripciones/{{ $inscripcion_seleccionada->id }}/reactivate" method="POST" hidden
                    onsubmit="return confirm('¿Está seguro de que desea reactivar esta inscripción?');"> @method('PATCH') @csrf
                    <button id="reactivate-button-{{ $inscripcion_seleccionada->id }}" type="submit" hidden></button>
                </form>
                @endif
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

<!-- Datatables -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection