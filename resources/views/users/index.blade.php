@extends('layouts.master')

@section('title', 'Usuarios')

@section('content')

<div class="box-body">
  {!! Form::open(['route' => 'users.search', 'class' => 'orm-horizontal', 'method' => 'post']) !!}
  <table class="table table-bordered">
    <tr class="active">
    <td scope="row" colspan="2">
      <b>Buscador</b>
    </td>
    </tr>
    <tr>

    <td>
      <div class="form-group{{ $errors->has('buscado') ? ' has-error' : '' }}">
      {!! Form::label('buscado', 'Nombre o Número de socio', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-9">
        {!! Form::text('buscado', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('buscado') }}</small>
      </div>
      </div>
    </td>

    <td class="text-center">
      {!! Form::submit('Buscar', ['class' => 'btn btn-info', 'name' => 'submitbutton'])!!}
    </td>

    </tr>
  </table>
  {!! Form::close() !!}
</div>


  <div class="table-responsive bs-example widget-shadow">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Número de socio</th>
          <th>Nombre</th>
          <th>Tipo</th>
          {{-- <th>Campus</th> --}}
          <th colspan='3' class="text-center">Acciones</th>
          <!-- <th>Cambiar<br>contraseña</th>
          <th>Eliminar</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr class="active">
            <td scope="row">{{ $user->socio_clave }}</td>
            <td>{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</td>
            <td>{{ $user->role }}</td>
            {{-- <td>{{ $user->campus }}</td> --}}
            <td class="text-center">
              <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-warning" >Editar</a>&nbsp;
              @if ( (Auth::user()->role=='root') || (Auth::user()->role=='directivo') || (Auth::user()->role=='administrativo') || (Auth::user()->role=='operativo') )
                <a href="{{ route('users.pwd', $user->id ) }}" class="btn btn-info" >Cambiar pwd</a>&nbsp;
                <a href="{{ route('users.destroy', $user->id ) }}" class="btn btn-danger" onclick="return confirm('Estás seguro que deseas desactivar este usuario?')" >Desactivar</a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $users->render(); !!}
  </div>

@stop
