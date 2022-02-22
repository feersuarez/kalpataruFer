@extends('layout.masterpage')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! trans('jokes.VerificarCorreo') !!}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {!! trans('jokes.SeHaEnviadoEnlace') !!}
                        </div>
                    @endif

                    {!! trans('jokes.AntesDeContinuarVerifique') !!}
                    {!! trans('jokes.SiNoRecibisteElCorreo') !!}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{!! trans('jokes.HagaClic') !!}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
