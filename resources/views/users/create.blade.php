@extends('layouts.master')

@section('title', 'Agregar usuario')

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

	{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'orm-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('nombre', 'Nombre *', ['class' => 'col-md-3 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
			{!! Form::text('nombre', null, ['class' => 'form-control1', 'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('apellido_paterno', 'Apellido paterno *', ['class' => 'col-md-3 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
			{!! Form::text('apellido_paterno', null, ['class' => 'form-control1', 'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('apellido_materno', 'Apellido materno', ['class' => 'col-md-3 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
			{!! Form::text('apellido_materno', null, ['class' => 'form-control1']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('socio_clave', 'Clave de socio *', ['class' => 'col-md-3 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-check"></i>
									</span>
			{!! Form::text('socio_clave', null, ['class' => 'form-control1', 'placeholder' => 'Clave de socio', 'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Contraseña *', ['class' => 'col-md-3 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
			{!! Form::password('password', ['class' => 'form-control1', 'placeholder' => 'MiContraseñaSecreta', 'required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('role', 'Role *', ['class' => 'col-md-3 control-label']) !!}
		<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-arrows-v"></i>
									</span>
			{!! Form::select('role', ['directivo' => 'Directivo', 'administrativo' => 'Administrativo', 'operativo' => 'Operativo', 'socio' => 'Socio', 'invitado' => 'Invitado'], 'socio', ['placeholder' => '', 'class' => 'form-control1', 'required']) !!}
		</div>
	</div>

	{!! Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
	<a href="users.index" >{!! Form::button('Cancelar', ['class' => 'btn btn-warning', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>

	{!! Form::close() !!}

	<br>* Campos requeridos

@stop
