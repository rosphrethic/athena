@section('title', 'Guardianes')

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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Guardianes</h5>
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
                                    <label class="col-lg-2 col-form-label">Ciudad</label>
                                    <div class="col-lg-10">
                                        <select id="city_id" name="city_id" class="form-control select2">
                                            <option disabled selected value="">Seleccione una ciudad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Dirección</label>
                                    <div class="col-lg-10">
                                        <input id="address" name="address" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Teléfono</label>
                                    <div class="col-lg-10">
                                        <input id="telephone" name="telephone" type="search" class="form-control input-mask" data-inputmask="'mask': '(9999)-999-999'" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Encargado de</label>
                                    <div class="col-lg-10">
                                        <select id="students" name="students" class="form-control select2"></select>
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
                url: '/foundations/documentaries/guardians/getAll',
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
                {
                    "title": "Teléfono",
                    "targets": 4
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
                {
                    "data": "telephone"
                },
            ],
        })
    }

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/guardians/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#lastname').val(data.lastname);
            $('#document_type').val(data.document_type).change();
            $('#document_number').val(data.document_number);
            $('#city_id').val(data.city_id).change();
            $('#address').val(data.address);
            $('#telephone').val(data.telephone);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());

            $('#students_container').show();
            $('#students').empty();

            if (data.student.length > 0) {
                for (let i = 0; i < data.student.length; i++) {
                    $('#students').append(`<option>${data.student[i].document_number} - ${data.student[i].name} ${data.student[i].lastname}</option>`);
                }
            } else {
                $('#students').append(`<option>Ningún estudiante</option>`);
            }
        }).fail(function() {
            fail();
        });
    }

    function store() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/guardians/store',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
                'lastname',
                'document_type',
                'document_number',
                'city_id',
                'address',
                'telephone'
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/guardians/update',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
                'lastname',
                'document_type',
                'document_number',
                'city_id',
                'address',
                'telephone'
            ]);
        });
    }

    function destroy() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/guardians/destroy',
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
        loadSelectCity();

        $('#students_container').hide();

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