@extends('layouts.master')

@section('title', 'Agregar permiso')

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

	{!! Form::open(['route' => 'permisos.store', 'method' => 'POST', 'class' => 'orm-horizontal']) !!}


	<div class="box-body">
        <table class="table table-bordered">
            <tr>
                <td class="text-right" width="50%">
                    Nombre del permiso (sin espacios):
                </td>
                <td class="text-left" width="50%">
					{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </td>
            </tr>
        </table>
    </div>

    <table class="table table-bordered">
        <tr>
            <td class="text-center">
                {{-- {!! Form::submit('Guardar', ['class' => 'btn btn-success text-dark', 'onclick' => 'return confirm("Estás seguro que deseas actualizar?")']) !!}
				<a href="users.index" >
					{!! Form::button('Cancelar', ['class' => 'btn btn-warning text-dark', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}
				</a>     --}}
				
				{!! Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
				<a href="permisos.index" >{!! Form::button('Cancelar', ['class' => 'btn btn-warning', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>
			
            </td>
        </tr>
	</table>

	{!! Form::close() !!}

	<br>* Campos requeridos

@stop
