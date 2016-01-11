@extends('template')
@section('pageheader')
    Gruppen administrieren
@endsection
@section('pageheadersmall')
    Admin Menu für Gruppen
@endsection
@section('menu')
    Benutzerverwaltung
@endsection
@section('content')
    <div class='row'>

        <div class='col-md-9'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Second Box</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    A separate section to add any kind of widget. Feel free
                    to explore all of AdminLTE widgets by visiting the demo page
                    on <a href="https://almsaeedstudio.com">Almsaeed Studio</a>.<br></br>
                    @foreach($groups as $group)
                        {{ $group['name'] }}{{ $group['remark'] }}{{ $group['email'] }} <br></br>
                    @endforeach
                    {{ $groups }}

                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gruppe</th>
                            <th>Anmerkung</th>
                            <th>Email</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->


        </div><!-- /.col -->

        <div class='col-md-3'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Edit</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="frmGroup" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="fid" id="fid" placeholder="Neu" readonly>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" name="fname" id="fname" placeholder="Gruppename">
                        </div>
                        <div class="form-group">
                            <label>Anmerkung</label>
                            <input type="text" class="form-control" name="fremark" id="fremark" placeholder="Beschreibung">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input required type="email" class="form-control" name="femail" id="femail" placeholder="Gruppen Email"
                              data-validation-matches-match="email" data-validation-matches-message="Must match email address entered above" >
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="faktiv">Aktiv
                            </label>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">


                        <button type="button" id="fbtsave" class="btn btn-normal">Anlegen</button>&nbsp;
                        <button type="button" id="fbtdelete" class="btn btn-danger">Delete</button>
                    </div>
                </form>
                <div id="danger" class="alert alert-danger alert-dismissable collapse">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
                </div>
                <div id="success" class="alert alert-success alert-dismissable collapse">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Erfolgreich!</h4>
                    Success alert preview. This alert is dismissable.
                </div>
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
     <!-- validation -->
    <script src="{{ asset('/assets/plugins/validation/jqBootstrapValidation.js')}}"></script>

<script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>
       
    <script>
        $(document).ready(function() {
        	
        	
        	
            var table = $('#example').DataTable( {

                ajax: {
                        url: '{{ asset('/useradmin/groups/ajax') }}',
                        dataSrc: 'groups'
                },

                "columns": [

                    { "data": "id" },
                    { "data": "name" },
                    { "data": "remark" },
                    { "data": "email" }
                ]

            } );



            $('#example tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('active') ) {
                    $(this).removeClass('active');

                    $('#fid').val( "Neu");
                    $('#fname').val("");
                    $('#fremark').val( "");
                    $('#femail').val( "");
                    $('#fbtsave').html('Anlegen');
                }
                else {
                    table.$('tr.active').removeClass('active');
                    $(this).addClass('active');

                    $('#fid').val( table.cell('.active', 0).data());
                    $('#fname').val( table.cell('.active', 1).data());
                    $('#fremark').val( table.cell('.active', 2).data());
                    $('#femail').val( table.cell('.active', 3).data());
                    $('#fbtsave').html( 'Speichern');
                }
            } );

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });


            var saveGroup = function(){
               
               if ( $("input,select,textarea").not("[type=submit]").jqBootstrapValidation("hasErrors") ) {
			   	alert("dfg");
			   	
			   	return 0;
			   }

                    $.ajax({
                        url: '/useradmin/groups/axsave',
                        type: 'post',
                        cache: false,
                        dataType: 'json',
                        data: $('form#frmGroup').serialize(),
                        beforeSend: function() {
                            //$("#validation-errors").hide().empty();
                            //alert($('#frmGroup').serialize())
                        },
                        success: function(data, textStatus, jqXHR) {
                            console.log("Success!");
                            $("#"+data.status).show();
                            alert(data.status+" "+data.msg);
                        },
                        error: function( jqXHR,  textStatus,  errorThrown) {
                         
                            alert(textStatus);
                        }
                    });
				event.preventDefault();
            };

            $("#fbtsave").click(saveGroup);

            $('#button').click( function () {
                alert(table.row('.active'));
                table.row('.active').remove().draw( false );
            } );


        } );
    </script>

@endsection

