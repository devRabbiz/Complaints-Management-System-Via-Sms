<div id="content">

	<?php
/*	echo "<pre>";
	print_r($list['technician_list']);
	exit(); */
	 ?>
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i>Forward Complaint To Customer</h3>
	
</div>

							
<?php /*
if ($list['Previous_fucntion'] == "customer_add") {
	echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>'.
 $list['Page_message']['add'].'</div>';
}elseif ($list['Previous_fucntion'] == "customer_edit") {
	
	echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>'.
 $list['Page_message']['edit'].'</div>';
}
; */

?>
<div id="mess"></div>	
<div class="separator"></div>
<div class="innerLR">
	<form action="<?php base_url('complaint/complaint_forword'); ?>" method="post">
	<div class="separator top form-inline small" style="height: 138px !important;">
		  	<div class="pull-left list_box ">
			<label class="strong">Select Technician:</label>
		<select class="" name="technician_id[]" multiple="" id="technician_id"  style="height: 123px;"   data-style="btn-default btn-small">
			<option value="0" selected disabled="disabled" >-- Select Technician --</option>
			<?php 
			foreach ($list['technician_list'] as $key => $value) {
			echo '<option value="'.$value['technician_id'].'" >'.$value['technician_name'].'&nbsp&nbsp&nbsp   '.$value['technician_department'].'</option>';
				}
			?>
		</select>
		<button type="submit"  class="compose_submit_top btn btn-icon btn-primary glyphicons circle_ok share"><i></i>Forward To Technician</button>
	</div> 
		<div class="clearfix"></div>
	</div>
		
		<table class="  table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-primary  ">
		<thead>
			<tr>
				<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
				<th style="width: 1%;" class="center">No.</th>
				<th>Company</th>
				
				<th class="center">Customer</th>
				<th class="center" >Complaint</th>
				<th class="center" >Status</th>
				<th class="center" >Date Time</th>
			</tr>
		</thead>
		<tbody>

		<?php 
		
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
			<td class="center uniformjs">
					<input type="checkbox" name="customer_complaint_id[]" value="'.$value['customer_complaint_id'].'"  />
				</td>
				<td class="center">'.$key.'</td>
				<td><a href="#" title="'.$value['customer_phone'].'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
				<td class="center important">'.$value['customer_name'].'</td>
				<td class="center" ><span class="label label-block " style="background: '.$value['complaint_code_color'].'!important;">'.$value['complaint_code_title'].'</span></td>
				<td class="center" ><span class="label label-block " style="background: '.$value['status_code_color'].'!important;">'.$value['status_code_title'].'</span></td>
				<td class="center" >'.$value['customer_complaint_date_insert'].'</span></td></tr>';
			 
	}	?>
		
					</tbody>
	</table>
	
	
	<div class="separator top form-inline small">
		
	<div class="pagination pull-right" style="margin: 0;">
		<?php // echo 	$list['Pagination']; ?>
			
		</div>
		<div class="clearfix"></div>
	</div>
	</form>
</div>
<br/>		
				<!-- End Content -->
		</div>