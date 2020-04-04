@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Votos
    </div>
    <div class="card-body">
        
        <form method="post" action="{{ route('votocandidato.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                @csrf
                <label for="candidato_id">Elige al candidato:</label>
                <select id="candidato_id" class="form-group" name="candidato_id" >
                    <optgroup label="Candidatos">
                    @foreach($candidatos as $candidato)
                        <option for="candidato_id" class="form-group" label="{{$candidato->nombrecompleto}}" name="candidato_id">{{$candidato->id}}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="votos">Ingresa la cantidad de votos:</label>
                <input type="number" class="form-control" name="votos" />
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="voto">numero 2 o 9:</label>
                <input type="number" class="form-control" name="voto" />
            </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection
