@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Editar rol
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ route('rol.update', $rol->id) }}"
            enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-group">
                    @csrf
                    <label for="id">ID:</label>
                    <input type="text"
                    class="form-control"
                    readonly="true"
                    value="{{$rol->id}}"
                    name="id" />
                </div>
            <div class="form-group">
                @csrf
                <label for="descripcion">Descripción:</label>
                <input type="text"
                value="{{$rol->descripcion}}"
                class="form-control"
                name="descripcion" />
            </div>
            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection