@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif

            <div class="panel panel-default">
                <div class="panel-heading">Jornadas</div>
                	<div class="panel-body">


	                	<div align="right">
						
							<a href="{{ route('jornadas.create') }}" class="btn btn-info">Agregar Jornada</a>
					
						</div>
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Hora Entrada</th>
								<th>Hora Salida</th>
								<th>Duracion</th>
								<th>Acción</th>
							</thead>

							<tbody>
								@foreach($jornadas as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->hora_entrada }}</td>
										<td>{{ $type->hora_salida }}</td>
										<td>{{ $type->duracion }}</td>
										<td>
											<a href="{{ route('jornadas.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('jornadas.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $jornadas->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection