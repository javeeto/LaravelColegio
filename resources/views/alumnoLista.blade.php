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
            <a href="{{ route('alumno.create') }}" class="btn btn-info">Registrar nuevo alumno</a>
            <table class="table table-striped">
                <thead>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Genero</th>
                <th>Fecha nacimiento</th>
                <th>Editar</th>
                </thead> 
                @foreach($alumnos as $alumno)
                <tbody>
                <td>{{$alumno->documento}}</td>
                <td>{{$alumno->nombres}}</td>
                <td>{{$alumno->apellidos}}</td>
                <td>{{$alumno->genero}}</td>
                <td>{{$alumno->fechanacimiento}}</td>
                <td>
                    <a href="{{ route('alumno.edit',$alumno->id) }}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span>
                    </a>
                    <a href="{{ route('alumno.destroy',$alumno->id) }}" onclick="return confirm('Esta seguro que desea eliminar este registro');" class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">Eliminar</span>
                    </a>
                </td>
                </tbody>
                @endforeach                
            </table>
            {!! $alumnos->render() !!}
@endsection