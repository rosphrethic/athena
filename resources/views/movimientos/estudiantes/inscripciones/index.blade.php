@section('title', 'Inscripciones')

@section('css')
<!-- Datatable -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />

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
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-body">

                <!-- Titulo y descripcion de la carta -->
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h4 class="card-title">Cursos activos</h4>
                        @empty(Request()->curso_id) <p class="card-title-desc">Seleccione un curso para ver los estudiantes inscriptos</p> @endempty
                        @isset(Request()->curso_id) <p class="card-title-desc">Aquí puede ver los detalles del curso seleccionado</p> @endisset
                        <p></p>
                    </div>

                    <div class="col-12 col-lg-4">
                        <form action="/movimientos/estudiantes/inscripciones">
                            <select name="curso_id" id="curso_id" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" @if(Request()->curso_id == $curso->id) selected @endif>{{ $curso->nivel_acronimo }} {{ $curso->numero }}°
                                    "{{ $curso->seccion->nombre }}" {{ $curso->turno }} @if($curso->bachillerato_id) ({{ $curso->bachillerato->acronimo }}) @endif</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <hr class="add-button-hr">

                @if (Request()->curso_id)
                <!-- Detalles -->
                <div class="form-group row">
                    <label for="nivel" class="col-md-4 col-form-label">Nivel</label>
                    <div class="col-md-8 mt-2">
                        <p name="nivel">{{ $curso_seleccionado->nivel }} ({{ $curso_seleccionado->nivel_acronimo }})</p>
                    </div>

                    @if($curso_seleccionado->bachillerato_id)
                    <label for="bachillerato_id" class="col-md-4 col-form-label">Bachillerato</label>
                    <div class="col-md-8 mt-2">
                        <a href="/referenciales/academicos/bachilleratos/{{ $curso_seleccionado->bachillerato_id }}">{{ $curso_seleccionado->bachillerato->nombre }}</a>
                    </div>
                    @endif

                    <label for="numero" class="col-md-4 col-form-label">Número</label>
                    <div class="col-md-8 mt-2">
                        <p name="numero">{{ $curso_seleccionado->numero }}</p>
                    </div>

                    <label for="seccion_id" class="col-md-4 col-form-label">Sección</label>
                    <div class="col-md-8 mt-2">
                        <a href="/referenciales/academicos/secciones/{{ $curso_seleccionado->seccion_id }}">{{ $curso_seleccionado->seccion->nombre }}</a>
                    </div>

                    <label for="turno" class="col-md-4 col-form-label">Turno</label>
                    <div class="col-md-8 mt-2">
                        <p name="turno">{{ $curso_seleccionado->turno }}</p>
                    </div>

                    <label for="fecha_inicio" class="col-md-4 col-form-label">Inicia el</label>
                    <div class="col-md-8 mt-2">
                        <p name="fecha_inicio">{{ $curso_seleccionado->fecha_inicio }}</p>
                    </div>

                    <label for="fecha_finalizacion" class="col-md-4 col-form-label">Finaliza el</label>
                    <div class="col-md-8 mt-2">
                        <p name="fecha_finalizacion">{{ $curso_seleccionado->fecha_finalizacion }}</p>
                    </div>
                </div>

                <!-- Subtitulo -->
                <h4 class="card-title">Requisitos de inscripción</h4>
                <p class="card-title-desc">Aquí puedes ver los requisitos de inscripción</p>

                <hr style="margin-top: -10px !important;">

                <!-- Detalles -->
                <div class="form-group row">
                    <div class="col-md-12 mb-2">
                        @foreach ($requisitos as $keys => $requisito)
                        <p name="requisito">- {{ $requisito->nombre }}</p>
                        @endforeach
                    </div>
                </div>

                <!-- Subtitulo -->
                <h4 class="card-title">Matrícula y cuota</h4>
                <p class="card-title-desc">Aquí puedes ver el precio de la matrícula y las cuotas</p>

                <hr style="margin-top: -10px !important;">

                <!-- Detalles -->
                <div class="form-group row">
                    <label for="matricula" class="col-md-4 col-form-label">Matrícula</label>
                    <div class="col-md-8 mt-2">
                        <p name="matricula">{{ $curso_seleccionado->matricula }} PYG</p>
                    </div>

                    <label for="cuota" class="col-md-4 col-form-label">Cuota</label>
                    <div class="col-md-8 mt-2">
                        <p name="cuota">{{ $curso_seleccionado->cuota }} PYG</p>
                    </div>

                    <label for="cuota_cantidad" class="col-md-4 col-form-label">Cantidad de cuotas</label>
                    <div class="col-md-8 mt-2">
                        <p name="cuota_cantidad">{{ $curso_seleccionado->cuota_cantidad }}</p>
                    </div>


                    <div class="col-md-12 mt-2">
                        <a href="/movimientos/planes/cursos/{{ $curso_seleccionado->id }}" target="_blank">Ver más detalles</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-body">

                <!-- Titulo y descripcion de la carta -->
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h4 class="card-title">Gestión de @yield('title')</h4>
                        @empty(Request()->curso_id) <p class="card-title-desc">Seleccione un curso para ver los estudiantes inscriptos</p> @endempty
                        @isset(Request()->curso_id) <p class="card-title-desc">Presione una inscripción para ver más detalles</p> @endisset
                        <p></p>
                    </div>

                    <div class="col-12 col-lg-4">
                        <a href="/movimientos/estudiantes/inscripciones/create" class="btn btn-custom btn-block">
                            <i class="bx bx-plus font-size-16 align-middle mr-1"></i> Agregar Inscripción
                        </a>
                    </div>
                </div>

                <hr class="add-button-hr">

                @if (Request()->curso_id)
                <!-- Tabla -->
                <table id="datatable" data-display-length='-1' class="table table-hover dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="1">Número de documento</th>
                            <th>Nombre y apellido</th>
                            <th width="100">Estado</th>
                            <th width="60">Atajos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscripciones as $inscripcion)
                        <tr>
                            <td><a href="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}">{{ $inscripcion->persona->documento_numero }}</a></td>
                            <td><a href="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}">{{ $inscripcion->persona->nombre }}
                                    {{ $inscripcion->persona->apellido }}</a></td>
                            <td><a href="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}">{{ $inscripcion->estado }}</a></td>
                            <td>
                                <div class="row justify-content-start">
                                    @if ($inscripcion->estado == 'Activo')
                                    <!-- Print -->
                                    <div class="col-2 mr-2">
                                        <a href="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}/print" class="text-custom mr-5">
                                            <i class="bx bx-printer font-size-18 align-middle mr-3 mt-"></i>
                                        </a>
                                    </div>

                                    <!-- Anull -->
                                    <div class="col-2 mr-2">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('anull-button-{{ $inscripcion->id }}').click();"
                                            class="text-custom">
                                            <i class="bx bx-block font-size-18 align-middle mr-3"></i>
                                        </a>
                                        <form action="/movimientos/estudiantes/inscripciones/{{ $inscripcion->id }}/anull" method="POST" hidden
                                            onsubmit="return confirm('¿Está seguro de que desea anular esta inscripción ?');"> @method('PATCH') @csrf
                                            <button id="anull-button-{{ $inscripcion->id }}" type="submit" hidden></button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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

<!-- Select2 -->
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

<!-- Advanced Forms -->
<script src="{{ asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#datatable-special").DataTable({
            destroy: true,
            paging: false,
            language: {
                url:
                    "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection