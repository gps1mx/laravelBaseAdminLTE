@extends('layouts.master')

@section('title', 'Detalles')

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

	<table class="table table-bordered">
		<tbody>
			<tr class="active">
				<td scope="row"><b>Nombre</b></td>
				<td scope="row"><b>{{ $contingentes->nombre }} {{ $contingentes->apellido_paterno }} {{ $contingentes->apellido_materno }}</b></td>
			</tr>
			<tr class="active">
				<td scope="row"><b>Tipo de contingente</b></td>
				<td scope="row"><b>{{ $contingentes->tipo_contingente }}</b></td>
			</tr>
			<tr>
				<td scope="row"><b>Fecha de nacimiento</b></td>
				<td scope="row">{{ $contingentes->fecha_nacimiento }}</td>
			</tr>
			<tr>
				<td scope="row"><b>Lugar de nacimiento</b></td>
				<td scope="row">{{ $contingentes->lugar_nacimiento }}</td>
			</tr>
			<tr>
				<td scope="row"><b>Género</b></td>
				<td scope="row">{{ $contingentes->genero }}</td>
			</tr>
			<tr>
				<td scope="row"><b>Teléfono</b></td>
				<td scope="row">{{ $contingentes->telefono }}</td>
			</tr>
			<tr>
				<td scope="row"><b>Celular</b></td>
				<td scope="row">{{ $contingentes->celular }}</td>
			</tr>
			<tr>
				<td scope="row"><b>Correo electrónico</b></td>
				<td scope="row">{{ $contingentes->email }}</td>
			</tr>

		</table>

		<table class="table table-bordered">

				<tr class="active">
					<th colspan='2'><b>Datos adicionales</b></th>
				</tr>
	
				<tr>
					<td scope="row"><b>Número de pasaporte</b></td>
					<td scope="row">{{ $contingentes->pasaporte }}</td>
				</tr>
	
				<tr>
					<td scope="row"><b>DNI</b></td>
					<td scope="row">{{ $contingentes->dni }}</td>
				</tr>
	
				<tr>
					<td scope="row"><b>Tipo de sangre</b></td>
					<td scope="row">{{ $contingentes->tipo_sangre }}</td>
				</tr>
	
				<tr>
					<td scope="row"><b>Se le puede contactar como donador en caso de emergencia</b></td>
					<td scope="row">{{ $contingentes->contactar_donador }}</td>
				</tr>
	
			</table>




		<table class="table table-bordered">
			<tr class="active">
				<th colspan='2'><b>Actividades en las que está interesado</b></th>
			</tr>
			@foreach ($ver_intereses as $key => $value)
				<td scope="row"><b>{{$value}}</b></td>
				@if ($contingentes->$key=='on')
					<td scope="row"><img src='images/chk1.gif'></td>
				@else
					<td scope="row"><img src='images/chk0.gif'></td>
				@endif
			</tr>
		@endforeach
	</table>

	<table class="table table-bordered">
		<tr class="active">
			<th colspan='2'><b>Actividades en las que está inscrito</b></th>
		</tr>
		@foreach ($ver_inscripciones as $key => $value)
			<td scope="row"><b>{{$value}}</b></td>
			@if ($contingentes->$key=='on')
				<td scope="row"><img src='images/chk1.gif'></td>
			@else
				<td scope="row"><img src='images/chk0.gif'></td>
			@endif
		</tr>
	@endforeach
</table>





<div>&nbsp</div>

<table class="table table-bordered">
	<tr class="active">
		<th colspan='2'><b>Notas y bitácora</b></th>
	</tr>
	<tr>
		<th>Acción</th>
		<th>Fecha y hora</th>
	</tr>
	@foreach($contingentesReportes as $reporte)
		<tr class="active">
			<td scope="row">{{ $reporte->accion }}</td>
			<td scope="row">{{ $reporte->created_at }}</td>
		</tr>
	@endforeach
</table>


<div>&nbsp;</div>

<a href="{{ route('contingentes.index', $contingentes->id ) }}" >{!! Form::button('Regresar al panel de contingentes', ['class' => 'btn btn-info']) !!}</a>

<a href="{{ route('contingentes.edit', $contingentes->id ) }}" >{!! Form::button('Editar', ['class' => 'btn btn-warning']) !!}</a>

{!! Form::close() !!}

@stop
