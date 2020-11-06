<!DOCTYPE html>
<html>
<head>
	<title>SMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container"></br>
		<div class="row justify-content-center " style="padding-top:50px">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header bg-warning text-danger text-center">MY SEND EMAIL 
					</div>
					<div class="card-body text-center">
						<form action="{{ route('send.email') }}" method="post">
							{{ csrf_field() }} 
							<div class="row">
								<div class="col-lg-12"> 
								<label>Subject</label>
								<input type="text" name="subject" class="form-control" required="">
								</div> 
								<div class="col-lg-12"> 
								<label>Email</label>
								<input type="email" name="email" class="form-control" required="">
								</div>
								 <div class="col-lg-12"> 
								<label>Message</label>
								<input type="text" name="message" class="form-control" required="">
								</div> 
								<div class="col-lg-12"></br> 
								 <label hidden="">dddd</label>
							       <input type="submit" class="btn btn-success" value="Send Email">
							    </div> 
							</div>  
						</form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

</body>
</html>