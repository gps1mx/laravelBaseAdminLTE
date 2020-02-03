@extends('layouts.master')

@section('title', 'Editar usuario '.$user->name)

@section('content')

	@if(count($errors))
		<div class="alert alert-warning" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(['route' => ['users.update', $user ], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('nombre', 'Nombre *', ['class' => 'col-md-2 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
			{!! Form::text('nombre', $user->nombre, ['class' => 'form-control1', 'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('apellido_paterno', 'Apellido paterno *', ['class' => 'col-md-2 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
			{!! Form::text('apellido_paterno', $user->apellido_paterno, ['class' => 'form-control1', 'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('apellido_materno', 'Apellido materno', ['class' => 'col-md-2 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
			{!! Form::text('apellido_materno', $user->apellido_materno, ['class' => 'form-control1']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('role', 'Role *', ['class' => 'col-md-2 control-label']) !!}
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-arrows-v"></i>
			</span>
			{!! Form::select('role', ['directivo' => 'Directivo',  'administrativo' => 'Administrativo', 'operativo' => 'Operativo', 'socio'=> 'Socio', 'invitado' => 'Invitado'], $user->role, [ 'class' => 'form-control1']) !!}
		</div>
	</div>
	<div>&nbsp</div>

	{!! Form::submit('Guardar', ['class' => 'btn btn-success', 'onclick' => 'return confirm("Estás seguro que deseas actualizar?")']) !!}
	<a href="users.index" >{!! Form::button('Cancelar', ['class' => 'btn btn-warning', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>

	{!! Form::close() !!}

	<br>* Campos requeridos

@stop
