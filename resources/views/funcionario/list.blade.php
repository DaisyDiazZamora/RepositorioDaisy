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
            <h1 class="animated rubberBand">Lista de funcionarios</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('funcionario.create')}}"
                    class="btn btn-secondary btn-block animated rubberBand">CREAR FUNCIONARIO</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table animated fadeInUp">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Sexo (M o F):</th>
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{$funcionario->id}}</td>
                <td>{{$funcionario->nombrecompleto}}</td>
                <td>{{$funcionario->sexo}}</td>
                <td><a href="{{ route('funcionario.edit', $funcionario->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('funcionario.destroy', $funcionario->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$funcionario->nombrecompleto}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection