@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Permisos del rol 1') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Permisos</th>
                            <th scope="col">Role</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($permisos as $permisos)
                            <tr>
                                <th scope="row">{{$permisos->id}}</th>
                                    <td>{{$permisos->permiso}}</td>
                                    <td>{{$permisos->roles[0]->nombre}}</td>
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
