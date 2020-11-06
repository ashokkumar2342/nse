@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>ayush </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="container">
                <div class="row"> 

            <form action="{{ route('ayushstore') }}" search-url="{{ route('ayushstore') }}" id="form-overview"    method="post" accept-charset="utf-8">  
              {{ csrf_field() }}
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
                  <input type="submit"    name="submit" class="btn btn-success">
                   
                 </div>
               </form>
                 <div id="progress">
                       
                  </div>

             </div>
              
        </div>

 
    </section>
    <!-- /.content -->
@endsection
@push('scripts') 
 <script type="text/javascript">
     $(document).ready(function() {
         $('#form-overview').on('submit', function(event) {  
           event.preventDefault();
             setInterval(function(){
                 $.getJSON('{{ route('progressbar') }}', function(data) {
                     $('#progress').html(data[0]);
                 });
             }, 5000);

             $.post(
                 $(this).prop('action'),
                 {"_token": $(this).find('input[name=_token]').val()},
                 function() {
                     window.location.href = 'success';
                 },
                 'json'
             );

             return false;
         });
     });
 </script>   
<script>

   
  // function searchForm2(formObj){  
  //    event.preventDefault(); //prevent default action 
  //    statusbarStart()
     
  //   var pleaseWait=$("<div>please wait.......</div>");
  //   var uploadProgress=$("<div class='upload-progress'><div class='progress-bar'></div></div>");
  //   pleaseWait.insertAfter(formObj);
  //     var post_url = formObj.getAttribute('search-url'); //get form action url 
  //     var request_method = 'POST'; //get form GET/POST method
  //     var form_data = new FormData(formObj); //Encode form elements for submission
  //     $(formObj).find(".alert").remove();
  //     $.ajax({
  //         url : post_url,
  //         type: request_method,
  //         data : form_data, 
  //         async:true,
  //         contentType: false,
  //         processData:false,
  //         xhr: function(){
  //         //upload Progress
  //         var xhr = $.ajaxSettings.xhr();
  //         if (xhr.upload) {
        
  //       pleaseWait.remove();
  //       //update progressbar
  //       uploadProgress.insertAfter(formObj);
  //       //console.log(5);
  //             xhr.upload.addEventListener('progress', function(event) {
  //                 var percent = 0;
  //                 var position = event.loaded || event.position;
  //                 var total = event.total;
  //                 if (event.lengthComputable) {
  //                     percent = Math.ceil(position / total * 100);
  //                 }
  //         //console.log(2);
  //         uploadProgress.css("width", + percent +"%");
  //         //console.log(3);
  //             }, true);
  //         }
  //         return xhr;
  //     }
  //     }).done(function(response){ //
    
  //   pleaseWait.remove();
  //   uploadProgress.remove();
    
  //   if(response.status==0){
  //     if(formObj.getAttribute('import')=="true"){
  //       errorMsg(response.msg)
  //       //$('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> <strong>'+response.msg+'</strong>'+response.data+'</div>').insertAfter(formObj);
  //       formObj.reset();
  //     }
  //     else{
  //       if(formObj.getAttribute('error-id')){
  //         $('#'+formObj.getAttribute('error-id')).html(response.msg);
  //       }else{
  //         errorMsg(response.msg)
          
  //         //$(formObj).append($('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Warning!</strong> '+response.msg+'</div>'));
  //       }
  //     }
  //   }else if(response){
  //     console.log(response);
  //     $('#adv_filter_content').html(response);
  //     if(formObj.getAttribute('data-table-without-pagination'))
  //         {
  //           $('#'+formObj.getAttribute('data-table-without-pagination')).DataTable({
  //           'paging':   false,
  //           dom: 'Bfrtip',
  //             buttons: [
  //               'copy', 'csv', 'excel', 'pdf', 'print'
  //             ]
  //         });
  //         }
          
      
  //     else{
  //       $(formObj).append($('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Success!</strong> '+response.msg+'</div>'));
  //     }

  //     if(formObj.getAttribute('content-refresh') && response.status==1)
  //     { 
  //       var myStr = formObj.getAttribute('content-refresh');
  //           var strArray = myStr.split(",");
          
  //           for(var i = 0; i < strArray.length; i++){
  //             $("#"+strArray[i]).load(location.href + ' #'+strArray[i]);
  //            }
  //     }

  //     if(formObj.getAttribute('no-reset')!="true"){
  //       formObj.reset();
  //       $(formObj).find('.multiselect').selectpicker("refresh");
  //       $(formObj).find('.summernote').summernote("reset");
  //     }
        
  //   }
  //     });
  // }
</script>
@endpush