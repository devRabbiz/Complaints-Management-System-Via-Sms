<div id="content">

	<?php
/*	echo "<pre>";
	print_r($list);
	exit(); */
	 ?>
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Compose Message For Customer</h3>
	
</div>

<div id="mess"></div>	
<div class="separator"></div>

<div class="innerLR">
	<form action="<?php base_url('compose/compose_for_customer'); ?>" method="post">
	<strong style="color: rgb(66, 124, 175) !important;" >Note  :  Maximum Lenght 150 Characters</strong>
					
	<div class="separator top form-inline small">
		  	<div class="pull-left list_box">
		  			
			<label class="strong">Type Message </label>
		<input type="text" name="customer_message" id="customer_message" maxlength="150"  class="span6" placeholder="Message for Customer">
		<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" ></span>
		<select name="phone_type">
			<option value="1" >Both Number</option>
			<option value="2" >Primary User</option>
			<option  value="3" >Normal User</option>


		</select>
		<button type="submit"  class="compose_submit_top btn btn-icon btn-primary glyphicons circle_ok share"><i></i>Forward To Customer</button>
	</div> 
		<div class="clearfix"></div>
	</div>
		<table class="	table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable  table-primary ">
		<thead>
			<tr>
				<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
				<th style="width: 1%;" class="center">No.</th>
				<th>Company</th>
				
				<th class="center">Customer</th>
				<th class="center" >Address</th>
				<th class="center" >Phone</th>
				
			</tr>
		</thead>
		<tbody>

			<?php 
			$a=0;
			$customer_entity = array();
			foreach ($list['row'] as $key => $value) { 
				  $base_64_role = base64_encode($value['customer_id']);
                  $url_param = rtrim($base_64_role, '=');
             $phone = explode(",",$value['customer_phone']); 
             $address = substr($value['customer_address'], 0,120);  
             $customer_entity['customer_id'] = $value['customer_id'];
             $customer_entity['customer_primary_phone'] = $value['customer_primary_phone'];
             $customer_entity['customer_phone'] = $value['customer_phone'];
             $customer_entity['customer_email'] = $value['customer_email'];
             $customer_entity['customer_id'] = $value['customer_id'];
             $a++;

			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
				<td class="center uniformjs">
					<input type="checkbox"  name="customer_id[]"  value='.json_encode($customer_entity).' />
				</td>
				<td class="center">'.$key.'</td>
				<td><a href="'.base_url().'customer/customer_view/'.$url_param.'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
				<td class="center important">'.$value['customer_name'].'</td>
				<td class="center" >'.$address.'</td>
				<td class="center" >'.$phone['0'].'</span></td>
			</tr>'; }	?>
		
					</tbody>
	</table>
	
</form>
	
</div>
<br/>		
				<!-- End Content -->
		</div>