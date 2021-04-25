@section('title', 'Reportes de Fundaciones')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Sistema</li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="col-12">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-title">Generación de reporte en PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div id="container-iframe" class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="$('#iframe').attr('src', '');">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Reportes de Fundaciones <span id="company-data-name"></span></h4>
                <p class="card-title-desc">Complete los filtros correspondientes y luego presione el botón <span class="text-primary">Generar Reporte</span>.</p>

                <hr style="margin-top: -10px !important;">

                <div class="row">
                    <div class="col-12">
                        <form id="form">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Fundación</label>
                                <div class="col-lg-10">
                                    <select id="table" name="table" class="form-control select2">
                                        <option disabled selected value="">Seleccione una fundación</option>
                                        <optgroup label="Fundaciones Académicas">
                                            <option value="baccalaureates">Bachilleratos</option>
                                            <option value="sections">Secciones</option>
                                            <option value="areas">Áreas</option>
                                            <option value="subjects">Asignaturas</option>
                                            <option value="courses">Cursos</option>
                                        </optgroup>
                                        <optgroup label="Fundaciones Documentales">
                                            <option value="causes">Causas</option>
                                            <option value="nationalities">Nacionalidades</option>
                                            <option value="cities">Ciudades</option>
                                            <option value="guardians">Guardianes</option>
                                            <option value="students">Estudiantes</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Registrado entre</label>
                                <div class="col-lg-5">
                                    <input id="created_at_from" name="created_at_from" type="date" class="form-control">
                                </div>
                                <div class="col-lg-5">
                                    <input id="created_at_to" name="created_at_to" type="date" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Opciones de Impresión</label>
                                <div class="col-lg-5">
                                    <select id="size" name="size" class="form-control select2">
                                        <option value="a4">A4</option>
                                        <option value="legal">Legal</option>
                                        <option value="letter">Carta</option>
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <select id="orientation" name="orientation" class="form-control select2">
                                        <option value="portrait">Vertical</option>
                                        <option value="landscape">Horizontal</option>
                                    </select>
                                </div>
                            </div>

                            <div id="container_document_type" class="form-group row">
                                <label class="col-lg-2 col-form-label">Tipo de Documento</label>
                                <div class="col-lg-10">
                                    <select id="document_type" name="document_type" class="form-control select2">
                                        <option disabled selected value="">Seleccione un tipo de documento</option>
                                        <option value="Cédula de Identidad">Cédula de Identidad</option>
                                        <option value="Certificado de Nacimiento">Certificado de Nacimiento</option>
                                        <option value="Documento Extranjero">Documento Extranjero</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Sin Documento">Sin Documento</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div id="container_nationality_id" class="form-group row">
                                <label class="col-lg-2 col-form-label">Nacionalidad</label>
                                <div class="col-lg-10">
                                    <select id="nationality_id" name="nationality_id" class="form-control select2">
                                        <option disabled selected value="">Seleccione una nacionalidad</option>
                                    </select>
                                </div>
                            </div>

                            <div id="container_city_id" class="form-group row">
                                <label class="col-lg-2 col-form-label">Ciudad</label>
                                <div class="col-lg-10">
                                    <select id="city_id" name="city_id" class="form-control select2">
                                        <option disabled selected value="">Seleccione una ciudad</option>
                                    </select>
                                </div>
                            </div>

                            <div id="container_birth_date" class="form-group row">
                                <label class="col-lg-2 col-form-label">Nacido entre</label>
                                <div class="col-lg-5">
                                    <input id="birth_date_from" name="birth_date_from" type="date" class="form-control">
                                </div>
                                <div class="col-lg-5">
                                    <input id="birth_date_to" name="birth_date_to" type="date" class="form-control">
                                </div>
                            </div>

                            <div id="container_sex" class="form-group row">
                                <label class="col-lg-2 col-form-label">Sexo</label>
                                <div class="col-lg-10">
                                    <select id="sex" name="sex" class="form-control select2">
                                        <option disabled selected value="">Seleccione un sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>

                            <div id="container_columns" class="form-group row">
                                <label class="col-lg-2 col-form-label">Columnas a mostrar</label>
                                <div class="col-lg-10">
                                    <ul id="columns" class="list-group"></ul>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-10">
                                    <p>Los filtros <span class="text-primary">Registrado Entre, Tipo de documento</span>, <span class="text-primary">Nacionalidad</span>, <span class="text-primary">Ciudad</span>, <span class="text-primary">Nacido entre</span> y <span class="text-primary">Sexo</span> son opcionales. Dejar un filtro sin seleccionar es sinónimo de seleccionar <span class="text-primary">todos los ítems</span> de ese filtro.</p>
                                </div>
                                <div id="container_generate" class="col-lg-2">
                                    <button id="generate" type="button" class="btn btn-primary float-right"><i class="fa fa-print mr-2"></i> Generar Reporte</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            loadSelectNationality();
            loadSelectCity();
            toggleContainerVisibility([], [
                containerColumns,
                containerGenerate,
                containerDocumentType,
                containerNationalityId,
                containerCityId,
                containerBirthDate,
                containerSex,
            ]);      

            $(document).on('change', '#table', function() {
                let selectedTable = $('#table option:selected').val();

                switch (selectedTable) {
                    case 'areas':
                        toggleColumnVisibility([
                            name, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'sections':
                        toggleColumnVisibility([
                            name, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'subjects':
                        toggleColumnVisibility([
                            areaId, 
                            name, 
                            acronym, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'baccalaureates':
                        toggleColumnVisibility([
                            name, 
                            acronym, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'grades':
                        toggleColumnVisibility([
                            name, 
                            nameAlternative, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'nationalities':
                        toggleColumnVisibility([
                            name, 
                            acronym, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'causes':
                        toggleColumnVisibility([type, 
                            name, 
                            acronym, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'cities':
                        toggleColumnVisibility([
                            name, 
                            acronym, 
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([containerColumns], [
                            containerCityId,
                            containerNationalityId, 
                            containerBirthDate, 
                            containerBirthDateFrom, 
                            containerBirthDateTo, 
                            containerSex,
                        ])
                        break;

                    case 'students':
                        toggleColumnVisibility([
                            name, 
                            lastName, 
                            documentType, 
                            documentNumber, 
                            birthDate,
                            status, 
                            createdAt, 
                            updatedAt,
                        ]);

                        toggleContainerVisibility([
                            containerDocumentType, 
                            containerNationalityId, 
                            containerBirthDate, 
                            containerSex,
                            containerColumns,
                        ],[
                            containerCityId,
                        ]);
                        break;

                    case 'guardians':
                        toggleColumnVisibility([
                            cityId, 
                            name, 
                            lastName, 
                            documentType, 
                            documentNumber, 
                            address,
                            telephone,
                            telephoneAlternative,
                            status,
                            createdAt,
                            updatedAt
                        ]);
                      
                        toggleContainerVisibility([
                            containerDocumentType,
                            containerCityId,
                            containerColumns
                        ], [
                            containerNationalityId, 
                            containerBirthDate, 
                            containerSex,
                        ]);

                        break;
                
                    default:
                        break;
                }

                toggleContainerVisibility([containerGenerate],[]);
            });

            $(document).on('click', '#generate', function() {
                if ($('#table')) {
                    toggleModal();
                    showProgressBar();
                    
                    $('#container-iframe').empty();
                    $('#container-iframe').append(`
                        <iframe id="iframe" src="/reports/foundations/generatePDF?${$('#form').serialize()}" 
                        frameborder="0" style="width: 100%; height: 100vh;" onload="hideProgressBar()"></iframe>
                    `);
                }
            });

            $('#modal').on("hidden.bs.modal", function() {
                $('#iframe').attr('src', ``);
            });

        });
    </script>
@endsection