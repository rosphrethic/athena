@section('title', 'Planificaciones de Cursos')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
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
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Grados</h5>
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
                                    <label class="col-lg-2 col-form-label">Grado</label>
                                    <div class="col-lg-10">
                                        <select id="grade_id" name="grade_id" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione un grado</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="container_baccalaureate" class="form-group row">
                                    <label class="col-lg-2 col-form-label">Bachillerato</label>
                                    <div class="col-lg-10">
                                        <select id="baccalaureate_id" name="baccalaureate_id" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione un bachillerato</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Sección</label>
                                    <div class="col-lg-10">
                                        <select id="section_id" name="section_id" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione una sección</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Turno</label>
                                    <div class="col-lg-10">
                                        <select id="shift" name="shift" class="form-control select2 select2-r">
                                            <option disabled selected value="">Seleccione un turno</option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noche">Noche</option>
                                            <option value="Especial">Especial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Fecha de inicio</label>
                                    <div class="col-lg-10">
                                        <input id="start_date" name="start_date" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Fecha de finalización</label>
                                    <div class="col-lg-10">
                                        <input id="end_date" name="end_date" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Precio de matrícula</label>
                                    <div class="col-lg-10">
                                        <input id="tuition_fee" name="tuition_fee" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Precio de cuota</label>
                                    <div class="col-lg-10">
                                        <input id="installment_fee" name="installment_fee" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Cantidad de cuotas</label>
                                    <div class="col-lg-10">
                                        <input id="installment_quantity" name="installment_quantity" type="search" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Requisitos</label>
                                    <div class="col-lg-10">
                                        <select id="requirement_id" name="requirement_id[]" class="select2 form-control select2-multiple" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row input-hidden">
                                    <label class="col-lg-2 col-form-label">Estado</label>
                                    <div class="col-lg-10">
                                        <input id="status" name="status" type="text" class="form-control" readonly>
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
                url: '/plans/courses/getAll',
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
                    "title": "Nivel",
                    "targets": 1
                },
                {
                    "title": "Bachillerato",
                    "targets": 2
                },
                {
                    "title": "Grado",
                    "targets": 3
                },
                {
                    "title": "Sección",
                    "targets": 4
                },
                {
                    "title": "Turno",
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
                    "data": "grade.level"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        if (data.baccalaureate_id) {
                            return data.baccalaureate.name;
                        } else {
                            return '-';
                        }
                    },
                },
                {
                    "data": "grade.name"
                },
                {
                    "data": "section.name"
                },
                {
                    "data": "shift"
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
            url: '/plans/courses/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            showButtons();

            $('#id').val(data.id);
            $('#grade_id').val(`${data.grade_id}|${data.grade.has_baccalaureate}`).change();
            $('#baccalaureate_id').val(data.baccalaureate_id).change();
            $('#grade').val(data.grade);
            $('#section_id').val(data.section_id).change();
            $('#shift').val(data.shift).change();
            $('#start_date').val(data.start_date.replace(/\//g, "-"));
            $('#end_date').val(data.end_date.replace(/\//g, "-"));
            $('#tuition_fee').val(data.tuition_fee);
            $('#installment_fee').val(data.installment_fee);
            $('#installment_quantity').val(data.installment_quantity);
            $('#status').val(data.status);
            $('#created_at').val(new Date(data.created_at).toDateString());
            $('#updated_at').val(new Date(data.updated_at).toDateString());

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
        $.ajax({
            type: "GET",
            url: '/plans/courses/store',
            data: $('#form').serialize()

        }).done(function(data) {
            success();

        }).fail(function(jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                'grade_id',
                'baccalaureate_id',
                'section_id',
                'shift',
                'start_date',
                'end_date',
                'tuition_fee',
                'requirement_id',
                'installment_fee',
                'installment_quantity'
            ]);
        });
    }

    function update() {
        $.ajax({
            type: "GET",
            url: '/plans/courses/update',
            data: $('#form').serialize()

        }).done(function() {
            success();

        }).fail(function(jqXhr) {
            console.log(jqXhr);
            fail(jqXhr.responseJSON.errors, [
                'grade_id',
                'baccalaureate_id',
                'section_id',
                'shift',
                'start_date',
                'end_date',
                'tuition_fee',
                'requirement_id',
                'installment_fee',
                'installment_quantity'
            ]);
        });
    }

    function anull() {
        $.ajax({
            type: "GET",
            url: '/plans/courses/anull',
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
        loadSelectGrade();
        loadSelectSection();
        loadSelectBaccalaureate();
        loadSelectRequirement();

        $('#container_baccalaureate').hide();

        $(document).on('change', '#grade_id', function() {
            let grade = $('#grade_id').val();

            if (grade) {
                let baccalaureateExist = grade.split("|").pop();

                if (baccalaureateExist == 1) {
                    $('#container_baccalaureate').show(300);
                } else {
                    $('#container_baccalaureate').hide(300);
                    $('#baccalaureate_id').val('').change();
                }
            }
        });

        $(document).on('click', '.detalle', function() {
            $('#container_baccalaureate_id').show();

            show($(this).attr('data-id'));
        });

        $(document).on('click', '#save', function() {
            action = ($('#id').val()) ? update() : store();
        });

        $(document).on('click', '#anull', function() {
            anull();
        });
    });
</script>
@endsection