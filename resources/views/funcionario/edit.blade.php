@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Editar funcionario
    </div>
    <div class="card-body">
        
        <form method="POST"
            action="{{ route('funcionario.update', $funcionario->id) }}"
            enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-group">
                    @csrf
                    <label for="id">ID:</label>
                    <input type="text"
                    class="form-control"
                    readonly="true"
                    value="{{$funcionario->id}}"
                    name="id" />
                </div>
                <div class="form-group">
                    @csrf
                    <label for="nombrecompleto">Nombre completo:</label>
                    <input type="text"
                    value="{{$funcionario->nombrecompleto}}"
                    class="form-control"
                    name="nombrecompleto" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" class="form-group" name="sexo">
                        <optgroup label="Sexo">
                            <option for="sexo" class="form-group" label="{{$funcionario->sexo}}" name="sexo">M</option>
                            <option for="sexo" class="form-group" label="Masculino" name="sexo">M</option>
                            <option for="sexo" class="form-group" label="Femenino" name="sexo">F</option>
                        </optgroup>
                    </select>
                </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection