@section('title', 'Informes Académicos')

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

                <!-- Cabecera -->
                <div class="row">
                    <div class="col-sm-12 invoice-title media mb-1">
                        <img class="d-flex mr-4" src="{{ asset('storage/emblema/emblema.png') }}" alt="Emblema de las mercedes" height="44">
                        <div class="media-body">
                            <h5 class="mt-0 font-16">{{ $dato_organizacion->nombre }}</h5>
                            {{ $dato_organizacion->nombre_administracion }} - Informe de {{ Request()->referencial }} - generado el {{ date('Y-m-d') }} {{ date('g:i a') }}
                        </div>
                    </div>
                </div>

                <hr>

                <div>
                    <table id="datatable-improved" class="table table-sm table-striped table-respon">
                        <thead>
                            <tr>
                                @switch(Request()->movimiento)

                                @case('cursos')
                                <th width="1">#</th>
                                <th>Sede</th>
                                <th>Año</th>
                                <th>Curso</th>
                                <th>Sección</th>
                                <th>Turno</th>
                                <th>Bachillerato</th>
                                <th>Matrícula</th>
                                <th>Cuota</th>
                                <th>Inicio - Fin</th>
                                <th width="1">Estado</th>
                                @break

                                @case('areas')
                                <th width="1">#</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                @break

                                @case('asignaturas')
                                <th width="1">#</th>
                                <th>Área</th>
                                <th>Nombre</th>
                                <th>Acrónimo</th>
                                <th>Estado</th>
                                @break

                                @case('bachilleratos')
                                <th width="1">#</th>
                                <th>Nombre</th>
                                <th>Acrónimo</th>
                                <th>Estado</th>
                                @break

                                @case('nacionalidades')
                                <th width="1">#</th>
                                <th>Nombre</th>
                                <th>Acrónimo</th>
                                <th>Estado</th>
                                @break

                                @case('ciudades')
                                <th width="1">#</th>
                                <th>Nombre</th>
                                <th>Acrónimo</th>
                                <th>Estado</th>
                                @break

                                @case('estudiantes')
                                <th width="1">#</th>
                                <th>Tipo de documento</th>
                                <th>Número de documento</th>
                                <th>Nombre y apellido</th>
                                <th>Nacionalidad</th>
                                <th>Sexo</th>
                                <th>Nacido el</th>
                                <th>Estado</th>
                                @break

                                @case('guardianes')
                                <th width="1">#</th>
                                <th>Tipo de documento</th>
                                <th>Número de documento</th>
                                <th>Nombre y apellido</th>
                                <th>Teléfono</th>
                                <th>Domicilio</th>
                                <th>Estado</th>
                                @break

                                @case('causas')
                                <th width="1">#</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                @break

                                @default

                                @endswitch

                            </tr>
                        </thead>
                        <tbody>
                            @switch(Request()->movimiento)
                            @case('cursos')
                            @foreach ($cursos as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->sede }}</td>
                                <td>{{ $data->ano }}</td>
                                <td>{{ $data->numero }}</td>
                                <td>{{ $data->seccion }}</td>
                                <td>{{ $data->turno }}</td>
                                <td>{{ $data->bachillerato }}</td>
                                <td>{{ $data->matricula }} PYG</td>
                                <td>{{ $data->cuota_cantidad }} x {{ $data->cuota }} PYG</td>
                                <td>{{ $data->fecha_inicio }} - {{ $data->fecha_finalizacion }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('areas')
                            @foreach ($areas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nombre }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('asignaturas')
                            @foreach ($asignaturas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->area->nombre }}</td>
                                <td>{{ $data->nombre }}</td>
                                <td>{{ $data->acronimo }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('bachilleratos')
                            @foreach ($bachilleratos as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nombre }}</td>
                                <td>{{ $data->acronimo }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('nacionalidades')
                            @foreach ($nacionalidades as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nombre }}</td>
                                <td>{{ $data->acronimo }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('ciudades')
                            @foreach ($ciudades as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nombre }}</td>
                                <td>{{ $data->acronimo }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('estudiantes')
                            @foreach ($estudiantes as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->documento_tipo }}</td>
                                <td>{{ $data->documento_numero }}</td>
                                <td>{{ $data->nombre }} {{ $data->apellido }}</td>
                                <td>{{ $data->nacionalidad }}</td>
                                <td>{{ $data->sexo }}</td>
                                <td>{{ $data->fecha_nacimiento }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('guardianes')
                            @foreach ($guardianes as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->documento_tipo }}</td>
                                <td>{{ $data->documento_numero }}</td>
                                <td>{{ $data->nombre }} {{ $data->apellido }}</td>
                                <td>{{ $data->telefono }}</td>
                                <td>{{ $data->ciudad }}, {{ $data->direccion }}</td>
                                <td>{{ $data->estado }}</td>
                            </tr>
                            @endforeach
                            @break

                            @case('causas')
                            @foreach ($causas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->tipo }}</td>
                                <td>{{ $data->descripcion }}</td>
                                <td>{{ $data->estado }}</td>
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

                <div class="d-print-none">
                    <div class="float-right">
                        <a href="javascript:window.print()" class="btn btn-custom waves-effect btn-block waves-light"><i class="fa fa-print  mr-2"></i>Imprimir Informe</a>
                    </div>
                </div>

                <a href="/informes/referenciales" class="d-print-none">
                    <button type="button" class="btn btn-outline-dark btn-block waves-effect waves-light float-left">
                        <i class="bx bx-left-arrow-alt font-size-16 align-middle mr-1"></i> Regresar
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Contenido de la pagina -->
    <div class="col-lg-12 d-print-none">
        <div class="card">
            <div class="card-body" style="margin-bottom: -25px !important;">
                <h4 class="card-title">Filtros seleccionados</h4>
                <p class="card-title-desc">Aquí puede ver los filtros que se ha seleccionado</p>

                <hr style="margin-top: -10px !important;">

                <div class="form-group row">

                    @isset(Request()->documento_tipo)
                    <label for="documento_tipo" class="col-12 col-lg-2 col-form-label">Tipo de documento</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="documento_tipo">{{ $documento_tipo_seleccionado }}</p>
                    </div>
                    @endisset

                    @isset(Request()->nacionalidad_id)
                    <label for="nacionalidad" class="col-12 col-lg-2 col-form-label">Nacionalidad</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="nacionalidad">{{ $nacionalidad_seleccionada->nombre }}</p>
                    </div>
                    @endisset

                    @isset(Request()->nacido_desde)
                    <label for="ciudad" class="col-12 col-lg-2 col-form-label">Nacido entre</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="ciudad">{{ $nacido_entre_seleccionado[0] }} - {{ $nacido_entre_seleccionado[1] }}</p>
                    </div>
                    @endisset

                    @isset(Request()->ciudad_id)
                    <label for="ciudad" class="col-12 col-lg-2 col-form-label">Ciudad</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="ciudad">{{ $ciudad_seleccionada->nombre }}</p>
                    </div>
                    @endisset

                    @isset(Request()->sexo)
                    <label for="sexo" class="col-12 col-lg-2 col-form-label">Sexo</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="sexo">{{ $sexo_seleccionado }}</p>
                    </div>
                    @endisset

                    @isset(Request()->ano)
                    <label for="ano" class="col-12 col-lg-2 col-form-label">Año</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="ano">{{ $ano_seleccionado}}</p>
                    </div>
                    @endisset


                    @isset(Request()-nilver)
                    <label for="ano" class="col-12 col-lg-2 col-form-label">Nivel</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="nibek
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                ">{{ $ano_seleccionado}}</p>
                    </div>
                    @endisset

                    @isset(Request()->estado)
                    <label for="estado" class="col-12 col-lg-2 col-form-label">Estado</label>
                    <div class="col-10 col-lg-10 mt-2">
                        <p name="estado">{{ $estado_seleccionado}}</p>
                    </div>
                    @endisset
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

<script>
    $(document).ready(function() {
            $('#datatable-improved').DataTable({
                destroy: true,
                "bSort" : false,
                "bPaginate": false,
                "bInfo": false,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },            
            });
        });
</script>
@endsection