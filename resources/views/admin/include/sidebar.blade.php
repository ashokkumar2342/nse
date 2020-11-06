<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- Sidebar user panel -->
                            <!-- search form -->
    {{--     <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form> --}}
        <!-- /.search form -->
    <ul class="sidebar-menu" style="height:730px;overflow: auto">
       
        {{-- <li class="header">MAIN NAVIGATION</li> --}}
        <li >
          <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        
         {{-- {{  App\Helper\MyFuncs::menus() }} --}}
        
        
         <li> 
          <a href="{{ route('mobile') }}"><i class="fa fa-mobile"></i> <span>mobile</span></a>
        </li>

   
         
         <li> 
          <a href="{{ route('car') }}"><i class="fa fa-car"></i> <span>car</span></a>
        </li> 
        
     
         <li>
          <a href="{{ route('laptop') }}"><i class="fa fa-laptop"></i> <span>laptop</span></a>
        </li>
          

         <li>
          <a href="{{ route('bike') }}"><i class="fa fa-bicycle "></i> <span>bike</span></a>
        </li>

         <li>
          <a href="{{ route('redio') }}"><i class="fa fa-film "></i> <span>redio</span></a>
        </li>


         <li>
          <a href="{{ route('telibijen') }}"><i class="fa fa-telibijen"></i> <span>telibijen</span></a>
        </li>
         <li>
          <a href="{{ route('user') }}"><i class="fa fa-user"></i> <span>user</span></a>
        </li>

         <li>
          <a href="{{ route('ayush') }}"><i class="fa fa-ayush"></i> <span>ayush</span></a>
        </li>

</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->
