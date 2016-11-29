  <div id="content">
        <?php 
        
       // echo "<pre>";
       // print_r($list);
        
        ?>
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Add Complaint Remarks</h3>
<div class="separator"></div>

<form class="form-horizontal" action="<?php echo base_url(); ?>complaint/complaint_remark/<?php echo $list['current_encoded_id']; ?>" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
       
      
        
    
        <div class="row-fluid uniformjs">
         
            
                        
                        <textarea id="complaint_code_description" name="customer_complaint_remarks"  style="width: 100%;" c rows="5"><?php echo $list['row']['0']['customer_complaint_remarks'] ?></textarea>
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
  