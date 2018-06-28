@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')



			<div class="col-md-12">
                <h3>Crear Habitacion</h3>

              <hr/>
                 	<div class="col-sm-5 col-md-5 ">
                 		     <div class="panel-body">

	                	{!! Form::open(['route' => 'proveedores.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                		<div class="form-group">

					 			{!! Form::label('nombre', 'Nombre',['class' => 'control-label']) !!}
					 		

						 		
									{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Supermercado Lider', 'required']) !!}

								</div>
							

							<div class="form-group">

					 			{!! Form::label('direccion', 'Direccion',['class' => 'control-label']) !!}
					 		

						 		
									{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Los Notros 123 Coronel', 'required']) !!}

								
							</div>

							<div class="form-group">

					 			{!! Form::label('telefono', 'Telefono',['class' => 'control-label']) !!}
					 		

						 		
									{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '12345678', 'required']) !!}

								
							</div>

							<div class="form-group">

					 			{!! Form::label('descripcion', 'Descripcion',['class' => 'control-label']) !!}
					 		

						 		
									{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Mayorista', 'required']) !!}

								
							</div>

							<div class="form-group">
	                            
	                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	                           
	                        </div>

						{!! Form::close() !!}

                 	</div>
                </div>
            </div>
   
@endsection	

