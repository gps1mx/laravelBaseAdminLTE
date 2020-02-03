@extends('layouts.master')

@section('title', 'Permisos')

@section('content')

<div class="box-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>id</th>
          <th>Permiso</th>
        </tr>
      </thead>
      <tbody>
        @foreach($permisos as $item)
          <tr class="active">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
          </tr>
        @endforeach
      </tbody>
	</table>
	<table class="table">
		<tr>
			<td class="text-center">
				<a href="{{ route('permisos.create') }}" class="btn btn-success text-dark" >Nuevo permiso</a>
			</td>
		</tr>
	</table>

    {!! $permisos->render(); !!}
  </div>

@stop
