@extends('layouts.master')

@section('title', 'Detalle del usuario '.$user->fullname)

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

    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <td class="text-right" width="50%">
                    Nombre completo
                </td>
                <td class="text-left" width="50%">
                    {{$user->fullname}}
                </td>
            </tr>
            <tr>
                <td class="text-right" width="50%">
                    Email
                </td>
                <td class="text-left" width="50%">
                    {{$user->email}}
                </td>
            </tr>
        </table>
    </div>

    <table class="table table-bordered">
        <tr>
            <td class="text-center">
                <a href="{{ route('users.index' ) }}" class="btn btn-success text-dark" >Regresar</a>&nbsp;&nbsp;
                <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-warning text-dark" >Editar</a>&nbsp;&nbsp;
                <a href="{{ route('users.pwd', $user->id ) }}" class="btn btn-info text-dark" >Cambiar Pwd</a>          
            </td>
        </tr>
    </table>

	{!! Form::close() !!}

	<br>* Campos requeridos

@stop
