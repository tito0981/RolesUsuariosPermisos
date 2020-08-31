@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Roles</h2></div>

                <div class="card-body">
                    <a href="{{ route('role.create') }}" class="btn btn-primary float-right">Crear</a><br><br>
                    @include('custom.message')
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nombre Rol</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Descripción</th>
                              <th scope="col">Acceso Total</th>
                              <th colspan="3">Getionar</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <th scope="row">{{ $role->name }}</th>
                                    <th scope="row">{{ $role->slug }}</th>
                                    <th scope="row">{{ $role->description }}</th>
                                    <th scope="row">{{ $role['full-access'] }}</th>
                                    <th><a class="btn btn-info" href="{{ route('role.show',$role->id)}}">Mostrar</a> </th>
                                    <th><a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">Editar</a> </th>
                                    <th><a class="btn btn-danger" href="{{ route('role.edit',$role->id)}}">Eliminar</a> </th>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    {{ $roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
