<div id="content">

	<?php
/*	echo "<pre>";
	print_r($list);
	exit(); */
	 ?>
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i>Compose Message For Technician </h3>
	
</div>

<div id="mess"></div>	
<div class="separator"></div>

<div class="innerLR">
	<form action="<?php base_url('compose/compose_for_technician'); ?>" method="post">

							
							<strong style="color: rgb(66, 124, 175) !important;" >Note  :  Maximum Lenght 150 Characters</strong>
					
	<div class="separator top form-inline small">
	
		  	<div class="pull-left list_box">
		  	
			<label class="strong">Type Message </label>
		<input type="text"  name="technician_message" id="technician_message" maxlength="150" class="span6" placeholder="Message for Technicain">

		
		<button type="submit"  class="compose_submit_top btn btn-icon btn-primary glyphicons circle_ok share"><i></i>Forward To Technician</button>
	</div> 
		<div class="clearfix"></div>
	</div>
		<table class="   table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-primary  ">
		<thead>
			<tr>
				<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
				<th style="width: 1%;" class="center">No.</th>
				
				
				<th class="center">Customer</th>
				<th class="center" >Email</th>
				<th class="center" >Phone</th>
				
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
				<td class="center uniformjs">
					<input type="checkbox"  name="technician_id[]"  value="'.$value['technician_id'].'|'.$value['technician_phone'].'" />
				</td>
				<td class="center">'.$key.'</td>
				<td class="center important">'.$value['technician_name'].'</td>
				<td class="center" >'.$value['technician_email'].'</td>
				<td class="center" >'.$phone['0'].'</td></tr>';
				 }	?>
		
					</tbody>
	</table>
	
	
	<div style="hight:400px; width:100%; "></div>
</form>
</div>
<br/>		
				<!-- End Content -->
		</div>