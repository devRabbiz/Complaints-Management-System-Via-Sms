<div id="content">

	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Technician List</h3>
	<div class="buttons pull-right">
		<a href="<?php echo base_url(); ?>technician/technician_add" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add Technician</a>
	</div>
</div>

							

	<div id="mess"></div>
<div class="separator"></div>

<div class="innerLR">
		<table class="table table-bordered table-condensed table-striped table-vertical-center table-primary  checkboxs js-table-sortable">
		<thead>
			<tr>
				<th style="width: 1%;" class="center">No.</th>
				
				
				<th class="center">Technician</th>
				<th class="center" >Email</th>
				<th class="center" >Phone</th>
				<th class="center" >Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				  $base_64_role = base64_encode($value['technician_id']);
                  $url_param = rtrim($base_64_role, '=');
                   $phone = explode(",",$value['technician_phone']);
			echo '
			<tr class="selectable" id="'.$value['technician_id'].'">
				<td class="center">'.$key.'</td>
				
				<td class="center important" ><a href="'.base_url().'technician/technician_view/'.$url_param.'" ><strong>'.$value['technician_name'].'</strong></a></td>
				<td class="center" >'.$value['technician_email'].'</td>
				<td class="center" >'.$phone['0'].'</td>
				<td class="center" style="width: 60px;">
				<a href="'.base_url().'technician/technician_edit/'.$url_param.'" class="btn-action glyphicons pencil btn-success"><i></i></a>'; ?>
				<a href="javascript: void(0);"  onclick="deleteRecord('<?php echo  $value['technician_id'];?>','<?php echo base_url()."technician/technician_delete/"; ?>')" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
				</td>
			</tr>
			<?php  }	?>

			
		
			
		
			
					</tbody>
	</table>
	
	<div class="separator top form-inline small">
	<!--  	<div class="pull-left checkboxs_actions hide">
			<label class="strong">With selected:</label>
		<select class="selectpicker" data-style="btn-default btn-small">
			<option>Action</option>
			<option>Action</option>
			<option>Action</option>
		</select>
	</div> -->
	<div class="pagination pull-right" style="margin: 0;">
		<?php echo 	$list['Pagination']; ?>
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<br/>		
				<!-- End Content -->
		</div>