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
	
	{!! Form::label('buscado', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
    <tr>
    <td>
		<div class="form-group{{ $errors->has('buscado') ? ' has-error' : '' }}">
			{!! Form::text('buscado', $buscado, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('buscado') }}</small>
		</div>
	</td>
    </tr>
	<tr>
    <td class="text-center">
      	{!! Form::submit('Buscar', ['class' => 'btn btn-info text-dark', 'name' => 'submitbutton'])!!}
    </td>

	</tr>
	
  </table>
  {!! Form::close() !!}
</div>
<br>


<div class="box-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Detalles</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr class="active">
            <td>{{ $user->fullname }}</td>
            <td class="text-center">
				<a href="{{ route('users.show', $user->id ) }}" class="btn btn-success text-dark" >Detalles</a>&nbsp;&nbsp;
				<a href="{{ route('users.edit', $user->id ) }}" class="btn btn-warning text-dark" >Editar</a>&nbsp;&nbsp;
				<a href="{{ route('users.pwd', $user->id ) }}" class="btn btn-info text-dark" >Cambiar Pwd</a>
				@if($user->active==1)
				<a href="{{ route('users.unactive', $user->id ) }}" class="btn btn-danger text-dark" >Desactivar usuario</a>
				@else
				<a href="{{ route('users.active', $user->id ) }}" class="btn btn-dark text-light" >Reactivar usuario</a>
				@endif 
            </td>
          </tr>
        @endforeach
      </tbody>
	</table>
	<table class="table">
		<tr>
			<td class="text-center">
				<a href="{{ route('users.create') }}" class="btn btn-success text-dark" >Nuevo usuario</a>
			</td>
		</tr>
	</table>

    {!! $users->render(); !!}
  </div>

@stop