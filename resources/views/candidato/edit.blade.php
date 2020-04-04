@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Editar candidato
    </div>
    <div class="card-body">
        
        <form method="POST"
            action="{{ route('candidato.update', $candidato->id) }}"
            enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-group">
                    @csrf
                    <label for="id">ID:</label>
                    <input type="text"
                    class="form-control"
                    readonly="true"
                    value="{{$candidato->id}}"
                    name="id" />
                </div>
                <div class="form-group">
                    @csrf
                    <label for="nombrecompleto">Nombre completo:</label>
                    <input type="text"
                    value="{{$candidato->nombrecompleto}}"
                    class="form-control"
                    name="nombrecompleto" />
                </div>
                <div class="form-group">
                    @csrf
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" class="form-group" name="sexo">
                        <optgroup label="Sexo">
                            <option for="sexo" class="form-group" label="{{$candidato->sexo}}" name="sexo">M</option>
                            <option for="sexo" class="form-group" label="Masculino" name="sexo">M</option>
                            <option for="sexo" class="form-group" label="Femenino" name="sexo">F</option>
                        </optgroup>
                    </select>
                </div>
                
                <div class="form-group">
                    @csrf
                    <label for="foto">Foto (imagen):</label>
                    <input type="file"
                    value="{{$candidato->foto}}"
                    class="form-control-file"
                    id="foto"
                    name="foto">
                </div>
                <div class="form-group">
                    @csrf
                    <label for="perfil">Perfil (PDF):</label>
                    <input type="file"
                    class="form-control-file"
                    value="{{$candidato->perfil}}"
                    id="perfil"
                    name="perfil">
                </div>
            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection