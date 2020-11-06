<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
	<form action="<?php echo e(url('add')); ?>" method="get" accept-charset="utf-8">
	   <div class="row">
			<div class="col-lg-3">
				<label>name</label>  
				<input type="text" name="name" class="form-control" required="">
			</div> 
			<div class="col-lg-3">
				<label>mobile no</label>
				<input type="text" name="mobile" class="form-control"> 
			</div> 
			<div class="col-lg-3">
				<label>address</label>
				<input type="text" name="address" class="form-control"> 
			</div>
			<div class="col-lg-3">
				<label>Student</label>
				<input type="text" name="student" class="form-control">
				
			</div>
			<div class="col-lg-3">
				<label>email</label>
				<input type="text" name="email" class="form-control">
				</div>
			<div class="col-lg-3">
				<label>pinkod</label>
				<input type="text" name="pinkod" class="form-control">
				</div>			

				<div class="col-lg-3">
				<label>roll</label>
				<input type="text" name="roll" class="form-control">
				</div>

				<div class="col-lg-3">
				<label>city</label>
				<input type="text" name="city" class="form-control">
				</div>

				<div class="col-lg-3">
				<label>country</label>
				<input type="text" name="country" class="form-control">
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
    			<td>address</td>
    			<td>student</td>
    			<td>email</td>
    			<td>pinkod</td>
    			<td>roll</td>
    			<td>city</td>
    			<td>country</td>
    			<td>Action</td>
    		</tr>

    		
    		<?php $__currentLoopData = $phonebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phonebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<tr>
    			<td><?php echo e($phonebook->name); ?></td>
    			<td><?php echo e($phonebook->mobile); ?></td>
    			<td><?php echo e($phonebook->address); ?></td>
    			<td><?php echo e($phonebook->student); ?></td>
    			<td><?php echo e($phonebook->email); ?></td>
    			<td><?php echo e($phonebook->pinkod); ?></td>
    			<td><?php echo e($phonebook->roll); ?></td>
    			<td><?php echo e($phonebook->city); ?></td>
    			<td><?php echo e($phonebook->country); ?></td>
    			<td>
    				<button class="btn btn-danger">Delete</button>
    			</td>
    			 
    		</tr>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    		
    	</table>
</body>
</html>