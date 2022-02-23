@extends('layout.masterpage')

@section('contenido')
<link rel="stylesheet" type="text/css" href="../public/css/style.css">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0,0,0,0.2); margin-top: 10%;">
                <div class="card-header" style=""><h1 class="titulos">{!! trans('jokes.InicioSesion') !!}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" id="correoInicio" style="color: #b9ffff;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.CorreoInicio') !!}</label>

                            <div class="col-md-6">
                                <input id="email" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.ContraSesion') !!}</label>

                            <div class="col-md-6">
                                <input id="password" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none;" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" style="color: #b9ffff;" for="remember">
                                        {!! trans('jokes.RecordarSesion') !!}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #D401D6; border: none; color: #b9ffff;">
                                    {!! trans('jokes.IniciarSesion') !!}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="color: #D401D6;" href="{{ route('password.request') }}">
                                        {!! trans('jokes.OlvidasteSesion') !!}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
