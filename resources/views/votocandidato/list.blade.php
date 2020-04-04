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
            <h1>Votos al candidato</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('votocandidato.create')}}"
                    class="btn btn-success btn-block">NUEVO REGISTRO</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">CANDIDATO</th>
            <th scope="col">CANTIDAD DE VOTOS</th>
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA  -->
            @foreach($votocandidatos as $votocandidato)
                <!-- RECORRIDO DE TABLA  -->
                @foreach($candidatos as $candidato)
                    @if($votocandidato->candidato_id === $candidato->id)
                        @php ($cand = $candidato->nombrecompleto)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <td>{{$votocandidato->voto_id}}</td>
                <td>{{$cand}}</td>
                <td>{{$votocandidato->votos}}</td>
                <td><a href="{{ route('votocandidato.edit', $votocandidato->voto_id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('votocandidato.destroy', $votocandidato->voto_id)}}"
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