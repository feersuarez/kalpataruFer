@extends('layout.masterpage')

@section('contenido')
@php
$curso= App\Models\Curso::all();
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(0,0,0,0.2); margin-top: 10%;">
                <div class="card-header"><h1 class="titulos">{!! trans('jokes.Registrarse') !!}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.NombreRegistro') !!}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CodCurso" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.CursoRegistro') !!}</label>
                            <div class="col-md-6">
                            <select class="form-select" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none;" aria-label="Default select example" name="codCurso">
                                <option selected>{!! trans('jokes.SelectCurso') !!}</option>
                                @foreach($curso as $curso)
                                <option>{{$curso->nombre}}</option>
                                @endforeach

                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.CorreoRegistro') !!}</label>

                            <div class="col-md-6">
                                <input id="email" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none; font-family: 'Helvetica';" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="password" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.ContraRegistro') !!}</label>

                            <div class="col-md-6">
                                <input id="password" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none;" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                               
                            
                        <div class="form-group row">
                            <label for="password-confirm" style="color: #b9ffff; margin-top: 1%;" class="col-md-4 col-form-label text-md-right">{!! trans('jokes.RepetirRegistro') !!}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" style="background-color: rgba(255, 255, 255, 0.5); margin-top: 1%; border: none;" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
         

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #D401D6; border: none; color: #b9ffff; margin-top: 1%;">
                                    {!! trans('jokes.RegistroBtn') !!}
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
