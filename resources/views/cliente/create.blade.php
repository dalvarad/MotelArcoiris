
@extends('layouts.app')


@section('content')
	
		<div class="col-md-12">
		    <div class="form-area">  
		        <form role="form">
		        <br style="clear:both">
		                    <h3 style="margin-bottom: 25px; text-align: left;">Reserva Online</h3>
		                    <p class="para">Aqui van las intrucciones para tener una reserva exitosa.</p>
		                    <hr/>
		    				<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
							</div>
		                    <div class="form-group">
		                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
		                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
		                    </div>
		            
		        <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
		        </form>
		    </div>
		</div>
	

@endsection
