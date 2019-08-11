@extends('plantilla.principal')
@section('alertmessage')
<br/>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if(session('mensaje'))
<div class="alert alert-success">
    <p>{{session('mensaje')}}</p>
</div>
@endif
@endsection
<div id="respuesta" ></div>



@section('content')
<a href="{{ route('alumno.index') }}" class="btn btn-info">Listar alumnos</a>
<br/><br/><br/>

<form id="alumnoForm" name="alumnoForm" action="{{url('alumno/agregar')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="documento">Documento: </label>
        <input type="number" class="form-control"  placeholder="Documento" name="documento" value="{{ old('documento') }}" >
    </div>  
    <div class="form-group">
        <label for="nombres">Nombres: </label>
        <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="{{ old('nombres') }}" title="Nombres del alumno sin numeros o caracteres especiales" pattern="[a-zA-Z ]*" minlength="3" maxlength="120" required>
    </div> 
    <div class="form-group">
        <label for="apellidos">Apellidos: </label>
        <input type="text" class="form-control"  placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}" title="Apellidos del alumno sin numeros o caracteres especiales" pattern="[a-zA-Z ]*" minlength="3" maxlength="120" required>
    </div> 
    <div class="form-group">
        <label for="genero">Genero: </label>
        <select name="genero" id="genero"  class="form-control" required>
            <option value="">Seleccionar</option>
        </select>        
    </div> 
    <div class="form-group">
        <label for="fechanacimiento">Fecha de nacimiento: </label>
        <input type="text" class="form-control" placeholder="Fecha de nacimiento" name="fechanacimiento" value="{{ old('fechanacimiento') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>
@endsection
