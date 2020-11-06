<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{ route('data.store') }}" method="post" enctype="multipart/form-data" >
	{{ csrf_field() }}
	<input type="file" name="file">
	<input type="submit" name="">
</form>
</body>
</html>