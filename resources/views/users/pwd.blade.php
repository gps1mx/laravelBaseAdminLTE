@extends('layouts.master')

@section('title', 'Editar contraseña del usuario: '.$user->fullname)

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

	{!! Form::open(['route' => ['users.pwdsave', $user ], 'method' => 'PUT']) !!}

	<div class="box-body">
        <table class="table table-bordered">
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
				{!! Form::submit('Guardar', ['class' => 'btn btn-danger text-dark', 'onclick' => 'return confirm("Estás seguro que cambiar la contraseña?")']) !!}
				<a href="dashboard" >{!! Form::button('Cancelar', ['class' => 'btn btn-success text-dark', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>        
            </td>
        </tr>
    </table>

	{!! Form::close() !!}

@stop
