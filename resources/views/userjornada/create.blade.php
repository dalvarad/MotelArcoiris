@extends('layouts.app')

@section('title', 'Crear tipo')

@section('style')
	
    
@endsection

@section('content')

<div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Asignar Jornada</h3>
            </div>
                	<div class="panel-body">

                		{!! Form::open(['route' => 'usersjornadas.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                	
	                		

							
							<div class="form-group">
	                			{!! Form::label('rut', 'Usuario',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_user', $users->pluck('rut','id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('jornada', 'Jornada',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_jornada', $jornadas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('fecha_entrada', 'Fecha Entrada',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			
									{!! Form::date('fecha_entrada', null, array('id' => 'datepicker_entrada','class' => 'form-control', 'required')) !!}

								</div>
							</div>

							




							<div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
	                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	                            </div>
	                        </div>

						{!! Form::close() !!}

                 	</div>
                </div>
            </div>
        </div>

</div>

@endsection	

@section('script')
	

   
@endsection