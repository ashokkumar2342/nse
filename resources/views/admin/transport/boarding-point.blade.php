@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Route Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-horizontal add_form" content-refresh="boardingPoint_table" action="{{ route('admin.boardingPoint.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-6">                                             
                         <div class="form-group">
                           {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>'  Boarding Point Name']) }} 
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-6">                                             
                         <div class="form-group">
                           {{ Form::text('address','',['class'=>'form-control','id'=>'address', 'placeholder'=>'  Boarding Point Address']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-6">                                             
                         <div class="form-group">
                           {{ Form::text('single_side_fee_amount','',['class'=>'form-control','id'=>'single_side_fee_amount', 'placeholder'=>'  Single Side Fee Amount']) }} 
                         </div>                                         
                      </div> 
                      <div class="col-lg-6">                                             
	                       <div class="form-group">
	                         {{ Form::text('both_side_fee_amount','',['class'=>'form-control','id'=>'both_side_fee_amount', 'placeholder'=>'  Both Side Fee Amount']) }} 
	                       </div>                                         
	                    </div>
	                  
                       
	                     <div class="col-lg-12 text-center">                                             
	                     <button class="btn btn-success" type="submit" id="btn_fee_account_create">Create</button> 
	                    </div>                     
	                </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="boardingPoint_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>Name</th> 
                                <th>Address</th> 
                                <th>Single Side Amount</th> 
                                <th>Both Side Amount</th>  
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($BoardingPoints as $boardingPoint)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $boardingPoint->name }}</td>
                             
                            <td>{{ $boardingPoint->address }}</td>
                            <td>{{ $boardingPoint->single_side_fee_amount }}</td>
                            <td>{{ $boardingPoint->both_side_fee_amount }}</td>
                         
                        		<td> 
                        			{{-- <button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $transport->id }}"  data-code="{{ $transport->code }}" data-name="{{ $transport->name }}" data-description="{{ $transport->description }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button> --}}

                        			<a href="{{ route('admin.boardingPoint.delete',Crypt::encrypt($boardingPoint->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                        		</td>
                        	</tr>  	 
                        @endforeach	
                           
                        </tbody>
                             

                    </table>
                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    
@endpush