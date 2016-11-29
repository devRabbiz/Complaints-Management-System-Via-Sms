 <div id="content">
<div class="separator"></div>
<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Upload Machine Codes</h3>

<form class="form-horizontal" action="<?=base_url()?>csv/machine_code_upload" enctype="multipart/form-data"  method="post" autocomplete="off">
    <div class="well" style="padding-bottom: 20px; margin: 0;">
        <div class="row-fluid">
             <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                 <div class="mws-form-message warning" style="margin-top: 20px;" >
                                            Sample File
                                            <a href="<?=base_url();?>/csv/sample_file.csv">
                            <span   style="float:right;  margin-right:20px;" rel="popover">Download </span>
                            </a>
                        </div>
                        </div>
            <div class="span10">
               
                    <div class="widget widget-4">
                        <div class="widget-head">
                            <h4 class="heading">Upload Machine Code</h4>
                        </div>
                        <div class="separator"></div>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input span3">
                                    <i class="icon-file fileupload-exists"></i> 
                                    <span class="fileupload-preview"></span>
                                </div><span class="btn btn-file">
                                <span class="fileupload-new">Select file</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="csv" /></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
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
            <!-- Edit form -->
<?php 
    if ($list['row'] >0) {
       // print_r($list['row']);
 ?>
<table cellpadding="20" width="100%" border="1" color="#0000" cellspacing="0">
    <thead>
        <tr>
            <?php
            $array_len =  count($list['row']);
            $a=0;
            foreach($list['row'][0] as $key1 => $value1 ) {
            ?><td style="width:220px;"><?php echo $key1; ?></td>
            <?php
            } ?>
        </tr>
    </thead>
    <tbody><?php
    $i=0;
    while($i < $array_len) { ?>
        <tr>
            <?php foreach ($list['row'][$i] as $key => $value) { ?>
            <td><?php echo  $value; ?></td>
                <?php } ?>
        </tr>
            <?php
            $i++; }  ?>     
    </tbody>
</table>
<?php
    } else {
        
    }
 ?>

                <!-- End Content -->
        </div>
