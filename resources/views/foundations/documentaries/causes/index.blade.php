@section('title', 'Causas')

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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Causas</h5>
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
                                    <label class="col-lg-2 col-form-label">Tipo</label>
                                    <div class="col-lg-10">
                                        <select id="type" name="type" class="form-control select2">
                                            <option disabled selected value="">Seleccione un tipo</option>
                                            <option value="Justificativo">Justificativo</option>
                                            <option value="Deserción">Deserción</option>
                                            <option value="Sanción">Sanción</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nombre</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="search" class="form-control" required>
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
                url: '/foundations/documentaries/causes/getAll',
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
                    "title": "Tipo",
                    "targets": 1
                },
                {
                    "title": "Nombre",
                    "targets": 2
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
                    "data": "type"
                },
                {
                    "data": "name"
                },
            ],
        })
    }

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/causes/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#type').val(data.name).change();
            $('#name').val(data.name);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());
        }).fail(function() {
            fail();
        });
    }

    function store() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/causes/store',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'type',
                'name',
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/causes/update',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'type',
                'name',
            ]);
        });
    }

    function destroy() {
        $.ajax({
            type: "GET",
            url: '/foundations/documentaries/causes/destroy',
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