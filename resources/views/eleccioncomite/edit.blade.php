@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Editar eleccion comite
    </div>
    <div class="card-body">
        
        <form method="POST"
            action="{{ route('eleccioncomite.update', $eleccioncomite->id) }}"
            enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-group">
                    @csrf
                    <label for="id">ID:</label>
                    <input type="text"
                    class="form-control"
                    readonly="true"
                    value="{{$eleccioncomite->id}}"
                    name="id" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="eleccion_id">Elige el periodo de la eleccion:</label>
                    <select id="eleccion_id" class="form-group" name="eleccion_id" >
                        <optgroup label="Periodos">
                            @foreach($elecciones as $eleccion)
                                <option for="eleccion_id" class="form-group" label="{{$eleccion->periodo}}" name="eleccion_id">{{$eleccion->id}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    @csrf
                    <label for="funcionario_id">Elige al funcionario:</label>
                    <select id="funcionario_id" class="form-group" name="funcionario_id" >
                        <optgroup label="Funcionarios">
                            @foreach($funcionarios as $funcionario)
                                <option for="funcionario_id" class="form-group" label="{{$funcionario->nombrecompleto}}" name="funcionario_id">{{$funcionario->id}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    @csrf
                    <label for="rol_id">Elige el rol:</label>
                    <select id="rol_id" class="form-group" name="rol_id" >
                        <optgroup label="Roles">
                            @foreach($roles as $rol)
                                <option for="rol_id" class="form-group" label="{{$rol->descripcion}}" name="rol_id">{{$rol->id}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection