@if ($message = Session::get('success-message'))
    <div class="alert alert-success mb-5" role="alert">{{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class=" alert-primary fade show" role="alert" style="margin-top: -20px; margin-bottom: 30px;"></div>  
@endif

@if ($message = Session::get('update-message'))
    <div class="alert alert-warning mb-5" role="alert">{{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class=" alert-primary fade show" role="alert" style="margin-top: -20px; margin-bottom: 30px;"></div>  
@endif

@if ($pemessage = Session::get('pemessage'))
    <div class="alert alert-primary fade show" role="alert" style="margin-top: -20px; margin-bottom: 30px;">{{ $pemessage }}</div>  
@endif

@if ($message = Session::get('error-message'))
    <div class="alert alert-danger mb-5" role="alert">{{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class=" alert-primary fade show" role="alert" style="margin-top: -20px; margin-bottom: 30px;"></div>  
@endif

@if ($errors->any())
    <div class="alert alert-danger mb-5" role="alert">Hubo un error, verifique el contenido del formulario.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class=" alert-primary fade show" role="alert" style="margin-top: -20px; margin-bottom: 30px;"></div>  
@endif