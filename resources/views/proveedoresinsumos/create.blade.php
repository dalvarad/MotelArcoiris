@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')


<div class = "container">
    <div class="row">
        <div class="col-md-11 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Compra de Insumo</div>
                	<div class="panel-body">

	                	{!! Form::open(['route' => 'proveedoresinsumos.store','method' => 'POST', 'class' => 'form']) !!}
	                		<div class= "row">
		                		<div  class="col-sm-7">
			                		<div class="form-group">
			                			{!! Form::label('Proveedor', 'Proveedor') !!}
								 		
								 		{!! Form::select('id_proveedor', $proveedores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

									</div>
								</div>

							
								<div class="col-md-4">
									<div class="form-group">
							 			{!! Form::label('Comprobante', 'Tipo Comprobante') !!}
							 			
							 			{!! Form::select('tipo_comprobante', array('Boleta' => 'Boleta', 'Factura' => 'Factura'), null,['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}

									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="panel panel-primary col-sm-12">
									<div class="panel-body">
										<div class="col-sm-2">
											<div class="form-group">
					                			{!! Form::label('id_insumo', 'Insumo',['class' => 'control-label']) !!}
										 		
										 		{!! Form::select('id_insumo', $insumos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un insumo...', 'required']) !!}

											</div>
										</div>

										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('marca', 'Marca',['class' => 'control-label']) !!}
									 			{!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Rinso']) !!}

											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('contenido', 'Contenido',['class' => 'control-label']) !!}
									 			{!! Form::text('contenido', null, ['class' => 'form-control', 'placeholder' => '1x30x30g']) !!}

											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('cantidad', 'Cantidad',['class' => 'control-label']) !!}
									 			{!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => '20']) !!}

											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('precio_unitario', 'Precio',['class' => 'control-label']) !!}
									 			{!! Form::number('precio_unitario', null, ['class' => 'form-control', 'placeholder' => '1000']) !!}
											</div>
										</div>
										<div class="col-sm-1">
											<div class="form-group">	
												{!! Form::label('Opcion', '',['class' => 'control-label']) !!}
												<button type="button" id="bt_add" class="btn btn-primary agregar">Agregar</button>
											</div>
										</div>

										<div class=" ">
											<table id="detalles" class="table table-striped col-md-11">
												<thead style="background-color: #A9D0F5">
													<th>Eliminar</th>
													<th>Insumo</th>
													<th>Marca</th>
													<th>Contenido</th>
													<th>Cantidad</th>
													<th>Precio Unidad</th>
													<th>Subtotal</th>
												</thead>
												<tfoot>
													<th>TOTAL</th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th><h4 id="total">S/0.00</h4></th>
												</tfoot>
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group" id="guardar">
		                            <div class="col-md-8 col-md-offset-10">
		                            	<input value="{{ csrf_token() }}" name="_token" type="hidden"></input>
		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary desactivar']) !!}
		                            </div>
		                        </div>
		                    </div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection	

@section('script')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script>
		$(document).ready(function(){
			$('.agregar').click(function(){
				agregar();
			});
			
		});

		  $( function() {
		    
		    $( "#getvalue" ).on( "click", function() {
		      console.log("hola");
		    });
		   

		 
		    
		  } );


		var cont=0;
		total=0;
		subtotal=[];
		$('.desactivar').attr("disabled", true);

		function agregar(){
			id_insumo = $("#id_insumo").val();
			insumo = $("#id_insumo option:selected").text();
			marca = $("#marca").val();
			contenido = $("#contenido").val();
			cantidad = $("#cantidad").val();
			precio_unitario = $("#precio_unitario").val();

			if(id_insumo!="" && marca!="" && cantidad!="" && precio_unitario!=""){
				subtotal[cont] = (cantidad*precio_unitario);
				total = total+subtotal[cont];

				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_insumo[]" value="'+id_insumo+'">'+insumo+'</td><td><input type="text" class="form-control" readonly="readonly" name="marca[]" value="'+marca+'"></td><td><input type="text" class="form-control" readonly="readonly" name="contenido[]" value="'+contenido+'"></td><td><input type="text" class="form-control" readonly="readonly" name="cantidad[]" value="'+cantidad+'"></td><td><input type="text" class="form-control" name="precio_unitario[]" readonly="readonly" value="'+precio_unitario+'"></td><td>'+subtotal[cont]+'</td></tr>';

				cont++;
				limpiar();
				$("#total").html("S/." + total);
				evaluar();
				$('#detalles').append(fila);
			}
			else{
				alert("Error al ingresar los datos")
			}
		}

		function limpiar(){
		  	$("#marca").val("");
		  	$("#cantidad").val("");
		  	$("#contenido").val("");
		  	$("#precio_unitario").val("");
		}

	    function evaluar(){
		  	if(total>0){
		  		$('.desactivar').attr("disabled", false);
		  	}else{
		  		$('.desactivar').attr("disabled", true);
		  	}

		}
		function eliminar(index){
			total=total-subtotal[index];
			$("#total").html("S/," + total);
			$("#fila" + index).remove();
			evaluar();

		}
    </script>
@endsection

