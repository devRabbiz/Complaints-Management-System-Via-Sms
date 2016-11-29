<div id="content">
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i>Technician Status Code List</h3>
	<div class="buttons pull-right">
		<a href="<?php echo base_url(); ?>status_code/status_code_add" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add Short Code</a>
	</div>
</div>

<div id="mess"></div>	
<div class="separator"></div>

<div class="innerLR">
		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs table-primary  js-table-sortable">
		<thead>
			<tr>
				<th style="width: 1%;" class="center">No.</th>
				<th>Title</th>
				
				<th class="center">Code</th>
				<th class="center">Colour</th>
				<th class="right" >Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list['row'] as $key => $value) {
			$base_64_role = base64_encode($value['status_code_id']);
                  $url_param = rtrim($base_64_role, '=');
				echo '<tr class="selectable" id="'.$value['status_code_id'].'" >
				<td class="center">'.$key.'</td>
				<td><strong>'.$value['status_code_title'].'</strong></td>
				<td class="center"><strong>'.$value['status_code'].'</strong></td>
				<td class="center" ><span class="label label-block " style="background: '.$value['status_code_color'].'!important;" >'.$value['status_code_color'].'</span></td>
				<td class="center" style="width: 60px;">
				<a href="'.base_url().'status_code/status_code_edit/'. $url_param.'" class="btn-action glyphicons pencil btn-success"><i></i></a>'; ?>
				<a href="javascript: void(0);"  onclick="deleteRecord('<?php echo  $value['status_code_id'];?>','<?php echo base_url()."status_code/status_code_delete/"; ?>')" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
				</td>
			</tr>
		<?php	 }	?>
					</tbody>
	</table>
	
	<div class="separator top form-inline small">

	<div class="pagination pull-right" style="margin: 0;">
			<?php echo 	$list['Pagination']; ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<br/>		
				<!-- End Content -->
		</div>