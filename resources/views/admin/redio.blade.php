@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>redio </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">

            <form action="{{ route('rediostore') }}" method="get" accept-charset="utf-8">  

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


             </div>
        </div>
 
    </section>
    <!-- /.content -->
@endsection
 