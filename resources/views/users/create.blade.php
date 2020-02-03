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


	<div class="box-body">
        <table class="table table-bordered">
            <tr>
                <td class="text-right" width="50%">
                    Nombre completo *
                </td>
                <td class="text-left" width="50%">
					{!! Form::text('fullname', null, ['class' => 'form-control', 'required']) !!}
                </td>
            </tr>
            <tr>
                <td class="text-right" width="50%">
                    Email *
                </td>
                <td class="text-left" width="50%">
					{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
                </td>
			</tr>
			<tr>
                <td class="text-right" width="50%">
                    Contraseña
                </td>
                <td class="text-left" width="50%">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </td>
            </tr>
			<tr>
                <td class="text-right" width="50%">
                    Repetir contraseña
                </td>
                <td class="text-left" width="50%">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">    
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
				<a href="users.index" >{!! Form::button('Cancelar', ['class' => 'btn btn-warning', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>
			
            </td>
        </tr>
	</table>

	{!! Form::close() !!}

	<br>* Campos requeridos

@stop
