<!DOCTYPE html>
<html>
<Head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
<table class="table">
	<tr>
		<td>name</td>
		<td>mobile</td>
		<td>address</td>
		<td>class</td>
		<td>pinkod</td>
		<td>email</td>
		<td>city</td>
		<td>cantry</td>
		<td>id</td>
	</tr>
	 	<tr>
	 		
    		@foreach ($phonebooks as $phonebook)
    		<tr>
    			<td>
    			<td>{{$phonebook->name }}</td>
    			<td>{{$phonebook->mobile }}</td>
    			<td>{{$phonebook->address }}</td>
    			<td>{{$phonebook->student }}</td>
    			<td>{{$phonebook->email }}</td>
    			<td>{{$phonebook->pinkod }}</td>
    			<td>{{$phonebook->roll }}</td>
    			<td>{{$phonebook->city }}</td>
    			<td>{{$phonebook->country }}</td>
    			<td>
    				
    				<button class="btn btn-danger">Delete</button>
    			</td>
	 	    </tr>
	       @endforeach
</table>
</body>
</html>