@section('title', 'Sedes')

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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Sedes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="form" style="margin-bottom: -40px !important;" autocomplete="off">
                                <input id="id" name="id" type="hidden">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nombre</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Acrónimo</label>
                                    <div class="col-lg-10">
                                        <input id="acronym" name="acronym" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Teléfono</label>
                                    <div class="col-lg-10">
                                        <input id="telephone" name="telephone" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Dirección</label>
                                    <div class="col-lg-10">
                                        <input id="address" name="address" type="search" class="form-control" required>
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
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Estado</label>
                                    <div class="col-lg-10">
                                        <input id="status" name="status" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    <button id="deactivate" type="button" class="btn btn-warning">Desactivar</button>
                    <button id="reactivate" type="button" class="btn btn-success">Reactivar</button>
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
                url: '/system/branches/getAll',
                dataSrc: ""
            },
            dom: 'l<"toolbar">frtip',
            initComplete: function() {
                $("div.toolbar").html('<button id="add" class="btn btn-sm btn-primary ml-3"><i class="fa fa-plus"></i></button>');
            },
            columnDefs: [{
                    "title": "",
                    "targets": 0
                }, {
                    "title": "Nombre",
                    "targets": 1
                },
                {
                    "title": "Acrónimo",
                    "targets": 2
                },
                {
                    "title": "Teléfono",
                    "targets": 3
                },
                {
                    "title": "Dirección",
                    "targets": 4
                },
                {
                    "title": "Estado",
                    "targets": 5
                },

            ],
            columns: [{
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                            <button type="button" class="btn btn-sm btn-primary detalle float-right" data-action="getOne" data-id="${data.id}">
                            <i class='fa fa-chevron-down'></i>
                            </button>
                        `;
                    },
                },
                {
                    "data": "name"
                },
                {
                    "data": "acronym"
                },
                {
                    "data": "telephone"
                },
                {
                    "data": "address"
                },
                {
                    "data": "status"
                },

            ],
        })
    }

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/system/branches/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#acronym').val(data.acronym);
            $('#telephone').val(data.telephone);
            $('#address').val(data.address);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());
            $('#status').val(data.status);

            (data.status == 'Activo') ? hideReactivate(): '';
            (data.status == 'Inactivo') ? hideDeactivate(): '';
            (data.status == 'Inactivo') ? hideDelete(): '';
            (data.status == 'Inactivo') ? hideSave(): '';

        }).fail(function() {
            fail();
        });
    }

    function store() {
        $.ajax({
            type: "GET",
            url: '/system/branches/store',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
                'acronym',
                'telephone',
                'address'
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/system/branches/update',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
                'acronym',
                'telephone',
                'address'
            ]);
        });
    }

    function deactivate() {
        $.ajax({
            type: "GET",
            url: '/system/branches/deactivate',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
        }).fail(function() {
            fail();
        });
    }

    function reactivate() {
        $.ajax({
            type: "GET",
            url: '/system/branches/reactivate',
            data: {
                id: $('#id').val(),
            }
        }).done(function(data) {
            success();
        }).fail(function() {
            fail();
        });
    }

    function destroy() {
        $.ajax({
            type: "GET",
            url: '/system/branches/destroy',
            data: {
                id: $('#id').val(),
            }
        }).done(function(data) {
            success();
        }).fail(function() {
            fail();
        });
    }

    $(document).ready(function() {
        loadTable();

        $(document).on('click', '.detalle', function() {
            show($(this).attr('data-id'));
        });

        $(document).on('click', '#save', function() {
            action = ($('#id').val()) ? update() : store();
        });

        $(document).on('click', '#deactivate', function() {
            deactivate();
        });

        $(document).on('click', '#reactivate', function() {
            reactivate();
        });

        $(document).on('click', '#delete', function() {
            destroy();
        });
    });
</script>
@endsection