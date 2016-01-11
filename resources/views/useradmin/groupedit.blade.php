@extends('template')
@section('pageheader')
    Gruppen editieren
@endsection
@section('pageheadersmall')
    Admin Menu für Gruppen
@endsection
@section('menu')
    Benutzerverwaltung
@endsection
@section('content')
    <div class='row'>

        <div class='col-md-3'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Anmerkung</label>
                            <input type="text" class="form-control" id="remark" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="aktiv">Aktiv
                            </label>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->




        </div><!-- /.col -->

    </div><!-- /.row -->


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
            $('#example').DataTable( {
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "{{ asset('/assets/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
                },
                ajax: {
                        url: '{{ asset('/useradmin/groups/ajax') }}',
                        dataSrc: 'groups'
                },

                "columns": [
                    { "data": "name" },
                    { "data": "remark" },
                    { "data": "email" }
                ]

            } );


        } );
    </script>

@endsection

