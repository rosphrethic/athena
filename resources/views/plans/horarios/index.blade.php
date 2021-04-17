@section('title', 'Horarios')

@section('css')
<!-- Twitter Bootstrap Wizard -->
<link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">

<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />
@endsection

@extends('layouts.app')

@section('content')
<!-- Titulo y descripcion -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <!-- Titulo de la pagina -->
            <h4 class="mb-0 font-size-18">@yield('title')</h4>

            <!-- Ruta de navegacion -->
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Movimientos</li>
                    <li class="breadcrumb-item">Planes</li>
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

                <!-- Titulo y descripcion de la carta -->
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <h4 class="card-title">Gestión de @yield('title')</h4>
                        @empty(Request()->curso_id) <p class="card-title-desc">Seleccione un curso para ver el horario de el</p> @endempty
                        @isset(Request()->curso_id) <p class="card-title-desc">Complete el formulario y luego presione el botón <span class="text-custom"> Guardar
                                Horario</span></p> @endisset
                    </div>

                    <div class="col-12 col-lg-2">
                        <form action="/movimientos/planes/horarios">
                            <select name="curso_id" id="curso_id" class="form-control select2 select2-r" onchange="this.form.submit()">
                                <option></option>
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" @if(Request()->curso_id == $curso->id) selected @endif>{{ $curso->nivel_acronimo }} {{ $curso->numero }}°
                                    "{{ $curso->seccion->nombre }}" {{ $curso->turno }} @if($curso->bachillerato_id) ({{ $curso->bachillerato->acronimo }}) @endif</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>


                <hr class="add-button-hr">

                <!-- Horas -->
                @isset(Request()->curso_id)
                <div id="basic-pills-wizard" class="twitter-bs-wizard">
                    <ul class="twitter-bs-wizard-nav">
                        @for ($i = 0; $i < 7; $i++) <li class="nav-item">
                            <a href="#hora{{ $i }}" class="nav-link" data-toggle="tab">
                                <span class="step-number mr-2">{{ $i + 1}}</span>
                                <span>{{ $i + 1}}° hora</span>
                            </a>
                            </li>
                            @endfor
                    </ul>

                    <!-- Formulario -->
                    @empty($horarios[0]) <form action="/movimientos/planes/horarios/store" method="POST"> @endempty
                        @isset($horarios[0]) <form action="/movimientos/planes/horarios/update" method="POST"> @method('PATCH') @endisset
                            @csrf
                            <input type="hidden" name="curso_id" value="{{ Request()->curso_id }}">

                            <div class="tab-content twitter-bs-wizard-tab-content">
                                @for ($i = 0; $i < 7; $i++) <!-- @isset($horarios[0]) @endisset -->

                                    @isset($horarios[0])
                                    <input type="hidden" name="id[]" value="{{ $horarios[$i]->id }}">
                                    @endisset

                                    <input type="hidden" name="hora[]" value="{{ $i + 1 }}">

                                    <div class="tab-pane" id="hora{{ $i }}">
                                        <div class="form-group row">
                                            <label for="desde" class="col-md-2 col-form-label">Desde</label>
                                            <div class="col-md-10">
                                                @if ($curso_seleccionado->turno == "Mañana")
                                                <input name="desde[]" class="input-mask form-control" type="text" data-inputmask="'mask': '99:99'"
                                                    value="{{ $horarios[$i]->desde ?? $desde[$i]}}">
                                                @else ($curso_seleccionado->turno == "Tarde")
                                                <input name="desde[]" class="input-mask form-control" type="text" data-inputmask="'mask': '99:99'"
                                                    value="{{ $horarios[$i]->desde ?? $desde_alt[$i]}}">
                                                @endif
                                                @error('desde[]')<span class="text-primary font-size-12" role="alert">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lunes" class="col-md-2 col-form-label">Hasta</label>
                                            <div class="col-md-10">
                                                @if ($curso_seleccionado->turno == "Mañana")
                                                <input name="hasta[]" class="input-mask form-control" type="text" data-inputmask="'mask': '99:99'"
                                                    value="{{ $horarios[$i]->hasta ?? $hasta[$i] }}">
                                                @else ($curso_seleccionado->turno == "Tarde")
                                                <input name="hasta[]" class="input-mask form-control" type="text" data-inputmask="'mask': '99:99'"
                                                    value="{{ $horarios[$i]->hasta ?? $hasta_alt[$i] }}">
                                                @endif
                                                @error('hasta[]')<span class="text-primary font-size-12" role="alert">{{ $message }}</span> @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lunes" class="col-md-2 col-form-label">Lunes</label>
                                            <div class="col-md-10">
                                                <select name="lunes[]" id="lunes{{$i}}" class="form-control select2 select2-r">
                                                    <option></option>
                                                    @foreach ($asignaturas as $asignatura)
                                                    <option value="{{ $asignatura->asignatura->nombre }}" @if($asignatura->asignatura->nombre == $horarios[$i]->lunes) selected
                                                        @endif>{{ $asignatura->asignatura->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('lunes[]')<p class="error-message">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="martes" class="col-md-2 col-form-label">Martes</label>
                                            <div class="col-md-10">
                                                <select name="martes[]" id="martes{{ $i }}" class="form-control select2 select2-r">
                                                    <option></option>
                                                    @foreach ($asignaturas as $asignatura)
                                                    <option value="{{ $asignatura->asignatura->nombre }}" @if($asignatura->asignatura->nombre == $horarios[$i]->martes)
                                                        selected @endif>{{ $asignatura->asignatura->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('martes[]')<p class="error-message">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="miercoles" class="col-md-2 col-form-label">Miércoles</label>
                                            <div class="col-md-10">
                                                <select name="miercoles[]" id="miercoles{{ $i }}" class="form-control select2 select2-r">
                                                    <option></option>
                                                    @foreach ($asignaturas as $asignatura)
                                                    <option value="{{ $asignatura->asignatura->nombre }}" @if($asignatura->asignatura->nombre == $horarios[$i]->miercoles)
                                                        selected @endif>{{ $asignatura->asignatura->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('miercoles[]')<p class="error-message">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="jueves" class="col-md-2 col-form-label">Jueves</label>
                                            <div class="col-md-10">
                                                <select name="jueves[]" id="jueves{{ $i }}" class="form-control select2 select2-r">
                                                    <option></option>
                                                    @foreach ($asignaturas as $asignatura)
                                                    <option value="{{ $asignatura->asignatura->nombre }}" @if($asignatura->asignatura->nombre == $horarios[$i]->jueves)
                                                        selected @endif>{{ $asignatura->asignatura->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('jueves[]')<p class="error-message">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="viernes" class="col-md-2 col-form-label">Viernes</label>
                                            <div class="col-md-10">
                                                <select name="viernes[]" id="viernes{{ $i }}" class="form-control select2 select2-r">
                                                    <option></option>
                                                    @foreach ($asignaturas as $asignatura)
                                                    <option value="{{ $asignatura->asignatura->nombre }}" @if($asignatura->asignatura->nombre == $horarios[$i]->viernes)
                                                        selected @endif>{{ $asignatura->asignatura->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('viernes[]')<p class="error-message">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    @endfor
                            </div>

                            <hr>

                            <div class="row justify-content-end">
                                <div class="col-12 col-lg-2">
                                    <button type="submit" class="btn btn-custom waves-effect btn-block waves-light mt-1">
                                        <i class="bx bx-check font-size-16 align-middle mr-1"></i> Guardar Horario
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

<!-- Advanced Forms -->
<script src="{{ asset('assets/js/pages/form-advanced.init.js')}}"></script>

<!-- Form wizard -->
<script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-wizard.init.js')}}"></script>

<!-- Input Mask -->
<script src="{{ asset('assets/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-mask.init.js') }}"></script>
@endsection