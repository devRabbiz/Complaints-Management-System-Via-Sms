  <div id="content">
   <?php
//echo "<pre>";
//print_r($list);
   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Complaint history</h3>
<?php if(isset($list['row']['0']) && $list['row']['0'] > 0){ ?>
<table class="table table-bordered table-fill">
            <thead>
                <tr>
                    <th class="shortRight">Company name</th>
                    <th><?php echo $list['row']['0']['customer_name_company'] ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="shortRight">Complaint id</td>
                    <td>
                                 
                      <?php echo $list['row']['0']['customer_complaint_id'] ?>
                    </td>
                </tr>
                 <tr>
                    <td class="shortRight">Complaint Create Time</td>
                    <td>
                                 
                      <?php echo $list['row']['0']['customer_complaint_date_insert'] ?>
                    </td>
                </tr>
                   <tr>
                    <td class="shortRight">Complaint Forword Time</td>
                    <td>
                                 
                      <?php echo $list['row']['0']['customer_complaint_date_update'] ?>
                    </td>
                </tr>
                
                                <tr>
                    <td class="shortRight">Customer name</td>
                    <td>
                      <?php echo $list['row']['0']['customer_name'] ?>
                    </td>
                </tr>
                
                
 
                <tr>
                    <td class="shortRight">Customer Primary Phone</td>
                    <td>
                       <?php echo $list['row']['0']['customer_primary_phone'] ?>
                    </td>
                </tr>
                                <tr>
                    <td class="shortRight">Customer Phone</td>
                    <td>
                       <?php echo $list['row']['0']['customer_phone'] ?>
                    </td>
                </tr>

                <tr>
                    <td class="shortRight">Customer Tag</td>
                    <td>
                      <?php echo $list['row']['0']['customer_tag'] ?>
                    </td>
                </tr>
                <tr>
 <td class="shortRight">Customer Machine</td>
   <td>


                  
                      <?php echo "Machine No. :".$list['row']['0']['machine_key']."<br> Date Start :".$list['row']['0']['machine_warranty_start']."<br> Date End :".$list['row']['0']['machine_warranty_end']."<br>"; ?>
                 

       </td>
</tr> 

                   
                <tr>
                    <td class="shortRight">E-mail</td>
                    <td>
                      <?php echo $list['row']['0']['customer_email'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Company Address</td>
                    <td>
                        <?php echo $list['row']['0']['customer_address'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Company description</td>
                    <td>
                       <?php echo $list['row']['0']['customer_description'] ?>
                    </td>
                </tr>
            </tbody>
        </table>

    <div class="separator"></div>
<div class="heading-buttons">
	<h3 class="glyphicons sort"><i></i> Technician Status</h3>
	
</div>


<div id="mess"></div>	
<div class="separator"></div>
<div class="innerLR">

		<table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-primary  ">
		<thead>
			<tr>
				<th style="width: 1%;" class="center">S.NO</th>
				<th  class="center">Technician Name</th>
           

				
				<th class="center" >Complaint</th>
				<th class="center" >Status</th>
			
			
				<th class="center" >Time</th>
			</tr>
		</thead>
		<tbody>

		<?php 
		

$i = $this->uri->segment(3) + 0; 
 //echo "<pre>";
 //print_r($list);
 //exit();
	$a=0;
			foreach ($list['row'] as $key => $value) { 
				$i++;
				 $base_64_role = base64_encode($value['customer_complaint_id']);
                  $url_param = rtrim($base_64_role, '=');
			echo '
			<tr class="selectable" id="'.$value['customer_id'].'">
				<td class="center">'.$i.'</td>

<td class="center" >'.$value['technician_name'].'</span></td>
				
				<td class="center" ><a href="#" title="'.$value['complaint_code_description'].'" ><span class="label label-block " style="background: '.$value['complaint_code_color'].'!important;">'.$value['complaint_code_title'].'</span></td>
				<td class="center" ><span class="label label-block " style="background: '.$value['status_code_color'].'!important;">'.$value['status_code_title'].'</span></td>
			
			
				<td class="center" >'.$value['forward_complaint_date_insert'].'</span></td></tr>';
			 
	}	?>
		
					</tbody>
	</table>
	
	<div class="separator top form-inline small">
	
	<div class="pagination pull-right" style="margin: 0;">
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php } ?>
<br/>	
    
        <hr class="separator" />
        
        <div class="form-actions">
            <button type="button" onclick="history.go(-1);" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Back</button>
        </div>
        
    </div>
    

                <!-- End Content -->
        </div>