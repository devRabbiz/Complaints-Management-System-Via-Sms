<div id="content">

	<?php
/*	echo "<pre>";
	print_r($list);
	exit(); */
//
//	echo ADMIN_RIGHTS_SESSION; 
 //  echo OPERATOR_RIGHTS_SESSION; 
	 ?>
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Customer List</h3>
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
		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-primary dynamicTable  table-primary  dataTable ui-sortable ">
		<thead>
			<tr>
				<th style="width: 1%;" class="center">No.</th>
				<th>Company</th>
				
				<th class="center">Customer</th>
				<th class="center" >Address</th>
				<th class="center" >Phone</th>
				<th class="center" >Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				  $base_64_role = base64_encode($value['customer_id']);
                  $url_param = rtrim($base_64_role, '=');
             $phone = explode(",",$value['customer_phone']);
                      $phone_primary = explode(",",$value['customer_primary_phone']);
              
             $address = substr($value['customer_address'], 0,120);  
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
				<td class="center">'.$key.'</td>
				<td><a href="'.base_url().'customer/customer_view/'.$url_param.'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
				<td class="center important">'.$value['customer_name'].'</td>
				<td class="center" >'.$address.'</td>
				<td class="center" >'.$phone['0']." / ".$phone_primary['0'].'</span></td>
				<td class="center" style="width: 160px;">
				<a href="'.base_url().'machine/machine_add/'.$url_param.'" class="btn-action glyphicons   btn-success cogwheels"><i></i></a>
				<a href="'.base_url().'customer/customer_edit/'.$url_param.'" class="btn-action glyphicons pencil btn-success"><i></i></a>'; ?>
				<a href="javascript: void(0);"  onclick="deleteRecord('<?php echo  $value['customer_id'];?>','<?php echo base_url()."customer/customer_delete/"; ?>')" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
				</td>
			</tr>
		<?php	 }	?>
		
					</tbody>
	</table>
	
	<div class="separator top form-inline small">
		<!--  	<div class="pull-left list_box">
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