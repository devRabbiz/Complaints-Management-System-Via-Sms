  <div id="content">
        
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Edit Machine</h3>
<?php
       

 ?>

<form class="form-horizontal" action="<?=base_url()?>machine/machine_edit/<?php  echo $list['current_encoded_id']; ?>" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
 
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
    <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="firstname">Machine Code</label>
                    <div class="controls">
                    <input class="span12" id="machine_key" name="machine_key" type="text" value="<?php echo $list['row']['0']['machine_key'] ?>" />
                    </div>
                </div>
               
            </div>
     </div>
                <div class="control-group">
                    <label class="control-label">Machine Warranty Start</label>
                    <div class="controls">
                        <input type="text" id="datepicker" name="machine_warranty_start"  value="<?php echo $list['row']['0']['machine_warranty_start'] ?>" />
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Machine Warranty End</label>
                    <div class="controls">
                        <input type="text" id="datepickertwo" name="machine_warranty_end" value="<?php echo $list['row']['0']['machine_warranty_end'] ?>" />
                    </div>
                </div>
          
    
    
        <hr class="separator" />
        
        <div class="form-actions">
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
            <button type="button" onclick="history.go(-1);" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
        </div>
        
    </div>
    
</form>        
                <!-- End Content -->
        </div>
  