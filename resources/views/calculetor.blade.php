<!DOCTYPE html>
<html>
<head>
	<title>Calculater</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container"></br>
		<form action="{{ route('calculator') }}" class="add_form" method="post">
			{{ csrf_field() }}
			<div class="col-lg-4">
				<label>Number 1</label>
				<input type="number" name="num1" onkeyup="numberone()" id="number1" class="form-control">
			</div>
			<div class="col-lg-4">
				<label>Number 2</label>
				<input type="number" name="num2" onkeyup="numberone()" id="number2" class="form-control">
			</div>
			<div class="col-lg-4"> 
				<input  id="number3" class="form-control" >
			</div>
			 
			 
		</form>
		
	</div>
	<script
  src="https://code.jquery.com/jquery-3.4.0.slim.min.js"
  integrity="sha256-ZaXnYkHGqIhqTbJ6MB4l9Frs/r7U4jlx7ir8PJYBqbI="
  crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<script type="text/javascript">
				  
                    $("#number1").onkeyup(function(){
						  $("#number3").hide();
						});

						$("#number2").onkeyup(function(){
						  $("#number3").show();
						});

				   function numberone(){ 
                    var num1= $('#number1').val();
                    var num2= $('#number2').val();
                      var sum = parseInt(num1) + parseInt(num2);
                    $('#number3').val(sum)

				   };
				 

	</script>
</body>
</html>
