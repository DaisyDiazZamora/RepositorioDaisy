@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Agregar Elección
    </div>
    <div class="card-body">
        
        <form method="post" action="{{ route('eleccion.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="periodo">Periodo:</label>
                <input type="text" class="form-control" name="periodo" />
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" name="fecha" />
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="fechaapertura">Fecha apertura:</label>
                <input type="date" class="form-control" name="fechaapertura" />
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="horaapertura">Hora apertura:</label>
                <input type="time" class="form-control" name="horaapertura" />
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="fechacierre">Fecha cierre:</label>
                <input type="date" class="form-control" name="fechacierre" />
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="horacierre">Hora cierre:</label>
                <input type="time" class="form-control" name="horacierre" />
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="observaciones">Observaciones:</label>
                <input type="text" class="form-control" name="observaciones" />
            </div>



            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection