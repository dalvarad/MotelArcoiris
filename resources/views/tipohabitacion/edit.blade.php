@extends('layouts.app')

@section('title', 'Editar Tipo habitacion ' . $tipo_habitacion->tipo)

@section('content')


	<div class="col-md-12">
		<h3>Editar Tipo Habitacion</h3>
		<hr/>
		<div >
			{!! Form::open(['route' => ['tipohabitacion.update', $tipo_habitacion], 'method' => 'PUT']) !!}


			 		{!! Form::label('tipo', 'Nombre de Tipo') !!}
					{!! Form::text('tipo', $tipo_habitacion->tipo, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}

					<p></p>
					<div align="center">
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection	
