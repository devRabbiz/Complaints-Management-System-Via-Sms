<div id="content">

	<?php
/*	echo "<pre>";
	print_r($list);
	exit(); */
	 ?>
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i>  Send Activation Code To Customer</h3>

</div>

							
<?php 
if ($list['Previous_fucntion'] == "customer_add") {
	echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>'.
 $list['Page_message']['add'].'</div>';
}elseif ($list['Previous_fucntion'] == "customer_edit") {
	
	echo '<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>'.
 $list['Page_message']['edit'].'</div>';
}
?>
<div id="mess"></div>	
<div class="separator"></div>

<div class="innerLR">
	<form action="<?php base_url('compose/compose_for_Activation'); ?>" method="post">
	
	<div class="separator top form-inline small">
			<div class="pull-left list_box">
		  	
		  <!--	<label class="strong">Type Code </label>
		<input type="text" name="customer_activation_code" id="customer_activation_code" class="span6" placeholder="Activation Code for Customer">
		<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
		-->
				<select name="phone_type">
			<option value="1" >Both Number</option>
			<option value="2" >Primary User</option>
			<option  value="3" >Normal User</option>


		</select>
		<button type="submit"  class="compose_submit_top btn btn-icon btn-primary glyphicons circle_ok share"><i></i>Send To Customer</button>
	</div> 
		<div class="clearfix"></div>
	</div>
		<table class=" table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable dynamicTable  table-primary  dataTable">
		<thead>
			<tr>
				<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
				<th style="width: 1%;" class="center">No.</th>
				<th>Company</th>
				
				<th class="center">Machine Code</th>
				<th class="center" >Activation Code</th>
				<th class="center" >Phone</th>
			</tr>
		</thead>
		<tbody>
		<?php 


			$a=0;
			foreach ($list['row'] as $key => $value) { 
				  $base_64_role = base64_encode($value['customer_id']);
                  $url_param = rtrim($base_64_role, '=');
             $phone = explode(",",$value['customer_phone']); 
             $customer_entity['activation_code_id'] = $value['activation_code_id'];
             $customer_entity['customer_primary_phone'] = $value['customer_primary_phone'];
             $customer_entity['customer_phone'] = $value['customer_phone'];
             $customer_entity['customer_email'] = $value['customer_email'];
             $customer_entity['machine_code'] = $value['machine_code'];
             $customer_entity['activation_code'] = $value['activation_code'];
             $customer_entity['activation_date'] = $value['activation_date'];
             
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
				<td class="center uniformjs">
					<input type="checkbox" id="send_activation_code"  name="customer_id[]"  value='.json_encode($customer_entity).' />
				</td>
				<td class="center">'.$key.'</td>
				<td><a href="'.base_url().'customer/customer_view/'.$url_param.'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
				<td class="center important">'.$value['machine_code'].'</td>
				<td class="center" >'.$value['activation_code'].'</td>
				<td class="center" >'.$phone['0'].'</span></td>
			</tr>'; }	?>
		
					</tbody>
	</table>
	
</form>
	
</div>
<br/>		
				<!-- End Content -->
		</div>