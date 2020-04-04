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
            <h1 class="animated rubberBand">Lista de la elección de comites</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('eleccioncomite.create')}}"
                    class="btn btn-secondary btn-block animated rubberBand">CREAR UNA ELECCIÓN DE COMITES</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table animated fadeInUp">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">ELECCION</th>
            <th scope="col">FUNCIONARIO</th>
            <th scope="col">ROL</th>
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>

        
            @foreach($elecciones as $eleccioncomite)

                
                @foreach($eleccioness as $eleccion)
                    @if($eleccioncomite->eleccion_id === $eleccion->id)
                        @php ($periodo = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

         
                @foreach($funcionarios as $funcionario)
                    @if($eleccioncomite->funcionario_id === $funcionario->id)
                        @php($name = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

 
                @foreach($roles as $rol)
                    @if($eleccioncomite->rol_id === $rol->id)
                        @php($namerol = $rol->descripcion)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <td>{{$eleccioncomite->id}}</td>
                <td>{{$periodo}}</td>
                <td>{{$name}}</td>
                <td>{{$namerol}}</td>
                <td><a href="{{ route('eleccioncomite.edit', $eleccioncomite->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('eleccioncomite.destroy', $eleccioncomite->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$eleccioncomite->id}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection