@extends('template')
@section('pageheader')
    Bird View
@endsection
@section('pageheadersmall')
    alle Innovationen von oben
@endsection
@section('menu')
    Bird View
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->

        <div class="row">
          <div class="col-md-3 border-right">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Evaluation</h3>
              </div>
              <div class="panel-body">
                <p>Webapplication Rudi</p>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 30%;">30% Complete</div>sdf
                </div>
                <p>Webapplication Franzi <span class="label label-warning pull-right">10</span></p>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 50%;">50% Complete</div>
                  <small class="label label-danger pull-right">5</small>
                </div>
                <p>Stecker Loo</p>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 60%;">60% Complete</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3  border-right">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Conception</h3>
              </div>
              <div class="panel-body">
                <p>Panel content</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Implementation</h3>
              </div>
              <div class="panel-body">
                <p>Panel content</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">Launch</h3>
              </div>
              <div class="panel-body">
                <p>Panel content</p>
              </div>
            </div>
          </div>
        </div>
      
 <!-- Content Wrapper. Contains page content -->      
@endsection

@section('skripte')
        <!-- DataTables -->
    <script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/assets/plugins/fastclick/fastclick.min.js')}}"></script>

    <script>
        $(document).ready(function() {

        } );
    </script>

@endsection
      