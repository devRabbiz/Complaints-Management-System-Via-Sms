  <div id="content">
   <?php

   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Add Machine</h3>


<form class="form-horizontal" action="<?php  echo base_url($list['Current_action']); ?>" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
    <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="firstname">Machine Code</label>
                    <div class="controls">
                    <input class="span12" id="machine_key" name="machine_key" type="text" value="" />
                    </div>
                </div>
               
            </div>
     </div>
                <div class="control-group">
                    <label class="control-label">Machine Warranty Start</label>
                    <div class="controls">
                        <input type="text" name="machine_warranty_start" id="datepicker" value="" />
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Machine Warranty End</label>
                    <div class="controls">
                        <input type="text" name="machine_warranty_end" id="datepickertwo" value="" />
                    </div>
                </div>
          
    
    
        <hr class="separator" />
        
        <div class="form-actions">
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
            <button type="button" onclick="history.go(-1);" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
        </div>
        
    </div>
    
</form>     
<?php  if (isset($list['row']) && $list['row']>0) { ?>
    <table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable">
        <thead>
            <tr>
                <th style="width: 1%;" class="center">No.</th>
                <th>Company</th>
                <th class="center">Customer</th>
                <th class="center" >Machine</th>
                <th class="center" >Start</th>
                <th class="center" >Expairy</th>
                <th class="center" >Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php 

            $a=0;
            foreach ($list['row'] as $key => $value) { 
                  $base_64_role = base64_encode($value['machine_id']);
                  $url_param = rtrim($base_64_role, '=');
             $phone = explode(",",$value['customer_phone']); 
             $address = substr($value['customer_address'], 0,120);  
            echo '
            <tr class="selectable" id="'.$value['machine_id'].'">
                <td class="center uniformjs">
                    '.$key.'
                </td>
                <td><strong>'.$value['customer_name_company'].'</strong></td>
                <td class="center">'.$value['customer_name'].'</td>
                <td class="center important">'.$value['machine_key'].'</td>
                <td class="center" >'.$value['machine_warranty_start'].'</td>
                <td class="center" >'.$value['machine_warranty_end'].'</span></td>
                <td class="center" style="width: 160px;">
                <a href="'.base_url().'machine/machine_edit/'.$url_param.'" class="btn-action glyphicons pencil btn-success"><i></i></a>'; ?>
                <a href="javascript: void(0);"  onclick="deleteRecord('<?php echo  $value['machine_id'];?>','<?php echo base_url()."machine/machine_delete/"; ?>')" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
                </td>
            </tr>
        <?php    }  ?>
        
                    </tbody>
    </table>
<?php } ?>
                <!-- End Content -->
        </div>
  