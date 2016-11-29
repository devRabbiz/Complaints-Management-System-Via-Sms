  <div id="content">
   <?php
//echo "<pre>";
//print_r($list);
   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> View Customer</h3>
<table class="table table-bordered table-fill">
            <thead>
                <tr>
                    <th class="shortRight">Company name</th>
                    <th><?php echo $list['row']['0']['customer_name_company'] ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="shortRight">Customer name</td>
                    <td>
                      <?php echo $list['row']['0']['customer_name'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Customer Primary Phone</td>
                    <td>
                       <?php echo $list['row']['0']['customer_primary_phone'] ?>
                    </td>
                </tr>
                                <tr>
                    <td class="shortRight">Customer Phone</td>
                    <td>
                       <?php echo $list['row']['0']['customer_phone'] ?>
                    </td>
                </tr>

                <tr>
                    <td class="shortRight">Customer Tag</td>
                    <td>
                      <?php echo $list['row']['0']['customer_tag'] ?>
                    </td>
                </tr>
                <tr>
 <td class="shortRight">Customer Machine</td>
   <td>
<?php


foreach ($list['customer_machine'] as $key => $value) {
    ?>

                  
                      <?php echo "Machine No. :".$value['machine_key']."<br> Date Start :".$value['machine_warranty_start']."<br> Date End :".$value['machine_warranty_end']."<br>"; ?>
                 
                
    <?php } ?>
       </td>
</tr> 

                   
                <tr>
                    <td class="shortRight">E-mail</td>
                    <td>
                      <?php echo $list['row']['0']['customer_email'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Company Address</td>
                    <td>
                        <?php echo $list['row']['0']['customer_address'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="shortRight">Company description</td>
                    <td>
                       <?php echo $list['row']['0']['customer_description'] ?>
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
  