@extends('layouts.master')

@section('title', 'Editar ')

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

	{!! Form::open(['route' => ['contingentes.update', $contingentes->id], 'method' => 'PUT']) !!}

	<div class="form-group{{ $errors->has('tipo_contingente') ? ' has-error' : '' }}">
		{!! Form::label('tipo_contingente', 'Tipo de contingente *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('tipo_contingente', $tipo_contingente, $contingentes->tipo_contingente, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('tipo_contingente') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
		{!! Form::label('apellido_paterno', 'Apellido paterno *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('apellido_paterno', $contingentes->apellido_paterno, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('apellido_paterno') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
		{!! Form::label('apellido_materno', 'Apellido materno *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('apellido_materno', $contingentes->apellido_materno, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('apellido_materno') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
		{!! Form::label('nombre', 'Nombre *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('nombre', $contingentes->nombre, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('nombre') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
		{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::date('fecha_nacimiento', $contingentes->fecha_nacimiento, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('fecha_nacimiento') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('lugar_nacimiento') ? ' has-error' : '' }}">
		{!! Form::label('lugar_nacimiento', 'Lugar de nacimiento *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('lugar_nacimiento', $contingentes->lugar_nacimiento, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('lugar_nacimiento') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
		{!! Form::label('genero', 'Género *', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('genero', $generos, $contingentes->genero, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('genero') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
		{!! Form::label('telefono', 'Teléfono', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('telefono', $contingentes->telefono, ['class' => 'form-control']) !!}
			<small class="text-danger">{{ $errors->first('telefono') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
		{!! Form::label('celular', 'Celular', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('celular', $contingentes->celular, ['class' => 'form-control']) !!}
			<small class="text-danger">{{ $errors->first('celular') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		{!! Form::label('email', 'Correo electrónico', ['class' =>'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::email('email', $contingentes->email, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
			<small class="text-danger">{{ $errors->first('email') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div>&nbsp;</div>
	<div><hr></div>
	<div>&nbsp;</div>
	
	<div class="form-group{{ $errors->has('pasaporte') ? ' has-error' : '' }}">
		{!! Form::label('pasaporte', 'Pasaporte', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('pasaporte', $contingentes->pasaporte, ['class' => 'form-control']) !!}
			<small class="text-danger">{{ $errors->first('pasaporte') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
		{!! Form::label('dni', 'DNI', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('dni', $contingentes->dni, ['class' => 'form-control']) !!}
			<small class="text-danger">{{ $errors->first('dni') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>
	
	<div class="form-group{{ $errors->has('tipo_sangre') ? ' has-error' : '' }}">
			{!! Form::label('tipo_sangre', 'Tipo de sangre', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-9">
				{!! Form::text('tipo_sangre', $contingentes->tipo_sangre, ['class' => 'form-control']) !!}
			<small class="text-danger">{{ $errors->first('tipo_sangre') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>
		
	<div class="form-group{{ $errors->has('contactar_donador') ? ' has-error' : '' }}">
			{!! Form::label('contactar_donador', 'Se le puede contactar como donador de sangre en caso de emergencia?', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-9">
				{!! Form::select('contactar_donador', ['No'=>'No', 'Si'=>'Si'], $contingentes->contactar_donador, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('contactar_donador') }}</small>
		</div>
	</div>
	<div>&nbsp;</div>

	<div>&nbsp;</div>
	<div><hr></div>
	<div>&nbsp;</div>

	Estoy interesado en las siguientes actividades (seleccione todas las que deseé):
	@foreach ($ver_intereses as $key => $value)
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<div class="checkbox{{ $errors->has("$key") ? ' has-error' : '' }}">
					<label for="{{$key}}">
						{!! Form::checkbox("$key", $contingentes->$key, $contingentes->$key, ['id' => "$key"]) !!} {{$value}}
					</label>
				</div>
				<small class="text-danger">{{ $errors->first('$key') }}</small>
			</div>
		</div>
	@endforeach

	<div>&nbsp;</div>

	Solicito inscripción en las siguientes actividades (seleccione todas las que deseé):
	@foreach ($ver_inscripciones as $key => $value)
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<div class="checkbox{{ $errors->has("$key") ? ' has-error' : '' }}">
					<label for="{{$key}}">
						{!! Form::checkbox("$key", $contingentes->$key, $contingentes->$key, ['id' => "$key"]) !!} {{$value}}
					</label>
				</div>
				<small class="text-danger">{{ $errors->first('$key') }}</small>
			</div>
		</div>
	@endforeach

	{!! Form::submit('Guardar', ['class' => 'btn btn-success', 'onclick' => 'return confirm("Estás seguro que deseas actualizar?")']) !!}
	<a href="{{ route('contingentes.index') }}" >{!! Form::button('Cancelar edición', ['class' => 'btn btn-warning', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>

	{!! Form::close() !!}

@stop
