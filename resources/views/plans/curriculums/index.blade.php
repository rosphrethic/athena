@section('title', 'Mallas Curriculares')

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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Malla Curricular</h5>
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
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Archivo</label>
                                    <div class="col-lg-10">
                                        <input id="file" name="file" type="file" class="form-control custom-file-input">
                                        <label class="custom-file-label" for="customFile">Seleccione un archivo</label>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Estado</label>
                                    <div class="col-lg-10">
                                        <input id="status" name="status" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Creado por</label>
                                    <div class="col-lg-10">
                                        <input id="user_id" name="user_id" type="text" class="form-control" readonly>
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
                    <a id="link" href="#" target="_blank">
                        <button id="open" type="button" class="btn btn-primary">Ver</button>
                    </a>
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
                url: '/plans/curriculums/getAll',
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
                    "title": "Curso",
                    "targets": 1
                },
                {
                    "title": "Estado",
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
                    "data": null,
                    "render": function(data, type, row) {
                        return `${data.course.grade.name} "${data.course.section.name}" Turno ${data.course.shift} ${data.course.baccalaureate ? `| ${data.course.baccalaureate.name}` : ''}`;
                    },
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
            url: '/plans/curriculums/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#course_id').val(data.course_id).change();
            $('#status').val(data.status);
            $('#user_id').val(data.user_id);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());
            $("#link").attr("href", `http://localhost:8000/storage/curriculums/${data.course.year}/${data.file}`);

            if (data.status == 'Anulado') {
                hideSave();
                hideAnull();
                disableInputs();
            }

        }).fail(function() {
            fail();
        });
    }

    function store() {
        let formData = new FormData($('#form')[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '/plans/curriculums/store',
            data: formData,
            contentType: false,
            processData: false,

        }).done(function(data) {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'course_id',
                'file',
            ]);
        });
    }

    function update() {
        let formData = new FormData($('#form')[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '/plans/curriculums/update',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data) {
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
                'file',
            ]);
        });
    }

    function anull() {
        $.ajax({
            type: "GET",
            url: '/plans/curriculums/anull',
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

    $(document).ready(function() {
        loadTable();
        loadSelectCourse();

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

        $(document).on('click', '#open', function() {
            loadTable($(this).val());
        });
    });
</script>
@endsection