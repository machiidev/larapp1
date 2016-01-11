<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 26.10.2015
 * Time: 09:41
 */
<
!--Box -->
		<div class="box box-primary hidden" >
			<div class="box-header with-border" >
				<h3 class="box-title" >
Second Box
</h3 >
				<div class="box-tools pull-right" >
					<button class="btn btn-box-tool" data - widget = "collapse" data - toggle = "tooltip" title = "Collapse" >
						<i class="fa fa-minus" >
						</i >
					</button >
					<button class="btn btn-box-tool" data - widget = "remove" data - toggle = "tooltip" title = "Remove" >
						<i class="fa fa-times" >
						</i >
					</button >
				</div >
			</div >
			<div class="box-body" >
A separate section to add any kind of widget . Feel free
				to explore all of AdminLTE widgets by visiting the demo page
				on
                < a href = "https://almsaeedstudio.com" >
        Almsaeed Studio
</a >.
				<br >
				</br >
@foreach($groups as $group)
    {{ $group['name'] }}{{ $group['remark'] }}{{ $group['email'] }}
    <br>
    </br>
@endforeach
{{ $groups }}

</div><!-- /.box-body -->
</div><!-- /.box -->