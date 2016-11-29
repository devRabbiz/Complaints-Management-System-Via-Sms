  <div id="content">
        
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Status Code Add</h3>
<div class="separator"></div>

<form class="form-horizontal"  action="<?php echo base_url(); ?>status_code/status_code_add/" style="margin-bottom: 0;" id="validateSubmitForm" method="post" autocomplete="off">
    
    <div class="well" style="padding-bottom: 20px; margin: 0;">
       
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="firstname"> Short Code Title</label>
                    <div class="controls"><input class="span12" id="status_code_title" name="status_code_title" type="text" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="lastname"> Short Code</label>
                    <div class="controls"><input class="span12" id="status_code" name="status_code" type="text" /></div>
                </div>

               
               
            </div>
            <div class="span6">

                <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Color </h4>
        </div>
        <div class="widget-body">
            
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Color picker</label>
                    <div class="controls">
                        <input type="text"  name="status_code_color" id="colorpickerColor" value="#D15353" /><br/><br/>
                        <div id="colorpicker"></div>
                    </div>
                </div>
              
             
            </div>
                    
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
  