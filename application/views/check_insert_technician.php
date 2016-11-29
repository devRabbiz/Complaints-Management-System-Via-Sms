  <div id="content">
        
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i>Update Manual Complaint Status</h3>
<div class="separator"></div>

<form class="form-horizontal"  action="<?php echo base_url(); ?>service/insert/" style="margin-bottom: 0;" id="validateSubmitForm" method="post" >
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
       
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="firstname">Sender Phone</label>
                    <div class="controls"><input class="span12" id="status_code_title" name="sender_number" type="text" /></div>
                </div>
      </div>
        
        </div>
       <hr class="separator" />
    
        <div class="row-fluid uniformjs">
          <label > Message Pattern For Technician "T1 ComplaintId TechnicianStatusCode"</label>

            
                        
                        <textarea id="message" name="message"  style="width: 100%;" c rows="5"></textarea>
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
  