<!DOCTYPE html>
<html>
<head>
	<title>
		Bike Price
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
	 <form action="{{ url('nidhi-store') }}" method="get" accept-charset="utf-8">
	<div class="row">
<div class="col-lg-4">
	<label>name</label>
	<input type="text" name="name" class="form-control">
	</div>
	<div class="col-lg-4">
		<label>mobile</label>
		<input type="text" name="mobile" class="form-control">
		</div>

       <div class="col-lg-4">
		<label>address</label>
		<input type="text" name="address" class="form-control">
		</div>

		
	<div class="col-lg-3">
	<input type="submit" name="" class="btn btn-success" value="Save">
	</div> 
    </div>
  </form>


	</div>
</body>
</html>