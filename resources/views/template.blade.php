@include('header')
<!-- Headermenu -->
@include('headmenu')
<!-- Sidebar -->
@include('sidebar')
 
 
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('pageheader')
            <small>@yield('pageheadersmall')</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
            <li class="active">@yield('menu')</li>
          </ol>
        </section>
                <!-- Main content -->
        <section class="content">
              
          <!-- Your Page Content Here -->
			@yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<!-- Footer -->
@include('footer')
      