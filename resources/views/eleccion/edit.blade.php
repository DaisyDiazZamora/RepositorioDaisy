@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Editar eleccion
    </div>
    <div class="card-body">
        
        <form method="POST"
            action="{{ route('eleccion.update', $eleccion->id) }}"
            enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-group">
                    @csrf
                    <label for="id">ID:</label>
                    <input type="text"
                    class="form-control"
                    readonly="true"
                    value="{{$eleccion->id}}"
                    name="id" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="periodo">Periodo:</label>
                    <input type="text"
                    value="{{$eleccion->periodo}}"
                    class="form-control"
                    name="periodo" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="fecha">Fecha:</label>
                    <input type="date"
                    value="{{$eleccion->fecha}}"
                    class="form-control"
                    name="fecha" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="fechaapertura">Fecha apertura:</label>
                    <input type="date"
                    value="{{$eleccion->fechaapertura}}"
                    class="form-control"
                    name="fechaapertura" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="horaapertura">Hora apertura:</label>
                    <input type="time"
                    value="{{$eleccion->horaapertura}}"
                    class="form-control"
                    name="horaapertura" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="fechacierre">Fecha cierre:</label>
                    <input type="date"
                    value="{{$eleccion->fechacierre}}"
                    class="form-control"
                    name="fechacierre" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="horacierre">Hora cierre:</label>
                    <input type="time"
                    value="{{$eleccion->horacierre}}"
                    class="form-control"
                    name="horacierre" />
                </div>

                <div class="form-group">
                    @csrf
                    <label for="observaciones">Observaciones:</label>
                    <input type="text"
                    value="{{$eleccion->observaciones}}"
                    class="form-control"
                    name="observaciones" />
                </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection