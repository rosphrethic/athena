@section('title', 'Horarios de Clases')

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

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-3">
                        <select id="course_id" class="form-control select2 course_id">
                            <option disabled selected value="">Seleccione un curso</option>
                        </select>
                    </div>
                </div>

                <hr>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#hour1" role="tab">
                            1°
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hour2" role="tab">
                            2°
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hour3" role="tab">
                            3°
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hour4" role="tab">
                            4°
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hour5" role="tab">
                            5°
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hour6" role="tab">
                            6°
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hour7" role="tab">
                            7°
                        </a>
                    </li>
                </ul>
        
                <!-- Tab panes -->
                <div class="tab-content p-3">
                    @for($i = 1; $i <= 7; $i++)
                    <div class="tab-pane @if($i == 1) active @endif" id="hour{{$i}}" role="tabpanel">
                        <form id="form{{$i}}" style="margin-bottom: -40px !important;" autocomplete="off">

                            <input id="id{{$i}}" type="hidden" name="id">

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Desde {{$i}}</label>
                                <div class="col-lg-10">
                                    <input id="from{{$i}}" name="from" type="search" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:MM">
                                </div>
                            </div>

                            <div class="form-group row input-hidden">
                                <label class="col-lg-2 col-form-label">Hasta</label>
                                <div class="col-lg-10">
                                    <input id="to{{$i}}" name="to" type="text" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:MM">
                                </div>
                            </div>

                            <div class="form-group row input-hidden">
                                <label class="col-lg-2 col-form-label">Lunes</label>
                                <div class="col-lg-10">
                                    <select id="monday{{$i}}" name="monday" class="form-control select2 subject_id">
                                        <option disabled selected value="">Seleccione una asignatura</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row input-hidden">
                                <label class="col-lg-2 col-form-label">Martes</label>
                                <div class="col-lg-10">
                                    <select id="tuesday{{$i}}" name="tuesday" class="form-control select2 subject_id">
                                        <option disabled selected value="">Seleccione una asignatura</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row input-hidden">
                                <label class="col-lg-2 col-form-label">Miércoles</label>
                                <div class="col-lg-10">
                                    <select id="wednesday{{$i}}" name="wednesday" class="form-control select2 subject_id">
                                        <option disabled selected value="">Seleccione una asignatura</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row input-hidden">
                                <label class="col-lg-2 col-form-label">Jueves</label>
                                <div class="col-lg-10">
                                    <select id="thursday{{$i}}" name="thursday" class="form-control select2 subject_id">
                                        <option disabled selected value="">Seleccione una asignatura</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row input-hidden">
                                <label class="col-lg-2 col-form-label">Viernes</label>
                                <div class="col-lg-10">
                                    <select id="friday{{$i}}" name="friday" class="form-control select2 subject_id">
                                        <option disabled selected value="">Seleccione una asignatura</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <button id="save{{$i}}" type="button" class="btn btn-success btn-save float-right" data-id="{{$i}}">Guardar</button>
                        </form>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function loadSelectSubjects() {
        $.ajax({
            type: "GET",
            url: `/global/getAll/subjects`
        })
        .done(function (data) {
            $.each(data, function (key, subject) {
                $(".subject_id").append(
                    `<option value='${subject.name}'>${subject.name} - ${subject.acronym}</option>`
                );
            });

        })
        .fail(function () {
            fail();
        });
    }

    function update() {
        for (let i = 0; i < 7; i++) {
            $.ajax({
                type: "GET",
                url: '/plans/schedules/update',
                data: $(`#form${i+1}`).serialize()

            }).done(function() {


            }).fail(function(jqXhr) {
                fail();
            });           
            
            console.log(`Done: ${i}`);
        }

        hideProgressBar();
        toastr.success('La operación ha sido exitosa!')
    }

    
    function show(id) {
        $.ajax({
            type: "GET",
            url: '/plans/schedules/getOne',
            data: {
                id: id
            },
        }).done(function(data) {
            for (let i = 0; i < 7; i++) {
                $(`#id${i+1}`).val(data[i].id);
                $(`#from${i+1}`).val(data[i].from);
                $(`#to${i+1}`).val(data[i].to);
                $(`#monday${i+1}`).val(data[i].monday).change();
                $(`#tuesday${i+1}`).val(data[i].tuesday).change();
                $(`#wednesday${i+1}`).val(data[i].wednesday).change();
                $(`#thursday${i+1}`).val(data[i].thursday).change();
                $(`#friday${i+1}`).val(data[i].friday).change();
            }
        }).fail(function() {
            fail();
        });
    }


    $(document).ready(function() {
        loadSelectCourse();
        loadSelectSubjects();

        $(document).on('click', '.btn-save', function() {
            update();
        });

        $(document).on('change', '#course_id', function() {
            show($(this).val());
        });


    });
</script>
@endsection