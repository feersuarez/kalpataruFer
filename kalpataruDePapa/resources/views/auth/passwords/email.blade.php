@extends('layout.masterpage')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0,0,0,0.2); margin-top: 10%;">
                <div class="card-header"><h1 class="titulos">{!! trans('jokes.ResetPsswd') !!}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: #b9ffff; margin-top: 1%;">{!! trans('jokes.CorreoEmail') !!}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #D401D6; border: none; color: #b9ffff; margin-top: 1%;">
                                    {!! trans('jokes.EnvResetEmail') !!}
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
