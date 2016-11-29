<div id="menu" class="hidden-phone">
			<div id="menuInner">
				<ul>
			
			<li class="hasSubmenu active "  >
				<a data-toggle="" style="background: #C2F4FD !important; font-weight: 700;" class="glyphicons main_nav show_thumbnails_with_lines" href="javascript: void(0);"><i></i><span>Complaint Box</span></a>
				<ul class="in " id="menu_forms" style="height: auto;">
					<li class=""><a class="glyphicons inbox_plus" href="<?php echo base_url(); ?>complaint/complaint_list"><i></i><span>Inbox</span></a></li>
				
				</ul>
			</li>
				<li class="hasSubmenu active "  >
						<a data-toggle="" style="background: #C2F4FD !important; font-weight: 700;" class="glyphicons main_nav show_thumbnails_with_lines" href="javascript: void(0);"><i></i><span>Send Message</span></a>
						<ul class="in " id="menu_forms" style="height: auto;">
						<li class=""><a class="glyphicons share" href="<?php echo base_url(); ?>complaint/complaint_forword"><i></i><span>Forward Complaint </span></a></li>
			<?php if(ADMIN_RIGHTS_SESSION == ADMIN_RIGHTS) { ?>	
						
						<li class=""><a class="glyphicons share" 
						href="<?php echo base_url(); ?>compose/compose_for_technician"><i></i><span>Compose For Technician</span></a></li>
						<li class=""><a class="glyphicons share" 
						href="<?php echo base_url(); ?>compose/compose_for_customer"><i></i><span>Compose For Customer</span></a></li>
						<li class=""><a class="glyphicons share" 
						href="<?php echo base_url(); ?>compose/compose_for_activation"><i></i><span>Send Activation Code</span></a></li>
					<?php } ?>		
							
						</ul>
					</li>
				

				
				<?php if(ADMIN_RIGHTS_SESSION == ADMIN_RIGHTS) { ?>	
					
					<li class="hasSubmenu active">
						<a data-toggle="" style="background: #C2F4FD !important; font-weight: 700;" class="glyphicons main_nav show_thumbnails_with_lines" href="javascript: void(0);"><i></i><span>Reporting</span></a>
						<ul class="in " id="menu_forms" style="height: auto;">
							<li class=""><a href="<?php echo base_url(); ?>report/customer_report" class="glyphicons stats"><i></i><span>Customer Reporting</span></a></li>
							<li class=""><a href="<?php echo base_url(); ?>report/technician_report" class="glyphicons charts"><i></i><span>Technician Reporting</span></a></li>
							<li class=""><a href="<?php echo base_url(); ?>report/complaint_report" class="glyphicons calendar"><i></i><span>Complaint Reporting</span></a></li>
							
						</ul>
					</li>
					
				<li class="hasSubmenu active">
						<a data-toggle="" style="background: #C2F4FD !important; font-weight: 700;" class="glyphicons main_nav show_thumbnails_with_lines" href="javascript: void(0);"><i></i><span>Oprational</span></a>
						<ul class="in " id="menu_forms" style="height: auto;">
					
						
					<li class=" " >
						<a class="glyphicons group" href="<?php echo base_url(); ?>customer/customer_list"><i></i><span>Customer</span></a>

					</li>
					<li class=" " >
						<a class="glyphicons group" href="<?php echo base_url(); ?>machine/machine_list"><i></i><span>Machine</span></a>

					</li>
					<li  class="" >
						<a class="glyphicons group" href="<?php echo base_url(); ?>technician/technician_list"><i></i><span>Technician</span></a>

					</li>
					<li class=" ">
						<a class="glyphicons embed_close" href="<?php echo base_url(); ?>complaint_code/complaint_code_list"><i></i><span>Complaint Code</span></a>
						
					</li>
					<li class=" ">
						<a class="glyphicons embed_close" href="<?php echo base_url(); ?>status_code/status_code_list"><i></i><span> Technician Status Code</span></a>
						
					</li>
							<li class=""><a class="glyphicons iphone_exchange" href="<?php echo base_url(); ?>service/check_insert_customer"><i></i><span>Add Manual Complaint</span></a></li>

							<li class=""><a class="glyphicons iphone_exchange" href="<?php echo base_url(); ?>service/check_insert_technician"><i></i><span>Update Manual Status</span></a></li>
							<li class=" " >
						<a class="glyphicons cloud-upload" href="<?php echo base_url(); ?>csv/machine_code_upload"><i></i><span>Upload Machine Codes</span></a>
						
					</li>
					</ul>
					</li>
					
					<li class="hasSubmenu active">
						<a data-toggle="" style="background: #C2F4FD !important; font-weight: 700;"  class="glyphicons main_nav show_thumbnails_with_lines" href="javascript: void(0);"><i></i><span>Configuration</span></a>
						<ul class="in " id="menu_forms" style="height: auto;">
							<li class=""><a class="glyphicons cogwheels" href="<?php echo base_url(); ?>app_setting/setting_list"><i></i><span>Application Setting</span></a></li>
							
						</ul>
					</li>
					<?php } ?>
					

					
				<ul>
					</ul>
					
			</div>
		</div>