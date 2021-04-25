@section('title', 'Requisitos de Inscripción')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">@yield('title')</h4>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="page-title-box d-flex align-items-center justify-content-between breadcrumb-fix">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">Planes</li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-title">Gestión de Requisitos de Inscripción</h5>
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
                                    <label class="col-lg-2 col-form-label">Requerido</label>
                                    <div class="col-lg-10">
                                        <select id="is_required" name="is_required" class="form-control">
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
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
                <div style="display: flex; flex-wrap: wrap; justify-content: flex-end">
                    <div class="add_container">
                        <button id="add_generic_requirement" type="button" class="btn btn-primary btn-block-m mr-3">Agregar Requisitos Genéricos</button>
                    </div>
                    <div class="add_container">
                        <button id="add" type="button" class="btn btn-primary btn-block-m mr-3">Agregar Requisito</button>
                    </div>
                    <div class="w-250">
                        <select id="course_id" name="course_id" class="form-control select2 select2-r">
                            <option disabled selected value="">Seleccione un curso</option>
                        </select>
                    </div>
                </div>

                <table id="table" class="table table-hover dt-responsive nowrap"></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        hideProgressBar();
        loadSelectCourse();
        $('.add_container').hide();

        function loadSelectCourse() {
            $.ajax({
                type: "GET",
                url: '/plans/requirements/getAllCourses',
            }).done(function(data) {

                $.each(data, function(key, course) {
                    if (course.baccalaureate) {
                        $("#course_id").append(`<option value='${course.id}'>Grado ${course.grade} "${course.section.name}" Turno ${course.shift} ${course.baccalaureate.acronym}</option>`);
                    } else {
                        $("#course_id").append(`<option value='${course.id}'>Grado ${course.grade} "${course.section.name}" Turno ${course.shift}</option>`);
                    }
                });

                hideProgressBar();
            }).fail(function(data) {
                hideProgressBar();
                alert('Ocurrió un error interno, comuníquese con el administrador de sistemas');
            });
        }

        function loadTable(id) {
            $('#table').DataTable({
                destroy: true,
                responsive: true,
                searching: false,
                paging: false,
                info: false,
                language: {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                },
                ajax: {
                    type: "GET",
                    url: '/plans/requirements/getAll',
                    data: {
                        id: $('#course_id option:selected').val()
                    },
                    dataSrc: ""
                },
                columnDefs: [{
                        "title": "",
                        "targets": 0
                    },
                    {
                        "title": "Nombre",
                        "targets": 1
                    },
                    {
                        "title": "Requerido",
                        "targets": 2
                    },
                ],
                columns: [{
                        "data": null,
                        "render": function(data, type, row) {
                            return `
                                    <button type="button" class="btn btn-sm btn-primary detalle" data-action="getOne" data-id="${data.id}">
                                    <i class='bx bx-search'></i>
                                    </button>
                                `;
                        },
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            if (data.is_required) {
                                return `Sí`;
                            } else {
                                return 'No';
                            }
                        },
                    },
                ],
            });
        }

        $(document).on('change', '#course_id', function() {
            $('.add_container').show(500);
            loadTable();
        });

        $(document).on('click', '#add', function() {
            $('#id').val('');
            $('#form')[0].reset();
            $('#delete').hide();
            $('#modal').modal('toggle');
        });

        $(document).on('click', '#add_generic_requirement', function() {
            storeGenericRequirements();
        });

        $(document).on('click', '.detalle', function() {
            clickDetalle();
            show($(this).attr('data-id'));
        });

        $(document).on('click', '#save', function() {
            showProgressBar();
            action = ($('#id').val()) ? update() : store();
        });

        $(document).on('click', '#delete', function() {
            showProgressBar();
            destroy();
        });

        $('input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                alert('hey');
            }
        })

        function show(id) {
            $.ajax({
                type: "GET",
                url: '/plans/requirements/getOne',
                data: {
                    id: id
                },
            }).done(function(data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#is_required').val(data.is_required).change();
                $('#created_at').val(new Date(data.created_at).toDateString());
                $('#updated_at').val(new Date(data.updated_at).toDateString());

                hideProgressBar();
            }).fail(function() {
                alert('Ocurrió un error interno, comuníquese con el administrador de sistemas.');
                hideProgressBar();
            });
        }

        function store() {
            $('#form').append(`<input id="temp_course_id" name="course_id" type="hidden" value="${$('#course_id option:selected').val()}"/>`);
            $.ajax({
                type: "GET",
                url: '/plans/requirements/store',
                data: $('#form').serialize()

            }).done(function(data) {
                console.log(data);
                loadTable();
                hideModal();
                hideProgressBar();
                toggleModal();
                swalSuccess();

                $('#temp_course_id').remove();

            }).fail(function(jqXhr, json, errorThrown) {
                console.log(jqXhr);
                console.log(json);
                console.log(errorThrown);
                let errors = jqXhr.responseJSON.errors;
                console.log(errors);

                $('.error').remove();
                $('#temp_course_id').remove();

                (errors.name) 
                    ? $('#name').parent().append(`<p class="error validation-error">${errors.name}</p>`)
                    : $('#name').parent().append(`<p class="error validation-success">Todo bien!</p>`);

                (errors.is_required) ?
                $('#is_required').parent().append(`<p class="error validation-error">${errors.is_required}</p>`): $('#is_required').parent().append(`<p class="error validation-success">Todo bien!</p>`);

                hideProgressBar();
                swalError();
            });
        }

        function storeGenericRequirements() {
            $('#form').append(`<input id="temp_course_id" name="course_id" type="hidden" value="${$('#course_id option:selected').val()}"/>`);
            $.ajax({
                type: "GET",
                url: '/plans/requirements/storeGenericRequirements',
                data: $('#form').serialize()

            }).done(function(data) {
                loadTable();
                hideModal();
                hideProgressBar();
                swalSuccess();

                $('#temp_course_id').remove();

            }).fail(function(jqXhr, json, errorThrown) {
                let errors = jqXhr.responseJSON.errors;

                $('.error').remove();
                $('#temp_course_id').remove();

                hideProgressBar();
                swalError();
            });
        }

        function update() {
            $.ajax({
                type: "GET",
                url: '/plans/requirements/update',
                data: $('#form').serialize()

            }).done(function(data) {
                loadTable();
                hideModal();
                hideProgressBar();
                toggleModal();
                swalSuccess();

            }).fail(function(jqXhr, json, errorThrown) {
                let errors = jqXhr.responseJSON.errors;

                $('.error').remove();

                (errors.name) ?
                $('#name').parent().append(`<p class="error validation-error">${errors.name}</p>`): $('#name').parent().append(`<p class="error validation-success">Todo bien!</p>`);

                (errors.is_required) ?
                $('#is_required').parent().append(`<p class="error validation-error">${errors.is_required}</p>`): $('#is_required').parent().append(`<p class="error validation-success">Todo bien!</p>`);

                hideProgressBar();
                swalError();
            });
        }

        function destroy() {
            $.ajax({
                type: "GET",
                url: '/plans/requirements/destroy',
                data: {
                    id: $('#id').val(),
                }
            }).done(function(data) {
                loadTable();
                hideModal();
                hideProgressBar();
                toggleModal();

                if (data == 200) {
                    swalSuccess();
                } else {
                    swalError();
                }

            }).fail(function() {
                hideProgressBar();
                swalError();
            });
        }
    });
</script>
@endsection