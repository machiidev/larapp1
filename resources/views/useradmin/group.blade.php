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


		<div class="box box-primary ">
			<!--
                        <div clabox-header">
                            <!--<h3 class="box-title">
                                Data Table With Full Features
                            </h3>
			</div>--><!-- /.box-header -->
			<div class="box-body slimScrollDiv">
				<table id="mydatatbl" class="table table-bordered table-striped hover compact">
					<thead>
						<tr>
							<th>
								ID
							</th>
							<th>
								Name
							</th>
							<th>
								Beschreibung
							</th>
							<th>
								Email
							</th>
							<th>
								MID
							</th>
							<th>
								Manager
							</th>
						</tr>
					</thead>
					<tbody>

					</tbody>

				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->


	</div><!-- /.col -->

	<div class='col-md-3 '> <!-- rechte spalte -->
		<div class=""row">
			<!-- Box -->

				<div class="box box-primary affix" data-spy="affix" >
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <i class="fa fa-fw fa-edit"></i> Quick Edit
                                </h3>
                            </div><!-- /.box-header -->
				<!-- form start -->
                            <form action"#" method="post" id="frmGroup" role="form" >
                                <div class="box-body controls">
                                    <div class="form-group">
                                        <label>
                                            ID
                                        </label>
                                        <input type="text" class="form-control" name="fid" id="fid" placeholder="Neu" readonly>
                                    </div>
                                    <div class="form-group has-primary">
                                        <label>
                                            Name
                                        </label>
                                        <input required type="text" class="form-control" name="fname" id="fname" placeholder="Gruppename">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Anmerkung
                                        </label>
                                        <input type="text"  minlength="10" class="form-control" name="fremark" id="fremark" placeholder="Beschreibung">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Email address
                                        </label>
                                        <div class="controls">
                                            <input required type="email" class="form-control" name="femail" id="femail" placeholder="Gruppen Email"
                                            data-validation-matches-match="email" data-validation-matches-message="Must match email address entered above" >

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Manager
                                        </label>
                                        <select id="fmanager" name="fmanager" class="form-control select2" placeholder="Manager auswählen" style="width: 100%;">


                                        </select>
                                    </div><!-- /.form-group -->
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="faktiv">Aktiv
                                        </label>
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">


                                    <button type="submit" id="fbtsave" class="btn btn-success">
                                        <i class="fa fa-fw fa-save"></i> Anlegen
                                    </button>&nbsp;
                                    <button type="button" id="fbtdelete" class="btn btn-danger pull-right">
                                        <i class="fa fa-fw fa-times"></i> Delete
                                    </button>
                                </div>
                            </form>

                            <div id="success" class="alert alert-success alert-dismissable collapse">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h4>
                                    <i class="icon fa fa-check">
                                    </i>OK!
                                </h4>

                            </div>
			</div><!-- /.box -->
		</div> <!-- row -->
	</div><!-- rechte spalte -->



	</div><!-- /.col -->



</div><!-- /.row -->

<div id="fehler" class="modal modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modal Default</h4>
			</div>
			<div class="modal-body">
				<p id="fehlermeldung"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline " data-dismiss="modal">Schließen</button>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('skripte')
<script src="{{ asset('/assets/plugins/select2/select2.full.min.js')}}">
</script>
<!-- DataTables -->
<script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.js')}}">
</script>
<script src="{{ asset('/assets/plugins/datatables/dataTables.bootstrap.js')}}">
</script>
<script type="text/javascript" language="javascript" src="{{ asset('/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js') }}">
</script>
<!-- SlimScroll -->
<script src="{{ asset('/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}">
</script>
<!-- FastClick -->
<script src="{{ asset('/assets/plugins/fastclick/fastclick.min.js')}}">
</script>


<script>
	$(function ()
		{
			//Initialize Select2 Elements
			$(".select2").select2();
		})


	function loadselectdata(sid,url)
	{


		var $element = $('#fmanager').select2(); // the select element you are working with

		var $request = $.ajax(
			{
				url: '{{ asset('/useradmin/groups/axmanager') }}', // wherever your data is actually coming from
				dataType: 'json'
			});

		$request.then(function (data)
			{
				// This assumes that the data comes back as an array of data objects
				// The idea is that you are using the same callback as the old `initSelection`

				var jsonobj= data;
				for (var d in jsonobj)
				{
					var itemr = jsonobj[d];

					// Create the DOM option that is pre-selected by default
					// , id, defualtselected, nowselectd
					var option = new Option(itemr.text, itemr.id, false, false);

					// Append it to the select
					$element.append(option);
				}

				// Update the selected options that are displayed
				$element.trigger('change');
			});

	}; // function



</script>

<script>
	$(document).ready(function()
		{



			var table = $('#mydatatbl').DataTable(
				{

					ajax:
					{
						url: '{{ asset('/useradmin/groups/ajax') }}',
						dataSrc: 'groups'
					},

					"columns": [

						{
							"data": "id"
						},
						{
							"data": "name"
						},
						{
							"data": "remark"
						},
						{
							"data": "email"
						},
						{
							"data": "admin_user_id"
						},
						{   "type": "string",
							"defaultContent": "<i>Not set</i>",
							"data": "manager.name"
						}
					]

				});



			$('#mydatatbl tbody').on( 'click', 'tr', function ()
				{
					if ( $(this).hasClass('active') )
					{
						$(this).removeClass('active');

						$('#fid').val( "Neu");
						$('#fname').val("");
						$('#fremark').val( "");
						$('#femail').val( "");

						$('#fmanager').val("0").trigger('change');
						$('#fbtsave').html('Anlegen');
						$('#fbtdelete').hide();
					}
					else
					{
						table.$('tr.active').removeClass('active');
						$(this).addClass('active');

						$('#fid').val( table.cell('.active', 0).data());
						$('#fname').val( table.cell('.active', 1).data());
						$('#fremark').val( table.cell('.active', 2).data());
						$('#femail').val( table.cell('.active', 3).data());
						$('#fmanager').val(table.cell('.active', 4).data()).trigger('change');
						$('#fbtsave').html( 'Speichern');
						$('#fbtdelete').show();
					}
				});

			$.ajaxSetup(
				{
					headers:
					{
						'X-CSRF-Token' : $('meta[name=_token]').attr('content')
					}
				});
			//___________________




			$( "#frmGroup" ).submit(function( event )
				{
					//alert("submit");

					$.ajax(
						{
							url: '/useradmin/groups/axsave',
							type: 'post',
							cache: false,
							dataType: 'json',
							data: $('form#frmGroup').serialize(),
							beforeSend: function()
							{
								//$("#validation-errors").hide().empty();
								//alert($('#frmGroup').serialize())
							},
							success: function(data, textStatus, jqXHR)
							{

								if (data.status=='success' ) {
									$("#success").show().delay( 800 ).fadeOut( 400 );
									$("#success").text(data.msg);
									table.ajax.reload();
								} else {

									$('#fehlermeldung').text(data.msg);
									$('#fehler').modal('toggle')
								}

							},
							error: function( jqXHR,  textStatus,  errorThrown)
							{
								//alert(textStatus);

							}
						});
					event.preventDefault();
				});

			$(".select2").select2();
			loadselectdata();
			$("#fmanager").val(null).trigger("change");

		});
</script>

@endsection

