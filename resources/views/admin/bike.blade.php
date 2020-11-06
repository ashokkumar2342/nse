@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>bike </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
                        <form action="{{ route('bikestore') }}" method="get" accept-charset="utf-8">  
  

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

                      <div class="col-lg-12">
                   <label>prodecat</label>
                   <input type="text" name="prodecat" class="form-control">
                 </div>


                 <div class="col-lg-12">
                  <input type="submit" name="submit" class="btn btn-success">
                   
                 </div>
               </form>




             </div>
        </div>
 
    </section>
    <!-- /.content -->
@endsection
 