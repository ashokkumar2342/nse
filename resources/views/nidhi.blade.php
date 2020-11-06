<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
  <form action="{{ url('nidhi-store') }}" method="get" accept-charset="utf-8">
	<div class="row">
		
	<div class="col-lg-3">
		<label>name</label>
		<input type="text" name="name" class="form-control" required="">
		</div>

	<div class="col-lg-3">
		<label>mobile</label>
		<input type="text" name="mobile" class="form-control" required="">
		</div>
	    </div>


	<div class="col-lg-3">
	<input type="submit" name="" class="btn btn-success" value="Save">
	</div>
    </div>
  </form>
          <table class="table">


          	<tr>
          		<td>name</td>
          		<td>mobile</td>
          		<td>ACTION</td>
          	</tr>
          		@foreach ($phonebooks as $phonebooks)
          			 
          		<tr>
          		<td>{{$phonebooks->name }}</td>
          		<td>{{$phonebooks->mobile }}</td>
          		<td>
    				<a href="{{ url('delete') }}" title="">
    				<button class="btn btn-danger">Delete</button>
            </a>
    			</td>
          	</tr>
                 
           


          			@endforeach	
          </table>

</body>
</html>