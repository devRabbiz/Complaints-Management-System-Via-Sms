<div id="content">
	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Technician Report</h3>
	
</div>

<div id="mess"></div>
<div class="separator"></div>

<div class="innerLR">
		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable dynamicTable  table-primary  dataTable">
		<thead>
			<tr>
			<th style="width: 1%;" class="center"> S.No</th>
			<th style="width: 1%;" class="center"> Id</th>
				<th class="center">Technician</th>
				<th class="center" >Email</th>
				<th class="center" >Department</th>
				<th class="center" >Tag</th>
			
				<th class="center" >Phone</th>
			

			</tr>
		</thead>
		<tbody>

			<?php 
			$i = $this->uri->segment(3) + 0; 
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				$i++;
				  $base_64_role = base64_encode($value['technician_id']);
                  $url_param = rtrim($base_64_role, '=');
                   $phone = explode(",",$value['technician_phone']);
			echo '
			<tr class="selectable" id="'.$value['technician_id'].'">
				<td class="center">'.$i.'</td>
				<td class="center">'.$value['technician_id'].'</td>
				<td class="center important" ><a href="'.base_url().'report/technician_detail_report/'.$url_param.'" ><strong>'.$value['technician_name'].'</strong></a></td>
				
				<td class="center" >'.$value['technician_email'].'</td>
				<td class="center" >'.$value['technician_department'].'</td>
				<td class="center" >'.$value['technician_tag'].'</td>
				
			
				<td class="center" >'.$phone['0'].'</td>'; ?>
			</tr>
			<?php  }	?>
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