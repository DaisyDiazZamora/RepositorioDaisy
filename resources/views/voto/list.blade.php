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
            <h1 class="animated rubberBand">Lista de votos</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('voto.create')}}"
                    class="btn btn-secondary btn-block animated rubberBand">NUEVO REGISTRO</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table animated fadeInUp">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">ELECCION</th>
            <th scope="col">CASILLA</th>
            <th scope="col">EVIDENCIA</th>
            <td colspan="2">ACTION</td>
            </tr>
        </thead>
        <tbody>

            @foreach($votos as $voto)
      
                @foreach($elecciones as $eleccion)
                    @if($voto->eleccion_id === $eleccion->id)
                        @php ($periodo = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                @foreach($casillas as $casilla)
                    @if($voto->casilla_id === $casilla->id)
                        @php($name = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <td>{{$voto->id}}</td>
                <td>{{$periodo}}</td>
                <td>{{$name}}</td>
                <td>{{$voto->evidencia}}</td>
                <td><a href="{{ route('voto.edit', $voto->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('voto.destroy', $voto->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$periodo}}')">ELIMINAR</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection