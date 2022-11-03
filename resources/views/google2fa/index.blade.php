@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Codigo de autenticacion') }}</div>
                <div class="card-body">
                    <div class="panel-body">
                        <hr>
                        @if($errors->any())
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                  <strong>Colocaste una OTP incorrecta</strong>
                                </div>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('2fa') }}">
                            {{ csrf_field() }}
    
                            <div class="form-group text-center">
                                <p>Por favor introduce el <strong>OTP</strong> generado en tu Google Authenticator App. <br> Asegurate de enviar el correcto. Es generado cada 30 segundos.</p>
                                <label for="one_time_password" class="col-md-4 control-label"><strong>One Time Password</strong></label>
                                    <input id="one_time_password" type="number" class="form-control" name="one_time_password" style="max-width:300px;margin:auto" required autofocus>
                                <div class="mt-2">
                                    <a href="/completar-registro"><button type="submit" class="btn btn-primary">Iniciar sesion</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection