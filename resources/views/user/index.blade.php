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
                <div class="panel-heading">Usuarios
                	<div class="btn-group pull-right">
				        <a href="{{ route('users.create') }}" class="btn btn-info btn-sm">Agregar Usuario</a>
				     </div>
                	
                		
                </div>
                <div class = container>
                	
							
	                {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">
								{!! Form::text('nombre', null ,['class' => 'form-control','placeholder'=>'Nombre Usuario']) !!}
								{!! Form::select('type', $users->lista_tipo ,null, ['class' => 'form-control', 'placeholder' => 'Tipo']) !!}
							</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
					{!! Form::close() !!}
					
				</div>

                	<div class="panel-body">

						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Rut</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Tipo</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->username }}</td>
										<td>{{ $user->nombre }}</td>
										<td>{{ $user->apellido }}</td>
										<td>{{ $user->rut }}</td>
										<td>{{ $user->telefono }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->type }}</td>
								
										<td>
											<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('users.destroy', $user->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $users->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection