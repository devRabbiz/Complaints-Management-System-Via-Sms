  <div id="content">
   <?php
 //echo "<pre>";
 //print_r($list);
   ?>     
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> View Technician Report</h3>
<?php if(isset($list['row']['0']['technician_id']) && $list['row']['0']['technician_id']>0){ ?>
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
        
    
    

<div class="separator"></div>

<div class="innerLR">

    <table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable  dynamicTable  table-primary  dataTable ui-sortable ">
    <thead>
      <tr>
        <th style="width: 1%;" class="center">S.NO</th>
                <th style="width: 1%;" class="center">ID</th>
                <th>Company</th>
        <th class="center">Customer</th>
        <th class="center" >Complaint</th>
        <th class="center" >Status</th>

        <th class="center" >Complaint Create Time</th>
        <th class="center" >Complaint Forward Time</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    

$i = $this->uri->segment(3) + 0; 


  $a=0;
      foreach ($list['row'] as $key => $value) { 
        $i++;
      echo '
      <tr class="selectable" id="'.$value['customer_id'].'">
        <td class="center">'.$i.'</td>

        <td class="center">'.$value['customer_complaint_id'].'</td>
        <td><a href="#" title="'.$value['customer_phone'].'" ><strong>'.$value['customer_name_company'].'</strong></a></td>
        <td class="center important">'.$value['customer_name'].'</td>
        <td class="center" ><a href="#" title="'.$value['complaint_code_description'].'" ><span class="label label-block " style="background: '.$value['complaint_code_color'].'!important;">'.$value['complaint_code_title'].'</span></td>
        <td class="center" ><span class="label label-block " style="background: '.$value['status_code_color'].'!important;">'.$value['status_code_title'].'</span></td>
    
        <td class="center" >'.$value['customer_complaint_date_insert'].'</span></td>
        <td class="center" >'.$value['customer_complaint_date_update'].'</span></td></tr>';
       
  } ?>
    
          </tbody>
  </table>
  
  <div class="separator top form-inline small">
  
  <div class="pagination pull-right" style="margin: 0;">
      
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<br/> 

</div>
<?php } ?>
                <!-- End Content -->
        </div>
  