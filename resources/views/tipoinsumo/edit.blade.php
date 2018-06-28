@extends('layouts.app')

@section('title', 'Editar Tipo insumo ' . $tipo_insumo->tipo)

@section('content')


	<div class="col-md-12">
		<h3>Editar Tipo Insumo</h3>
		<hr/>
		<div >
			{!! Form::open(['route' => ['tipoinsumo.update', $tipo_insumo], 'method' => 'PUT']) !!}


			 		{!! Form::label('tipo', 'Nombre de Tipo') !!}
					{!! Form::text('tipo', $tipo_insumo->tipo, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}

					<p></p>
					<div align="center">
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection	
