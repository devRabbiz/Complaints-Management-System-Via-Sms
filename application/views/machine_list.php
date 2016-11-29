<div id="content">

	<?php
	//echo "<pre>";
	//print_r($list);
	//exit(); 
	 ?>
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Machine List</h3>
	<div class="buttons pull-right">
		<a href="<?php echo base_url(); ?>customer/customer_add" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add Customer</a>
	</div>
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


		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable dynamicTable  table-primary  dataTable ui-sortable">
		<thead>
			<tr>
				<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
				<th style="width: 1%;" class="center">No.</th>
				<th>Customer Name</th>
				<th>Machine Code</th>
				
				<th class="center">Warranty start</th>
				<th class="center" >Warranty end</th>
				
			</tr>
		</thead>
		<tbody>

			<?php 
			$machine_key = array();
foreach ($list['row'] as $key => $row)
{


    $machine_key[$key] = str_replace("j", "", str_replace("J", "", $row['machine_key']));
}
$machine_list = array_multisort($machine_key, SORT_DESC, $list['row']);
			
			
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				
          
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
				<td class="center uniformjs">
					<input type="checkbox" />
				</td>
				<td class="center">'.$key.'</td>
				
				<td><strong>'.$value['customer_name'].'</strong></td>
				<td><strong>'.$value['machine_key'].'</strong></td>
				<td class="center important">'.$value['machine_warranty_start'].'</td>
				<td class="center" >'.$value['machine_warranty_end'].'</td>
				
				
				
			</tr>';
		 }	?>
		
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
		<?php // echo 	$list['Pagination']; ?>
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<br/>		
				<!-- End Content -->
		</div>