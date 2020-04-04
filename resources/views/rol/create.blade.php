@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Agregar Rol
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('rol.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="descripcion">Descripción de rol:</label>
                <input type="text" class="form-control" name="descripcion" />
            </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection