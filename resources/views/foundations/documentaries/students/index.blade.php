@section('title', 'Estudiantes')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Fundaciones</li>
                    <li class="breadcrumb-item">Documentales</li>
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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Estudiantes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="form" style="margin-bottom: -40px !important;" autocomplete="off" class="needs-validation" novalidate>
                                <input id="id" name="id" type="hidden">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Guardián</label>
                                    <div class="col-lg-10">
                                        <select id="guardian_id" name="guardian_id" class="form-control select2">
                                            <option disabled selected value="">Seleccione un guardián</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nombre</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Apellido</label>
                                    <div class="col-lg-10">
                                        <input id="lastname" name="lastname" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Número de Documento</label>
                                    <div class="col-lg-10">
                                        <input id="document_number" name="document_number" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nacionalidad</label>
                                    <div class="col-lg-10">
                                        <select id="nationality_id" name="nationality_id" class="form-control select2">
                                            <option disabled selected value="">Seleccione una nacionalidad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Fecha de nacimiento</label>
                                    <div class="col-lg-10">
                                        <input id="birth_date" name="birth_date" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Sexo</label>
                                    <div class="col-lg-10">
                                        <select id="sex" name="sex" class="form-control" required>
                                            <option disabled selected value="">Seleccione un sexo</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Creado el</label>
                                    <div class="col-lg-10">
                                        <input id="created_at" name="created_at" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Actualizado el</label>
                                    <div class="col-lg-10">
                                        <input id="updated_at" name="updated_at" type="text" class="form-control" readonly>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    <button id="delete" type="button" class="btn btn-danger">Eliminar</button>
                    <button id="save" type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table table-hover dt-responsive nowrap"></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function loadTable() {
        $('#table').DataTable({
            destroy: true,
            responsive: true,
            language: SPANISH,
            ajax: {
                type: "GET",
                url: '/foundations/documentaries/students/getAll',
                dataSrc: ""
            },
            dom: 'l<"toolbar">frtip',
            initComplete: function() {
                $("div.toolbar").html('<button id="add" class="btn btn-sm btn-primary ml-3"><i class="fa fa-plus"></i></button>');
            },
            columnDefs: [{
                    "title": "",
                    "targets": 0
                },
                {
                    "title": "Nombre y apellido",
                    "targets": 1
                },
                {
                    "title": "Tipo de documento",
                    "targets": 2
                },
                {
                    "title": "Número de documento",
                    "targets": 3
                },
            ],
            columns: [{
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                            <button type="button" class="btn btn-sm btn-primary detalle float-left" data-action="getOne" data-id="${data.id}">
                            <i class='fa fa-chevron-down'></i>
                            </button>
                        `;
                    },
                },
                {
                    "data": null,
                    "render": function(data) {
                        return `${data.name} ${data.lastname}`;
                    }
                },
                {
                    "data": "document_type"
                },
                {
                    "data": "document_number"
                },
            ],
        })
    }

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/students/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#guardian_id').val(data.guardian_id).change();
            $('#name').val(data.name);
            $('#lastname').val(data.lastname);
            $('#document_type').val(data.document_type).change();
            $('#document_number').val(data.document_number);
            $('#nationality_id').val(data.nationality_id).change();
            $('#birth_date').val(data.birth_date.replace(/\//g, "-"));
            $('#sex').val(data.sex).change();
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());
        }).fail(function() {
            fail();
        });
    }

    function store() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/students/store',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'guardian_id',
                'name',
                'lastname',
                'document_type',
                'document_number',
                'nationality_id',
                'birth_date',
                'sex'
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/students/update',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'guardian_id',
                'name',
                'lastname',
                'document_type',
                'document_number',
                'nationality_id',
                'birth_date',
                'sex'
            ]);
        });
    }

    function destroy() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/students/destroy',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();

        }).fail(function() {
            fail();
        });
    }

    $(document).ready(function() {
        loadTable();
        loadSelectGuardian();
        loadSelectNationality();

        $(document).on('click', '.detalle', function() {
            show($(this).attr('data-id'));
        });

        $(document).on('click', '#save', function() {
            action = ($('#id').val()) ? update() : store();
        });

        $(document).on('click', '#delete', function() {
            destroy();
        });
    });
</script>
@endsection