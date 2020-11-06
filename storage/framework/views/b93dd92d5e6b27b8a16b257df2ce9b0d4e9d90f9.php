<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo e(route('data.store')); ?>" method="post" enctype="multipart/form-data" >
	<?php echo e(csrf_field()); ?>

	<input type="file" name="file">
	<input type="submit" name="">
</form>
</body>
</html>