<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
 <form action="{{ url('store') }}" method="get" accept-charset="utf-8"> 
	<div class="row">
		<div class="col-lg-3">
		<label>name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="col-lg-3">
		<label>mobile </label>
		<input type="text" name="mobile" class="form-control">
		</div>
		<div class="col-lg-3">
			<label>address</label>
			<input type="text" name="address" class="form-control">
			</div>
			<div class="col-lg-3">
				<label>roll </label>
				<input type="text" name="roll" class="form-control">
			</div>
			<div class="col-lg-3">
				<label>email</label>
				<input type="text" name="email" class="form-control">
				</div>
				<div class="col-lg-3">
					<label>student</label>
					<input type="text" name="student" class="form-control">
				</div>
				<div class="col-lg-3">
					<label>city</label>
					<input type="text" name="city" class="form-control">
				</div>
				<div class="col-lg-3">
					<label>cantry</label>
					<input type="texte" name="cantry" class="form-control">
				</div>		







			<div class="col-lg-3">
			<input type="submit" name="" class="btn btn-success" value="Save">
			</div>







  </form>


<div class="col-lg-12">
<table class="table">
	<thead>
		<tr>
			<th>name</th>
			<th>mobile</th>
			<th>address</th>
			<th>roll</th>
			<th>city</th>
			<th>cantry</th>
			<th>student</th>
			<th>email</th>
			<th>pinkod</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($phonebooks as $phonebook)
		 <tr>
			<td>{{ $phonebook->name }}</td>
			<td>{{ $phonebook->mobile }}</td>
			<td>{{ $phonebook->address }}</td>
			<td>{{ $phonebook->roll }}</td>
			<td>{{ $phonebook->pinkod }}</td>
			<td>{{ $phonebook->student }}</td>
			<td>{{ $phonebook->Action }}</td>
			<td>{{ $phonebook->email }}</td>
			<td>{{ $phonebook->email }}</td>
		</tr>
		@endforeach
		
	</tbody>
</table>
	 
</div>	








</body>
</html>