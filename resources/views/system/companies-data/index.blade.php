@section('title', 'Datos de la Empresa')

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

<!-- Contenido de la pagina -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="col-10 container" style="margin-top: 12px">
                            <img id="company-data-img" src="" class="img-fluid" width="100%">
                        </div>
                    </div>

                    <div class="col-12 col-lg-9">
                        <form id="form">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nombre</label>
                                <div class="col-lg-10">
                                    <input id="name" name="name" type="search" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Administración</label>
                                <div class="col-lg-10">
                                    <input id="name_administration" name="name_administration" type="search" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Eslogan</label>
                                <div class="col-lg-10">
                                    <input id="slogan" name="slogan" type="search" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Fundador</label>
                                <div class="col-lg-10">
                                    <input id="founder" name="founder" type="search" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Fundado el</label>
                                <div class="col-lg-10">
                                    <input id="foundation_date" name="foundation_date" type="date" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Emblema</label>
                                <div class="col-lg-10">
                                    <input id="emblem" name="emblem" type="file" class="form-control custom-file-input">
                                    <label class="custom-file-label" for="customFile">Seleccione una imagen</label>
                                </div>
                            </div>

                            <hr>
                            <button id="save" type="button" class="btn btn-success float-right">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function update() {
        let formData = new FormData($('#form')[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '/system/companies-data/update',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data) {
            loadCompanyData();
            hideProgressBar();

            toastr.success('La operación ha sido exitosa!')
        }).fail(function(jqXhr, json, errorThrown) {
            fail(jqXhr.responseJSON.errors, [
                'name',
                'name_administration',
                'slogan',
                'founder',
                'foundation_date',
                'emblem'
            ]);
        });
    }

    $(document).ready(function() {
        loadCompanyData();

        $(document).on('click', '#save', function() {
            update();
        });
    });
</script>
@endsection