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
            <h1 class="animated rubberBand">Lista de candidatos</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('candidato.create')}}"
                    class="btn btn-secondary btn-block animated rubberBand">CREAR CANDIDATO</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table animated fadeInUp">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Sexo</th>
            <th scope="col">Foto</th>
            <th scope="col">Perfil</th>
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($candidatos as $candidato)
            <tr>
                <td>{{$candidato->id}}</td>
                <td>{{$candidato->nombrecompleto}}</td>
                <td>{{$candidato->sexo}}</td>
                <td>{{$candidato->foto}}</td>
                <td>{{$candidato->perfil}}</td>
                <td><a href="{{ route('candidato.edit', $candidato->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('candidato.destroy', $candidato->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection