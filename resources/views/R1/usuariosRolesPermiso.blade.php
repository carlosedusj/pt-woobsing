@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios y role con permiso 2') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Role</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <th scope="row">{{$usuario->id}}</th>
                                    <td>{{$usuario->nombre}}</td>
                                    <td>{{$usuario->apellido}}</td>
                                    <td>{{$usuario->role->nombre}}</td>
                                    <td>{{$usuario->role->permiso}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
