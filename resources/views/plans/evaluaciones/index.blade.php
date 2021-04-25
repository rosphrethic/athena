@section('title', 'Evaluaciones')

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
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h4 class="card-title">Gestión de @yield('title')</h4>
                        <p class="card-title-desc">Presione una evaluación para ver más detalles</p>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/planes/evaluaciones">
                            <select name="curso_id" id="curso_id" class="form-control select2 select2-r" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" @if(Request()->curso_id == $curso->id) selected @endif>{{ $curso->nivel_acronimo }} {{ $curso->numero }}°
                                    "{{ $curso->seccion->nombre }}" {{ $curso->turno }} @if($curso->bachillerato_id) ({{ $curso->bachillerato->acronimo }}) @endif</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/planes/evaluaciones">
                            <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">
                            <select name="asignatura_id" id="asignatura_id" class="form-control select2 select2-r" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}" @if(Request()->asignatura_id == $asignatura->id) selected @endif>{{ $asignatura->asignatura->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <div class="col-12 col-lg-2">
                        <a href="/movimientos/planes/evaluaciones/create" class="btn btn-custom btn-block">
                            <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Agregar Evaluación
                        </a>
                    </div>
                </div>

                <hr class="add-button-hr">

                <!-- Tabla -->
                <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Etapa</th>
                            <th>Tipo</th>
                            <th>Ponderación</th>
                            <th>Tema</th>
                            <th>Fecha</th>
                            <th width="100">Estado</th>
                            <th width="90">Atajos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluaciones as $evaluacion)
                        <tr>
                            <td><a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}">{{ $evaluacion->etapa }}</a></td>
                            <td><a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}">{{ $evaluacion->tipo }}</a></td>
                            <td><a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}">{{ $evaluacion->ponderacion }}</a></td>
                            <td><a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}">{{ $evaluacion->tema }}</a></td>
                            <td><a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}">{{ $evaluacion->fecha }}</a></td>
                            <td><a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}">{{ $evaluacion->estado }}</a></td>
                            <td>
                                <div class="row justify-content-start">
                                    @if ($evaluacion->estado == 'Activo')
                                    <!-- Edit -->
                                    <div class="col-2 mr-2">
                                        <a href="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/edit" class="text-custom mr-5">
                                            <i class="bx bx-edit-alt font-size-18 align-middle mr-3 mt-"></i>
                                        </a>
                                    </div>

                                    <!-- Anull -->
                                    <div class="col-2 mr-2">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('anull-button-{{ $evaluacion->id }}').click();"
                                            class="text-custom">
                                            <i class="bx bx-block font-size-18 align-middle mr-3"></i>
                                        </a>
                                        <form action="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/anull" method="POST" hidden
                                            onsubmit="return confirm('¿Está seguro de que desea anular esta evaluación?');"> @method('PATCH') @csrf
                                            <button id="anull-button-{{ $evaluacion->id }}" type="submit" hidden></button>
                                        </form>
                                    </div>

                                    <!-- Delete -->
                                    <div class="col-2 mr-2">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-button-{{ $evaluacion->id }}').click();"
                                            class="text-custom">
                                            <i class="bx bx-trash font-size-18 align-middle mr-3"></i>
                                        </a>
                                        <form action="/movimientos/planes/evaluaciones/{{ $evaluacion->id }}/delete" method="POST" hidden
                                            onsubmit="return confirm('¿Está seguro de que desea eliminar esta evaluación?');"> @method('DELETE') @csrf
                                            <button id="delete-button-{{ $evaluacion->id }}" type="submit" hidden></button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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