@extends('layouts.master')

@section('title', 'Editar contraseña del usuario '.$user->name)

@section('content')

			{!! Form::open(['route' => ['users.pwdsave', $user ], 'method' => 'PUT']) !!}

            <div class="form-group">
              {!! Form::label('password', 'Introduzca la nueva contraseña', ['class' => 'col-md-2 control-label']) !!}
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  {!! Form::password('password', ['class' => 'form-control1', 'placeholder' => 'MiContraseñaSecreta', 'required']) !!}
                </div>
            </div>


            {!! Form::submit('Guardar', ['class' => 'btn btn-success', 'onclick' => 'return confirm("Estás seguro que cambiar la contraseña?")']) !!}
						<a href="dashboard" >{!! Form::button('Cancelar', ['class' => 'btn btn-warning', 'onclick' => 'return confirm("Estás seguro que deseas cancelar la operación?")']) !!}</a>

						{!! Form::close() !!}

          @stop
