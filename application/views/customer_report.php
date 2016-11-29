<div id="content">

<div id="mess"></div>	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Customer Report</h3>
	
</div>
<div class="innerLR">
		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable  dynamicTable  table-primary  dataTable" >
		<thead>
			<tr>
				<th style="width: 1%;" class="center">S.NO</th>
                <th style="width: 1%;" class="center">ID</th>
				<th>Company</th>
				
				<th class="center">Customer</th>
				<th class="center" >Address</th>
				<th class="center" >Email</th>
				<th class="center" >Tags</th>
				<th class="center" >Phone</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$i = $this->uri->segment(3) + 0;
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				$i++;
				  $base_64_role = base64_encode($value['customer_id']);
                  $url_param = rtrim($base_64_role, '=');
             $phone = explode(",",$value['customer_phone']); 
             $address = substr($value['customer_address'], 0,120);  
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
			    <td class="center">'.$i.'</td>
				<td class="center">'.$value['customer_id'].'</td>
				<td><a href="'.base_url().'customer/customer_view/'.$url_param.'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
				<td class="center important">'.$value['customer_name'].'</td>
				<td class="center" >'.$address.'</td>
				<td class="center" >'.$value['customer_email'].'</td>
				<td class="center" >'.$value['customer_tag'].'</td>
				<td class="center" >'.$phone['0'].'</span></td>'; ?>
			
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