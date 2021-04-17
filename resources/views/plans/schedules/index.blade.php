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
                        <select id="course_id" name="course_id" class="form-control select2 course_id">
                            <option disabled selected value="">Seleccione un curso</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div id="basic-example">
                    <!-- Seller Details -->
                    <h3>Seller Details</h3>
                    <section>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">First name</label>
                                        <input type="text" class="form-control" id="basicpill-firstname-input">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input">Last name</label>
                                        <input type="text" class="form-control" id="basicpill-lastname-input">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input">Phone</label>
                                        <input type="text" class="form-control" id="basicpill-phoneno-input">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-email-input">Email</label>
                                        <input type="email" class="form-control" id="basicpill-email-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="basicpill-address-input">Address</label>
                                        <textarea id="basicpill-address-input" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Company Document -->
                    <h3>Company Document</h3>
                    <section>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-pancard-input">PAN Card</label>
                                        <input type="text" class="form-control" id="basicpill-pancard-input">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-vatno-input">VAT/TIN No.</label>
                                        <input type="text" class="form-control" id="basicpill-vatno-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-cstno-input">CST No.</label>
                                        <input type="text" class="form-control" id="basicpill-cstno-input">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-servicetax-input">Service Tax No.</label>
                                        <input type="text" class="form-control" id="basicpill-servicetax-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-companyuin-input">Company UIN</label>
                                        <input type="text" class="form-control" id="basicpill-companyuin-input">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-declaration-input">Declaration</label>
                                        <input type="text" class="form-control" id="basicpill-Declaration-input">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Bank Details -->
                    <h3>Bank Details</h3>
                    <section>
                        <div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-namecard-input">Name on Card</label>
                                            <input type="text" class="form-control" id="basicpill-namecard-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>Credit Card Type</label>
                                            <select class="form-select">
                                                <option selected>Select Card Type</option>
                                                <option value="AE">American Express</option>
                                                <option value="VI">Visa</option>
                                                <option value="MC">MasterCard</option>
                                                <option value="DI">Discover</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cardno-input">Credit Card Number</label>
                                            <input type="text" class="form-control" id="basicpill-cardno-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-card-verification-input">Card Verification Number</label>
                                            <input type="text" class="form-control" id="basicpill-card-verification-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-expiration-input">Expiration Date</label>
                                            <input type="text" class="form-control" id="basicpill-expiration-input">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </section>

                    <!-- Confirm Details -->
                    <h3>Confirm Detail</h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Confirm Detail</h5>
                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
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

    $(document).ready(function() {
        loadSelectCourse();

        $(document).on('click', '#save', function() {
            action = ($('#id').val()) ? update() : store();
        });

        $(document).on('change', '#course_id', function() {
            // loadSchedule();
            alert();
        });
    });
</script>
@endsection