  <div id="content">
   <?php
//echo "<pre>";
//print_r($list);
   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Edit Customer</h3>


<form class="form-horizontal" action="<?=base_url()?>customer/customer_edit/<?php echo $list['current_encoded_id']; ?>" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
    <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="firstname">Company name</label>
                    <div class="controls"><input class="span12" id="customer_name_company" name="customer_name_company" type="text" value="<?php echo $list['row']['0']['customer_name_company'] ?>" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="firstname">Customer name</label>
                    <div class="controls"><input class="span12" id="customer_name" name="customer_name" type="text" value="<?php echo $list['row']['0']['customer_name'] ?>" /></div>
                </div>
               <div class="control-group">
                    <label class="control-label" for="lastname">Customer Primary Phone</label>
                    <div class="controls"><input class="span12" id="customer_primary_phone" name="customer_primary_phone" type="text" value="<?php echo $list['row']['0']['customer_primary_phone'] ?>" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="lastname">Customer Secondry Phone</label>
                    <div class="controls"><input class="span12" id="customer_phone" name="customer_phone" type="text" value="<?php echo $list['row']['0']['customer_phone'] ?>" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Customer Tag</label>
                    <div class="controls"><input class="span12" id="customer_tag" name="customer_tag" type="text" value="<?php echo $list['row']['0']['customer_tag'] ?>" /></div>
                </div> 
            </div>
            <div class="span6">
               
                <div class="control-group">
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls"><input class="span12" id="customer_email" name="customer_email" type="email" value="<?php echo $list['row']['0']['customer_email'] ?>" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Company Address</label>
                    <div class="controls"><input class="span12" id="emcustomer_addressail" name="customer_address" type="text" value="<?php echo $list['row']['0']['customer_address'] ?>" /></div>
                </div>
               
                
                <div class="control-group">
                    <label class="control-label" for="confirm_password">Company description</label>
                    <div class="controls"><textarea class="span12" id="customer_description" name="customer_description" ><?php echo $list['row']['0']['customer_description'] ?></textarea></div>
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
  