@extends('layout.masterpage')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0,0,0,0.2); margin-top: 10%;">
                <div class="card-header"><h1 class="titulos">{!! trans('jokes.ResetPassword') !!}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: #b9ffff; margin-top: 1%;">{!! trans('jokes.EmailAddr') !!}</label>

                            <div class="col-md-6">
                                <input id="email"  type="email" class="form-control" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.ContraReset') !!}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: #b9ffff; margin-top: 1%;">{!! trans('jokes.ConfirmarContraReset') !!}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"  class="btn btn-primary" style="background-color: #D401D6; border: none; color: #b9ffff; margin-top: 1%;">
                                    {!! trans('jokes.ResetContraReset') !!}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
