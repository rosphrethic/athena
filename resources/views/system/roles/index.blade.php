@section('title', 'Roles y Asignaciones')

@section('css')
<style>
    #table-auxiliary td:nth-child(3) {
        width: 35% !important;
    }
</style>
@endsection

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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Roles</h5>
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <table id="table-auxiliary" class="table table-hover dt-responsive nowrap"></table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
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
        $('#table-auxiliary').DataTable({
            destroy: true,
            responsive: true,
            language: SPANISH,
            ajax: {
                type: "GET",
                url: '/system/roles/getAllUsers',
                dataSrc: ""
            },
            columnDefs: [{
                    "title": "Nombre y Apellido",
                    "targets": 0
                },
                {
                    "title": "C.I.",
                    "targets": 1
                },
                {
                    "title": "Rol",
                    "targets": 2
                },
            ],
            columns: [{
                    "data": null,
                    "render": function(data) {
                        return `${data.user.name} ${data.user.lastname}`;
                    }
                },
                {
                    "data": "user.ci"
                },
                {
                    "data": null,
                    "render": function(data) {
                        return `
                                <select name="role_id" class="form-control-sm select2 detalle role_id">
                                    <option selected value="${data.role.id}"/>${data.role.name}</option>
                                </select>
                                `;
                    }
                },
            ],
        });

        $('#table').DataTable({
            destroy: true,
            responsive: true,
            language: SPANISH,
            ajax: {
                type: "GET",
                url: '/system/roles/getAll',
                dataSrc: ""
            },
            dom: 'l<"toolbar">frtip',
            initComplete: function() {
                $("div.toolbar").html('<button id="add-alt" class="btn btn-sm btn-primary ml-3"><i class="fa fa-plus"></i></button>');
            },
            columnDefs: [{
                    "title": "",
                    "targets": 0
                },
                {
                    "title": "name",
                    "targets": 1
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

            ],

        })
    }

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/system/roles/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();
            hideDelete();

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());
            $('#status').val(data.status);

            (data.status == 'Activo') ? hideReactivate(): '';
            (data.status == 'Inactivo') ? hideDeactivate(): '';
            (data.status == 'Inactivo') ? hideSave(): '';
        }).fail(function() {
            fail();
        });
    }

    function store() {
        $.ajax({
            type: "GET",
            url: '/system/roles/store',
            data: $('#form').serialize()

        }).done(function() {
            success();
            loadSelectRole();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/system/roles/update',
            data: $('#form').serialize()

        }).done(function() {
            success();
            loadSelectRole();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
            ]);
        });
    }

    function deactivate() {
        $.ajax({
            type: "GET",
            url: '/system/roles/deactivate',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
            loadSelectRole();

        }).fail(function() {
            fail();
        });
    }

    function reactivate() {
        $.ajax({
            type: "GET",
            url: '/system/roles/reactivate',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
            loadSelectRole();

        }).fail(function() {
            fail();
        });
    }

    $(document).ready(function() {
        loadTable();
        loadSelectRole();

        $(document).on('change', '.role_id', function() {
            let user_ci = $(this).closest('tr').find('td:nth-child(2)').get(0).innerHTML;
            let role_id = $(this).val();

            $.ajax({
                type: "GET",
                url: '/system/roles/assign',
                data: {
                    role_id: role_id,
                    ci: user_ci,
                }
            }).done(function() {
                loadTable();
                hideModal();
                hideProgressBar();
                hideButtons();

                toastr.success('La operación ha sido exitosa!')
            }).fail(function() {
                fail();
            });
        });

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

        $(document).on('click', '#add-alt', function() {
            resetId();
            resetForm();
            hideErrorsMessages();
            hideHiddenInputs();
            hideButtons();
            showClose();
            showSave();
            toggleModal();
        });

    });
</script>
@endsection