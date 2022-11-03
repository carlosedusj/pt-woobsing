@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Configura tu autenticador de google') }}</div>
                <div class="card-body">
                    <div class="panel-body" style="text-align: center;">
                        <p>Configura la autenticacion de dos factores escaneando el codigo de barra. Alternativo, Usa el codigo secreto {{$secret}}</p>
                        <div>
                            <div>
                                {!! $QR_Image !!}
                           </div>
                        </div>
                        <p>Debes configurar tu aplicacion Google Authenticator para continuar. De otra forma no sera posible loguearte</p>
                        <div>
                            <a href="{{route('completar.registro')}}"><button class="btn btn-primary">Completar registro</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection