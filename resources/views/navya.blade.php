<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
 <table class="table">
 	 <tr>
 	 	<td>name</td>
 	 	<td>mobile</td>
 	 	<td>address</td>
 	 	<td>student</td>
 	 	<td>email</td>
 	 </tr>
 	 @foreach ($phonebooks as $phonebooks)
 	 <tr>
 	 	<td>
 	 		{{ $phonebooks->name }}
 	 	</td>
 	 	<td>
 	 		{{ $phonebooks->mobile }}

 	 	</td>
 	 	<td>
 	 		{{ $phonebooks->address }}
 	 	</td>
 	 	<td>
 	 		{{ $phonebooks->student }}
 	 	</td>
 	 	<td>
 	 		{{ $phonebooks->email }}
 	 	</td>
 	 </tr>
 	 @endforeach
 	
 </table>
</body>
</html>