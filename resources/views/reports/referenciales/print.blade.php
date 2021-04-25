@section('title', 'Informes de Referenciales')

@section('css')
<!-- Datatable -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />

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

    #cabecera {
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
                    <li class="breadcrumb-item">Informes</li>
                    <li class="breadcrumb-item active">Referenciales</li>
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

                @isset(Request()->header)
                <!-- Cabecera -->
                <div id='cabecera' class="mb-3 @isset(Request()->graphics) graphics-enabled @endisset">
                    <span id="generado-el" class="position-absolute font-size-11 mt-3" style="right: 0; margin-right: 40px">Generado el {{ date('Y-m-d') }}
                        {{ date('g:i a') }}</span>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 invoice-title media mb-1 text-center d-block">
                            <img src="{{ asset('storage/emblema/emblema.png') }}" alt="Emblema de las mercedes" height="70" class="mt-4">
                            <h5 class="mt-3 font-15">{{ $dato_organizacion->nombre }}</h5>
                            <p class="">{{ $dato_organizacion->nombre_administracion }} - Informe de {{ Request()->referencial }}</p>
                        </div>
                    </div>
                </div>
                @endisset


                <div class="table-responsive">
                    <table id="datatable-improved" class="table @empty(Request()->big_table) table-md @endempty">
                        <thead>
                            <tr>
                                @switch(Request()->referencial)

                                @case('secciones')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_nombre_alternativo)<th>Nombre alternativo</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('areas')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('asignaturas')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_nombre)<th>Área</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_nombre)<th>Acrónimo</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('bachilleratos')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_acronimo)<th>Acrónimo</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('nacionalidades')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_acronimo)<th>Acrónimo</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('ciudades')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_acronimo)<th>Acrónimo</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('estudiantes')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_documento_tipo)<th>Tipo de documento</th>@endisset
                                @isset(Request()->campo_documento_numero)<th>Número de documento</th>@endisset
                                @isset(Request()->campo_nombre_apellido)<th>Nombre y apellido</th>@endisset
                                @isset(Request()->campo_nacionalidad_id)<th>Nacionalidad</th>@endisset
                                @isset(Request()->campo_sexo)<th>Sexo</th>@endisset
                                @isset(Request()->campo_nacido_el)<th>Nacido el</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('guardianes')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_documento_tipo)<th>Tipo de documento</th>@endisset
                                @isset(Request()->campo_documento_numero)<th>Número de documento</th>@endisset
                                @isset(Request()->campo_nombre_apellido)<th>Nombre y apellido</th>@endisset
                                @isset(Request()->campo_direccion)<th>Dirección</th>@endisset
                                @isset(Request()->campo_telefono)<th>Teléfono</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @case('causas')
                                @isset(Request()->numbers)<th width="1">#</th>@endisset
                                @isset(Request()->campo_id)<th>ID</th>@endisset
                                @isset(Request()->campo_user_id)<th>Creado por</th>@endisset
                                @isset(Request()->campo_tipo)<th>Tipo</th>@endisset
                                @isset(Request()->campo_nombre)<th>Nombre</th>@endisset
                                @isset(Request()->campo_estado)<th>Estado</th>@endisset
                                @isset(Request()->campo_creado_el)<th>Creado el</th>@endisset
                                @isset(Request()->campo_actualizado_el)<th>Actualizado el</th>@endisset
                                @break

                                @default

                                @endswitch

                            </tr>
                        </thead>
                        <tbody>
                            @switch(Request()->referencial)
                            @case('secciones')
                            @foreach ($secciones as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_nombre)<td>{{ $data->nombre }}</td>@endisset
                                @isset(Request()->campo_nombre_alternativo)<td>{{ $data->nombre_alternativo }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('areas')
                            @foreach ($areas as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_nombre)<td>{{ $data->nombre }}</td>@endisset
                                @isset(Request()->campo_nombre_alternativo)<td>{{ $data->nombre_alternativo }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('asignaturas')
                            @foreach ($asignaturas as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_area_id)<td>{{ $data->area->nombre }}</td>@endisset
                                @isset(Request()->campo_nombre)<td>{{ $data->nombre }}</td>@endisset
                                @isset(Request()->campo_acronimo)<td>{{ $data->acronimo }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('bachilleratos')
                            @foreach ($bachilleratos as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_nombre)<td>{{ $data->nombre }}</td>@endisset
                                @isset(Request()->campo_acronimo)<td>{{ $data->acronimo }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('nacionalidades')
                            @foreach ($nacionalidades as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_nombre)<td>{{ $data->nombre }}</td>@endisset
                                @isset(Request()->campo_acronimo)<td>{{ $data->acronimo }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('ciudades')
                            @foreach ($ciudades as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_nombre)<td>{{ $data->nombre }}</td>@endisset
                                @isset(Request()->campo_acronimo)<td>{{ $data->acronimo }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('estudiantes')
                            @foreach ($estudiantes as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->created_by }}</td>@endisset
                                @isset(Request()->campo_documento_tipo)<td>{{ $data->documento_tipo }}</td>@endisset
                                @isset(Request()->campo_documento_numero)<td>{{ $data->documento_numero }}</td>@endisset
                                @isset(Request()->campo_nombre_apellido)<td>{{ $data->nombre }} {{ $data->apellido }}</td>@endisset
                                @isset(Request()->campo_nacionalidad_id)<td>{{ $data->nacionalidad }}</td>@endisset
                                @isset(Request()->campo_sexo)<td>{{ $data->sexo }}</td>@endisset
                                @isset(Request()->campo_nacido_el)<td>{{ $data->fecha_nacimiento }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('guardianes')
                            @foreach ($guardianes as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->created_by }}</td>@endisset
                                @isset(Request()->campo_documento_tipo)<td>{{ $data->documento_tipo }}</td>@endisset
                                @isset(Request()->campo_documento_numero)<td>{{ $data->documento_numero }}</td>@endisset
                                @isset(Request()->campo_nombre_apellido)<td>{{ $data->nombre }} {{ $data->apellido }}</td>@endisset
                                @isset(Request()->campo_telefono)<td>{{ $data->telefono }}</td>@endisset
                                @isset(Request()->campo_direccion)<td>{{ $data->ciudad }}, {{ $data->direccion }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @case('causas')
                            @foreach ($causas as $key => $data)
                            <tr>
                                @isset(Request()->numbers)<td>{{ $key + 1 }}</td>@endisset
                                @isset(Request()->campo_id)<td>{{ $data->id }}</td>@endisset
                                @isset(Request()->campo_user_id)<td>{{ $data->user->name }}</td>@endisset
                                @isset(Request()->campo_tipo)<td>{{ $data->tipo }}</td>@endisset
                                @isset(Request()->campo_descripcion)<td>{{ $data->descripcion }}</td>@endisset
                                @isset(Request()->campo_estado)<td>{{ $data->estado }}</td>@endisset
                                @isset(Request()->campo_creado_el)<td>{{ $data->creado_el }}</td>@endisset
                                @isset(Request()->campo_actualizado_el)<td>{{ $data->actualizado_el }}</td>@endisset
                            </tr>
                            @endforeach
                            @break

                            @default
                            <span class='text-danger'>Hubo un error</span>
                            @endswitch
                        </tbody>
                    </table>
                </div>

                <hr class="d-print-none">

                <div class="row justify-content-end d-print-none">
                    <div class="col-12 col-lg-2">
                        <a href="/informes/referenciales">
                            <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light float-left">
                                <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                            </button>
                        </a>
                    </div>

                    <div class="col-12 col-lg-8"></div>

                    <div class="col-12 col-lg-2">
                        <a href="javascript:window.print()" id="print" class="btn btn-custom waves-effect btn-block waves-light"><i class="fa fa-print  mr-2"></i>Imprimir
                            Informe</a>
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

@isset(Request()->searchbar)
<script>
    $(document).ready(function() {
            $('#datatable-improved').DataTable({
                destroy: true,
                "bPaginate": false,
                "bInfo": false,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },            
            });
        });
</script>
@endisset

@isset(Request()->auto_print)
<script>
    setTimeout(function(){
                javascript:window.print();
            }, 1300);
</script>
@endisset
@endsection