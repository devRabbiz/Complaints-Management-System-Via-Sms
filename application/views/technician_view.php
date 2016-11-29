  <div id="content">
   <?php
//echo "<pre>";
//print_r($list);
   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> View Technician</h3>
<table class="table table-bordered table-fill">
            
            <tbody>
                 <tr>
                    <td class="shortRight">Technician id</td>
                    <td>
                      <?php echo $list['row']['0']['technician_id'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Technician name</td>
                    <td>
                      <?php echo $list['row']['0']['technician_name'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Technician Phone</td>
                    <td>
                       <?php echo $list['row']['0']['technician_phone'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Technician Tag</td>
                    <td>
                      <?php echo $list['row']['0']['technician_tag'] ?>
                    </td>
                </tr>
 
                   
                <tr>
                    <td class="shortRight">E-mail</td>
                    <td>
                      <?php echo $list['row']['0']['technician_email'] ?>
                    </td>
                </tr>
             
                <tr>
                    <td class="shortRight">Department</td>
                    <td>
                       <?php echo $list['row']['0']['technician_department'] ?>
                    </td>
                </tr>
                 <tr>
                    <td class="shortRight">Technician Date Create</td>
                    <td>
                       <?php echo $list['row']['0']['technician_date_insert'] ?>
                    </td>
                </tr>
            </tbody>
        </table>

    
    
        <hr class="separator" />
        
        <div class="form-actions">
            <button type="button" onclick="history.go(-1);" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Back</button>
        </div>
        
    </div>
    

                <!-- End Content -->
        </div>
  