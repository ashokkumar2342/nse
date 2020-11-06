<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>car </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">

            <form action="<?php echo e(route('carstore')); ?>" method="get" accept-charset="utf-8">  

            		 <div class="col-lg-4">
                   <label>Name</label>
                   <input type="text" name="name" class="form-control">
                 </div>

                  <div class="col-lg-4">
                   <label>Color</label>
                   <input type="text" name="color" class="form-control">
                 </div>

                  <div class="col-lg-4">
                   <label>Description</label>
                   <input type="text" name="description" class="form-control">
                 </div>

                  <div class="col-lg-4">
                  <input type="submit" name="submit" class="btn btn-success">
                   
                 </div>
                  </form>


             </div>
        </div>
 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>