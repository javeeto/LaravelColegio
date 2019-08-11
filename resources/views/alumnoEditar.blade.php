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

@section('content')
<a href="{{ route('alumno.index') }}" class="btn btn-info">Listar alumnos</a>
<br/><br/><br/>
{!!Form::open(['route'=>['alumno.update',$alumno->id],'method'=>'PUT','name'=>'alumnoForm','id'=>'alumnoForm'])!!}

@csrf
<div class="form-group">
    <label for="documento">Documento: </label>
    <input type="text" class="form-control" name="documento" value="{{ $alumno->documento }}">
</div>  
<div class="form-group">
    <label for="nombres">Nombres: </label>
    <input type="text" class="form-control" name="nombres" value="{{ $alumno->nombres }}">
</div> 
<div class="form-group">
    <label for="apellidos">Apellidos: </label>
    <input type="text" class="form-control" name="apellidos" value="{{ $alumno->apellidos }}">
</div> 
<div class="form-group">
    <label for="genero">Genero: </label>
    
    <select name="generoalumno" id="generoalumno"  class="form-control" required>
        <option value="">Seleccionar</option>
        @foreach($generos as $genero)
           @if($genero->id==$alumno->genero)
              <option value="{{ $genero->id }}" selected>{{ $genero->nombre }}</option>
           @else
               <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
           @endif
        @endforeach
    </select>
</div> 
<div class="form-group">
    <label for="fechanacimiento">Fecha de nacimiento: </label>
    <input type="text" class="form-control" name="fechanacimiento" value="{{ $alumno->fechanacimiento }}">
</div>
<button type="submit" class="btn btn-primary">Guardar</button>


{!!Form::close()!!}
@endsection