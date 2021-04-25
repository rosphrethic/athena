@section('title', 'Página Principal')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-2">
                            <h5 class="text-primary">&nbsp;</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img id="company_image" src="" alt="" class="img-thumbnail rounded-circle">
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="pt-4 pl-4">

                            <div class="row">
                                <div class="col-12">
                                    <h5 id="company_name" class="font-size-15"></h5>
                                    <p id="company_slogan" class="text-muted mb-2"></p>
                                    <p id="company_founder" class="text-muted mb-2"></p>
                                    <p id="company_foundation_date" class="text-muted mb-2"></p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="/system/companies-data" class="btn btn-primary waves-effect waves-light btn-sm">Actualizar Datos <i class="mdi mdi-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-12">
                        <div class="text-primary p-2">
                            <h5 class="text-primary">&nbsp;</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ asset('assets/images/notices.png') }}" alt="" class="img-thumbnail rounded-circle">
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="pt-4 pl-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 id="company_name" class="font-size-15">Avisos</h5>
                                    <p class="text-muted mb-2">14/03/2021 - El sistema Athena se encuentra actualmente en proceso de desarrollo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Orders</p>
                                <h4 class="mb-0">1,235</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bx-copy-alt font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Revenue</p>
                                <h4 class="mb-0">$35, 723</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-archive-in font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Average Price</p>
                                <h4 class="mb-0">$16.2</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    --}}
</div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            loadCompanyData();
            hideProgressBar();

            function loadCompanyData() {
                $.ajax({
                    type: "GET",
                    url: '/getCompanyData', 
                }).done(function(data) {
                    console.log(data);
                    $('#company_name').text(data.name);
                    $('#company_slogan').text(data.slogan);
                    $('#company_founder').text(`Fundado por ${data.founder}`);
                    $('#company_foundation_date').text(`Fundado el ${data.foundation_date}`);
                    $("#company_image").attr("src", `/storage/emblem/${data.emblem}`);

                    hideProgressBar();
                }).fail(function() {
                    alert('Ocurrió un error interno, comuníquese con el administrador de sistemas.');
                    hideProgressBar();
                });
            }
        });
    </script>
@endsection