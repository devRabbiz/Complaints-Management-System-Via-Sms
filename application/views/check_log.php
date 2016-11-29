<div id="content">

	
<div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Log List</h3>
	<div class="buttons pull-right">
		<a href="<?php echo base_url(); ?>technician/technician_add" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add Technician</a>
	</div>
</div>

							

	<div id="mess"></div>
<div class="separator"></div>

<div class="innerLR">
		<table class="table table-bordered table-condensed table-striped table-vertical-center table-primary  checkboxs js-table-sortable  dynamicTable  table-primary  dataTable">
		<thead>
			<tr>
				<th style="width: 1%;" class="center">No.</th>
				
				
				<th class="center">Sender Number</th>
				<th class="center" >Message</th>
			
			</tr>
		</thead>
		<tbody>

			<?php 
			$a=0;
			foreach ($list['row'] as $key => $value) { 
				  
			echo '
			<tr class="selectable" id="'.$value['id'].'">
				<td class="center">'.$key.'</td>
				<td class="center important">'.$value['sender_number'].'</td>
				<td class="center" >'.$value['message'].'</td>';?>
			</tr>
			<?php  }	?>

			
		
			
		
			
					</tbody>
	</table>
	
	<div class="separator top form-inline small">

	<div class="pagination pull-right" style="margin: 0;">
		
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<br/>		
				<!-- End Content -->
		</div>