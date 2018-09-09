@extends('layouts.app')

@section('content')

<div class="container">
		<div class= "col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
				<div class="panel panel-info">
           		 	<div class="panel-heading">  

					   <h3> Lista Ventas
					   	<div class="btn-group pull-right">
							<a href="{{ route('productosusuarios.create') }}" class="btn btn-info">Ventas Productos</a>
					     </div>  
					   </h3>
					</div>

				
					
						<div class="panel-body">
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Usuario</th>
							    <th>Precio Total</th>
								<th>Tipo Comprobante</th>
								<th>Fecha Compra</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($productosusuarios as $propro)
									<tr>
										<td>{{ $propro->id }}</td>
										<td>{{ $propro->email }}</td>
										<td>{{ $propro->total }}</td>
										<td>{{ $propro->tipo_comprobante }}</td>
										<td>{{ $propro->created_at }}</td>
										<td>
											<a href="{{ route('productosusuarios.show', $propro->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> 
											<a href="{{ route('productosusuarios.destroy', $propro->id) }}" onclick="return confirm('¿Está seguro de eliminar el suministro seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $productosusuarios->links() }}
						</div>
	                </div>
	            </div>
	        </div>
</div>	       


@endsection