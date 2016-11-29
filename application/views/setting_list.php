  <div id="content">
   <?php
  
   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Edit Customer</h3>


<form class="form-horizontal" action="<?=base_url('app_setting/setting_list'); ?>" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
    
    <div class="well" style="padding-bottom: 20px; margin: 0; text-transform: uppercase;">
    <div class="row-fluid">
        <div class="span6">
            <?php
            foreach ($list['row'] as $key => $value) {

               ?>
               <div class="control-group">
                    <label class="control-label" for="firstname"><?php echo str_replace("_", " ", $value['app_setting_key']); ?></label>
                    <div class="controls"><input class="span12"  name="<?php echo $value['app_setting_key']; ?>" type="text" value="<?php echo $value['app_setting_value']; ?>" /></div>
                </div>
               <?php 
            }
             ?>
        <hr class="separator" />
        
        <div class="form-actions">
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
            <button type="button" onclick="history.go(-1);" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
        </div>
        </div>
    
    
        
        
    </div>
    
</form>     
                <!-- End Content -->
        </div>
  