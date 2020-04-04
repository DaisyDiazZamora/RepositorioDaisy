@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}



</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="row">
        <div class="col">
            <h1 class="animated rubberBand">Lista de roles</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('rol.create')}}"
                    class="btn btn-secondary btn-block animated rubberBand">CREAR ROL</a></td>
        </div>
        <hr>
    </div>
    <table class="table animated fadeInUp">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">DESCRIPCIÓN</th>
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $rol)
            <tr>
                <td>{{$rol->id}}</td>
                <td>{{$rol->descripcion}}</td>
                <td><a href="{{ route('rol.edit', $rol->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('rol.destroy', $rol->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$rol->descripcion}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection