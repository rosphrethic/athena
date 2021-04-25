@section('title', 'Usuarios')

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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Usuarios</h5>
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
                                    <label class="col-lg-2 col-form-label">Apellido</label>
                                    <div class="col-lg-10">
                                        <input id="lastname" name="lastname" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Número C.I.</label>
                                    <div class="col-lg-10">
                                        <input id="ci" name="ci" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Correo</label>
                                    <div class="col-lg-10">
                                        <input id="email" name="email" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Contraseña</label>
                                    <div class="col-lg-10">
                                        <input id="password" name="password" type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Verificado</label>
                                    <div class="col-lg-10">
                                        <input id="verified" name="verified" type="search" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Intentos Fallidos</label>
                                    <div class="col-lg-10">
                                        <input id="failed_attempts" name="failed_attempts" type="search" class="form-control" readonly>
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
                    <button id="reset-verified" type="button" class="btn btn-warning">Resetear Verificación</button>
                    <button id="reset-attempts" type="button" class="btn btn-warning">Resetear Intentos</button>
                    <button id="deactivate" type="button" class="btn btn-warning">Desactivar</button>
                    <button id="reactivate" type="button" class="btn btn-success">Reactivar</button>
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
                url: '/system/users/getAll',
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
                    "title": "Nombre y apellido",
                    "targets": 1
                },
                {
                    "title": "Número de C.I.",
                    "targets": 2
                },
                {
                    "title": "Correo electrónico",
                    "targets": 3
                },
                {
                    "title": "Verificado",
                    "targets": 4
                },
                {
                    "title": "Intentos Fallidos",
                    "targets": 5
                },
                {
                    "title": "Estado",
                    "targets": 6
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
                    "data": "ci"
                },
                {
                    "data": "email"
                },
                {
                    "data": null,
                    "render": function(data) {
                        if (data.verified) {
                            return 'Sí';
                        } else {
                            return 'No';
                        }
                    }
                },
                {
                    "data": "failed_attempt"
                },
                {
                    "data": "status"
                },
            ],
        })
    };

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/system/users/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#lastname').val(data.lastname);
            $('#ci').val(data.ci);
            $('#email').val(data.email);
            ((data.verified) == 0) ? $('#verified').val('No'): $('#verified').val('Sí');
            $('#failed_attempts').val(data.failed_attempt);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());
            $('#status').val(data.status);

            (data.status == 'Activo') ? hideReactivate(): '';
            (data.status == 'Inactivo') ? hideDeactivate(): '';
            (data.status == 'Inactivo') ? hideSave(): '';
            (data.verified == 0) ? hideResetVerified(): '';
            (data.failed_attempt == 0) ? hideResetAttempts(): '';

        }).fail(function() {
            fail();
        });
    };

    function store() {
        $.ajax({
            type: "GET",
            url: '/system/users/store',
            data: $('#form').serialize()

        }).done(function() {
            success();
        }).fail(function(jqXhr) {
            console.log(jqXhr.responseJSON.errors);
            fail(jqXhr.responseJSON.errors, [
                'name',
                'lastname',
                'ci',
                'email',
                'password'
            ]);
        });
    };

    function update() {
        $.ajax({
            type: "GET",
            url: '/system/users/update',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'name',
                'lastname',
                'ci',
                'email',
                'password'
            ]);
        });
    };

    function resetVerified() {
        $.ajax({
            type: "GET",
            url: '/system/users/reset-verified',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
        }).fail(function() {
            fail();
        });
    };

    function resetAttempts() {
        $.ajax({
            type: "GET",
            url: '/system/users/reset-attempts',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
        }).fail(function() {
            fail();
        });
    };

    function deactivate() {
        $.ajax({
            type: "GET",
            url: '/system/users/deactivate',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
        }).fail(function() {
            fail();
        });
    };

    function reactivate() {
        $.ajax({
            type: "GET",
            url: '/system/users/reactivate',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            success();
        }).fail(function() {
            fail();
        });
    };

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

        $(document).on('click', '#reset-verified', function() {
            resetVerified();
        });

        $(document).on('click', '#reset-attempts', function() {
            resetAttempts();
        });

        $(document).on('click', '#delete', function() {
            destroy();
        });
    });
</script>
@endsection