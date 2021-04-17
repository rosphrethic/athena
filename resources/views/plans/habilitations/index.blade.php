@section('title', 'Habilitaciones de Asignaturas')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Athena</li>
                    <li class="breadcrumb-item">Planes</li>
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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Habilitación de Asignatura</h5>
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
                                    <label class="col-lg-2 col-form-label">Curso</label>
                                    <div class="col-lg-10">
                                        <select id="course_id" name="course_id" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione un curso</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="container_subject_id" class="form-group row">
                                    <label class="col-lg-2 col-form-label">Asignatura</label>
                                    <div class="col-lg-10">
                                        <select id="subject_id" name="subject_id" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione una asignatura</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Modalidad</label>
                                    <div class="col-lg-10">
                                        <select id="modality" name="modality" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione una modalidad</option>
                                            <option value="Presencial">Presencial</option>
                                            <option value="Virtual">Virtual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Requerido</label>
                                    <div class="col-lg-10">
                                        <select id="required" name="required" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione una opción</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Horas semanales</label>
                                    <div class="col-lg-10">
                                        <input id="hour_weekly" name="hour_weekly" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Promedio requerido</label>
                                    <div class="col-lg-10">
                                        <input id="average_required" name="average_required" type="search" class="form-control" required>
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
                    <button id="anull" type="button" class="btn btn-danger">Anular</button>
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
                <div class="row">
                    <div class="col-3">
                        <select name="course_id" class="form-control select2 course_id">
                            <option disabled selected value="">Seleccione un curso</option>
                        </select>
                    </div>
                </div>

                <hr>

                <table id="table" class="table table-hover dt-responsive nowrap"></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function loadTableEmpty() {
        $('#table').DataTable({
            language: SPANISH,
            dom: 'l<"toolbar">frtip',
            initComplete: function() {
                $("div.toolbar").html('<button id="add" class="btn btn-sm btn-primary ml-3"><i class="fa fa-plus"></i></button>');
            },
            columnDefs: [{
                    "title": "",
                    "targets": 0
                },
                {
                    "title": "Asignatura",
                    "targets": 1
                },
                {
                    "title": "Modalidad",
                    "targets": 2
                },
                {
                    "title": "Horas Semanales",
                    "targets": 3
                },
                {
                    "title": "Promedio Requeridos",
                    "targets": 4
                },
                {
                    "title": "Estado",
                    "targets": 5
                },
            ],
        });
    }

    function loadTable(id) {
        $('#table').DataTable({
            destroy: true,
            responsive: true,
            language: SPANISH,
            ajax: {
                type: "GET",
                url: '/plans/habilitations/getAll',
                data: {
                    id: id
                },
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
                    "title": "Asignatura",
                    "targets": 1
                },
                {
                    "title": "Modalidad",
                    "targets": 2
                },
                {
                    "title": "Horas Semanales",
                    "targets": 3
                },
                {
                    "title": "Promedio Requeridos",
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
                            <button type="button" class="btn btn-sm btn-primary detalle float-left" data-action="getOne" data-id="${data.id}">
                            <i class='fa fa-chevron-down'></i>
                            </button>
                        `;
                    },
                },
                {
                    "data": "subject.name"
                },
                {
                    "data": "modality"
                },
                {
                    "data": "hour_weekly"
                },
                {
                    "data": "average_required"
                },
                {
                    "data": "status"
                },
            ],
        });
    }

    function show(id) {
        clickDetalle();

        $.ajax({
            type: "GET",
            url: '/plans/habilitations/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#course_id').val(data.course_id).change();
            $('#modality').val(data.modality).change();
            $('#required').val(data.required).change();
            $('#hour_weekly').val(data.hour_weekly);
            $('#average_required').val(data.average_required);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());

            (data.status == 'Anulado') ? hideAnull(): '';
            (data.status == 'Anulado') ? hideSave(): '';
        }).fail(function() {
            fail();
        });
    }

    function store() {
        $.ajax({
            type: "GET",
            url: '/plans/habilitations/store',
            data: $('#form').serialize()

        }).done(function(data) {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'course_id',
                'subject_id',
                'modality',
                'required',
                'hour_weekly',
                'average_required',
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/plans/habilitations/update',
            data: $('#form').serialize()

        }).done(function() {
            loadTable($('.course_id:first').val());
            toggleModal();
            hideModal();
            hideProgressBar();
            hideButtons();
            resetSelects();

            toastr.success('La operación ha sido exitosa!')

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'course_id',
                'subject_id',
                'modality',
                'required',
                'hour_weekly',
                'average_required',
            ]);
        });
    }

    function anull() {
        $.ajax({
            type: "GET",
            url: '/plans/habilitations/anull',
            data: {
                id: $('#id').val(),
            }
        }).done(function() {
            loadTable($('.course_id:first').val());
            toggleModal();
            hideModal();
            hideProgressBar();
            hideButtons();
            resetSelects();

            toastr.success('La operación ha sido exitosa!')

        }).fail(function() {
            fail();
        });
    }

    function loadSelectSubject(id) {
        $.ajax({
                type: "GET",
                url: `/plans/habilitations/getAllSubjects`,
                data: {
                    id: id
                }
            })
            .done(function(data) {
                $('#subject_id').empty();

                $.each(data, function(key, subject) {
                    $("#subject_id").append(
                        `<option value='${subject.id}'>${subject.name}</option>`
                    );
                });

            })
            .fail(function() {
                // fail();
            });
    }

    $(document).ready(function() {
        loadTableEmpty();
        loadSelectCourse();

        $('#container_subject_id').hide();

        $(document).on('click', '.detalle', function() {
            $('#container_subject_id').show();

            show($(this).attr('data-id'));
        });

        $(document).on('click', '#save', function() {
            action = ($('#id').val()) ? update() : store();
        });

        $(document).on('click', '#anull', function() {
            anull();
        });

        $(document).on('change', '.course_id', function() {
            loadTable($(this).val());
        });

        $(document).on('change', '#course_id', function() {
            $('#subject_id').empty();

            if ($('#course_id').val()) {
                loadSelectSubject($(this).val());

                if (!$('#id').val()) {
                    $('#container_subject_id').show(300);
                }
            }
        });
    });
</script>
@endsection