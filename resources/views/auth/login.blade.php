<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Athena</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

        <style>
        html { 
            background: url('assets/images/bg.jpg') rgba(0, 0, 0, 0.15) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;  background-blend-mode: multiply;

        }
        </style>
    </head>

    <body style="background: none !important;">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div style="background-color: #263544 ;">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="text-white px-4 pt-4 pb-1">
                                            <h5 class="text-white">Athena</h5>
                                            <p>Sistema Académico</p>
                                            <p style="margin-top: -6px;">{{ $company_data->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="p-2">
                                    <form action="{{ route('login') }}" method="POST" class="form-horizontal">
                                        @csrf

                                        <div class="form-group mt-3">
                                            <label for="branch_id">Sede</label>
                                            <select id="branch_id" name="branch_id" class="form-control">
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('branch')<p class="error-message">{{ $message }}</p> @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico</label>
                                            <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese su usuario" value="christopher@charmed.dev" autofocus>
                                            @error('email')<p class="error-message">{{ $message }}</p> @enderror
                                        </div>
                                                        
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese su contraseña">
                                            @error('password')<p class="error-message">{{ $message }}</p> @enderror
                                        </div>
                
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Iniciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>