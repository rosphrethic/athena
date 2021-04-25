@section('title', 'Informes de Referenciales')

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

                <!-- Titulo y descripcion de la carta -->
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <h4 class="card-title">@yield('title')</h4>
                        <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom">Generar Informe</span></p>
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/informes/referenciales">
                            <select name="referencial" id="referencial" class="form-control select2" onchange="this.form.submit()">
                                <option></option>
                                <option value="secciones" @if(Request()->referencial == 'secciones') selected @endif>Secciones</option>
                                <option value="areas" @if(Request()->referencial == 'areas') selected @endif>Áreas</option>
                                <option value="asignaturas" @if(Request()->referencial == 'asignaturas') selected @endif>Asignaturas</option>
                                <option value="bachilleratos" @if(Request()->referencial == 'bachilleratos') selected @endif>Bachilleratos</option>
                                <option value="nacionalidades" @if(Request()->referencial == 'nacionalidades') selected @endif>Nacionalidades</option>
                                <option value="ciudades" @if(Request()->referencial == 'ciudades') selected @endif>Ciudades</option>
                                <option value="estudiantes" @if(Request()->referencial == 'estudiantes') selected @endif>Estudiantes</option>
                                <option value="guardianes" @if(Request()->referencial == 'guardianes') selected @endif>Guardianes</option>
                                <option value="causas" @if(Request()->referencial == 'causas') selected @endif>Causas</option>
                            </select>
                        </form>
                    </div>
                </div>

                <hr class="add-button-hr">

                <!-- Contenido -->
                @isset(Request()->referencial)
                <form action="/informes/referenciales/print" method="GET">
                    <input type="hidden" name="referencial" value="{{ Request()->referencial }}">

                    @if (Request()->referencial == 'estudiantes')
                    <div class="form-group row">
                        <label for="documento_tipo" class="col-md-2 col-form-label">Tipo de documento</label>
                        <div class="col-md-10">
                            <select name="documento_tipo" id="documento_tipo" class="form-control select2 @error('documento_tipo') is-invalid @enderror" tabindex="0">
                                <option></option>
                                <option value="Cédula de Identidad" @if (old('documento_tipo')=='Cédula de Identidad' ) selected @endif>Cédula de Identidad</option>
                                <option value="Certificado de Nacimiento" @if (old('documento_tipo')=='Certificado de Nacimiento' ) selected @endif>Certificado de Nacimiento
                                </option>
                                <option value="Documento Extranjero" @if (old('documento_tipo')=='Documento Extranjero' ) selected @endif>Documento Extranjero</option>
                                <option value="Pasaporte" @if (old('documento_tipo')=='Pasaporte' ) selected @endif>Pasaporte</option>
                                <option value="Sin Documento" @if (old('documento_tipo')=='Sin Documento' ) selected @endif>Sin Documento</option>
                            </select>
                            @error('documento_tipo')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nacionalidad_id" class="col-md-2 col-form-label">Nacionalidad</label>
                        <div class="col-md-10">
                            <select name="nacionalidad_id" id="nacionalidad_id" class="form-control select2" tabindex="0">
                                <option></option>
                                @foreach ($nacionalidades as $nacionalidad)
                                <option value="{{ $nacionalidad->id }}" @if($nacionalidad->id == old('nacionalidad_id')) selected @endif>{{ $nacionalidad->nombre }}</option>
                                @endforeach
                            </select>
                            @error('nacionalidad_id')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nacido_entre" class="col-md-2 col-form-label">Nacido entre</label>
                        <div class="col-md-5">
                            <input id="nacido_desde" name="nacido_desde" class="form-control @error('nacido_desde') is-invalid @enderror" type="date"
                                value="{{ old('nacido_desde') }}" tabindex="0">
                        </div>
                        <div class="col-md-5">
                            <input id="nacido_hasta" name="nacido_hasta" class="form-control @error('nacido_hasta') is-invalid @enderror" type="date"
                                value="{{ old('nacido_hasta') }}" tabindex="0">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Sexo</label>
                        <div class="col-md-10">
                            <select id="sexo" name="sexo" class="form-control select2">
                                <option></option>
                                <option value="Masculino" @if(old('sexo')=='Masculino' ) selected @endif>Masculino</option>
                                <option value="Femenino" @if(old('sexo')=='Femenino' ) selected @endif>Femenino</option>
                            </select>
                            @error('sexo')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    @elseif (Request()->referencial == 'guardianes')
                    <div class="form-group row">
                        <label for="documento_tipo" class="col-md-2 col-form-label">Tipo de documento</label>
                        <div class="col-md-10">
                            <select name="documento_tipo" id="documento_tipo" class="form-control select2 @error('documento_tipo') is-invalid @enderror" tabindex="0">
                                <option></option>
                                <option value="Cédula de Identidad" @if (old('documento_tipo')=='Cédula de Identidad' ) selected @endif>Cédula de Identidad</option>
                                <option value="Certificado de Nacimiento" @if (old('documento_tipo')=='Certificado de Nacimiento' ) selected @endif>Certificado de Nacimiento
                                </option>
                                <option value="Documento Extranjero" @if (old('documento_tipo')=='Documento Extranjero' ) selected @endif>Documento Extranjero</option>
                                <option value="Pasaporte" @if (old('documento_tipo')=='Pasaporte' ) selected @endif>Pasaporte</option>
                                <option value="Sin Documento" @if (old('documento_tipo')=='Sin Documento' ) selected @endif>Sin Documento</option>
                            </select>
                            @error('documento_tipo')<p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ciudad_id" class="col-md-2 col-form-label">Ciudad</label>
                        <div class="col-md-10">
                            <select name="ciudad_id" id="ciudad_id" class="form-control select2" tabindex="0">
                                <option></option>
                                @foreach ($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" @if($ciudad->id == old('nacionalidad_id')) selected @endif>{{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>
                            @error('ciudad_id')<p class="error-message">{{ $message }}</p> @enderror
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

                    @if(Request()->referencial == 'secciones')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_secciones as $campo_seccion)
                                        <tr>
                                            <td class="pt-3">{{ $campo_seccion[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_seccion[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_seccion[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'areas')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_areas as $campo_area)
                                        <tr>
                                            <td class="pt-3">{{ $campo_area[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_area[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_area[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'asignaturas')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_asignaturas as $campo_asignatura)
                                        <tr>
                                            <td class="pt-3">{{ $campo_asignatura[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_asignatura[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_asignatura[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'bachilleratos')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_bachilleratos as $campo_bachillerato)
                                        <tr>
                                            <td class="pt-3">{{ $campo_bachillerato[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_bachillerato[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_bachillerato[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'nacionalidades')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_nacionalidades as $campo_nacionalidad)
                                        <tr>
                                            <td class="pt-3">{{ $campo_nacionalidad[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_nacionalidad[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_nacionalidad[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'ciudades')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_ciudades as $campo_ciudad)
                                        <tr>
                                            <td class="pt-3">{{ $campo_ciudad[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_ciudad[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_ciudad[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'estudiantes')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_estudiantes as $campo_estudiante)
                                        <tr>
                                            <td class="pt-3">{{ $campo_estudiante[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_estudiante[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_estudiante[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Request()->referencial == 'guardianes')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_guardianes as $campo_guardian)
                                        <tr>
                                            <td class="pt-3">{{ $campo_guardian[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_guardian[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_guardian[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif


                    @if(Request()->referencial == 'causas')
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Campos</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-1">
                                    <tbody>
                                        @foreach ($campos_causas as $campo_causa)
                                        <tr>
                                            <td class="pt-3">{{ $campo_causa[0] }}</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="campo_{{ $campo_causa[1] }}" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="campo_{{ $campo_causa[1] }}" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="tipo" class="col-md-2 col-form-label">Opciones</label>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td width class="pt-3">Habilitar columna de números</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="numbers" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="numbers" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width class="pt-3">Habilitar cabecera</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="header" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="header" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width class="pt-3">Habilitar gráficos de cabecera</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="graphics" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="graphics" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width class="pt-3">Habilitar grandes tablas</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="big_table" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="big_table" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width class="pt-3">Habilitar impresión automática</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="auto_print" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="auto_print" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width class="pt-3">Habilitar buscador</td>
                                            <td width="1">
                                                <div class="col-xl-6">
                                                    <div class="btn-group btn-group-toggle mt-2 mt-xl-0" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary btn-sm active">
                                                            <input type="radio" name="searchbar" value="true" checked>
                                                            <i class="bx bx-check font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                        <label class="btn btn-outline-primary btn-sm">
                                                            <input type="radio" name="searchbar" value="">
                                                            <i class="bx bx-x font-size-16 align-middle"></i>
                                                            </input>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-end">
                        <div class="col-12 col-lg-10">
                            @if (Request()->referencial == 'estudiantes')
                            <p class="card-title-desc text- float-left">Los filtros
                                <span class="text-custom">Tipo de documento</span>,
                                <span class="text-custom">Nacionalidad</span>,
                                <span class="text-custom">Nacido entre</span>,
                                <span class="text-custom">Sexo</span> y
                                <span class="text-custom">Estado</span> son opcionales. Dejar un filtro sin seleccionar es sinónimo de seleccionar
                                <span class="text-custom">todos los items</span> de ese filtro.
                            </p>
                            @else (Request()->referencial == 'guardianes')
                            <p class="card-title-desc text- float-left">Los filtros
                                <span class="text-custom">Tipo de documento</span>,
                                <span class="text-custom">Ciudad</span> y
                                <span class="text-custom">Estado</span> son opcionales. Dejar un filtro sin seleccionar es sinónimo de seleccionar
                                <span class="text-custom">todos los items</span> de ese filtro.
                            </p>
                            @endif

                        </div>
                        <div class="col-12 col-lg-2">
                            <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                <i class="bx bx-printer font-size-16 align-middle mr-1"></i> Generar Informe
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