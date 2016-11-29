<?php
//echo "<pre>";
//print_r($list);
//exit();
 ?>
<div id="content">

	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Customer Complaint Report</h3>
	
</div>

							
<div id="mess"></div>	
<div class="separator"></div>
<div class="innerLR">

		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable  dynamicTable  table-primary  dataTable">
		<thead>
			<tr>
				<th style="width: 1%;" class="center"> S.NO</th>
                <th style="width: 1%;" class="center"> ID</th>
				<th>Company</th>
				
				<th class="center">Customer</th>
				<th class="center" >Complaint</th>
				<th class="center" >Status</th>
				<th class="center" >Technician</th>
				<th class="center" >Machine Code</th>
				<th class="center" >Phone</th>
				<th class="center" >Tag</th>
				<th class="center" >Warranty</th>
				<th class="center" >Address</th>
				<th class="center" >Complaint Create Time</th>
				<th class="center" >Complaint Forward Time</th>
			</tr>
		</thead>
		<tbody>

		<?php 
		$i = $this->uri->segment(3) + 0; 
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				$i++;
					 $base_64_role = base64_encode($value['customer_complaint_id']);
                  $url_param = rtrim($base_64_role, '=');
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
				<td class="center">'.$i.'</td>
				<td class="center">'.$value['customer_complaint_id'].'</td>
				<td><a href="'.base_url().'report/complaint_detail_report/'.$url_param.'" title="'.$value['customer_complaint_remarks'].'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
				<td class="center important">'.$value['customer_name'].'</td>

				<td class="center" ><a href="#" title="'.$value['complaint_code_description'].'" ><span class="label label-block " style="background: '.$value['complaint_code_color'].'!important;">'.$value['complaint_code_title'].'</span></td>

				<td class="center" ><span class="label label-block " style="background: '.$value['status_code_color'].'!important;">'.$value['status_code_title'].'</span></td>
				<td class="center important">'.$value['technician_name'].'</td>
				<td class="center important">'.$value['customer_machine_code'].'</td>
				<td class="center important">'.$value['customer_phone'].'</td>
				<td class="center important">'.$value['customer_tag'].'</td>
				<td class="center" >'.$value['machine_warranty_start']. " To " .$value['machine_warranty_end'].'</span></td>
				<td class="center important">'.$value['customer_address'].'</td>
				<td class="center" >'.$value['customer_complaint_date_insert'].'</span></td>
				<td class="center" >'.$value['customer_complaint_date_update'].'</span></td></tr>';
			 
	}	?>
		
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
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<br/>		
				<!-- End Content -->
		</div>