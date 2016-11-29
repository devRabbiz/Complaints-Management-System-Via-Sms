 <link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/form_validation/jquery.validate.css" />
       
       <!-- <script src="<?=base_url();?>/assets/form_validation/jquery-1.3.2.js" type="text/javascript">
        </script> -->
        <script src="<?=base_url();?>/assets/form_validation/jquery.validate.js" type="text/javascript">
        </script>
        <script src="<?=base_url();?>/assets/form_validation/jquery.validation.functions.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                
    // ===========================  customer form validation  ============================
                jQuery("#customer_name_company").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Company Name"
                });
                jQuery("#customer_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Customer Name"
                });
                jQuery("#customer_tag").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Customer Tag"
                });
                 jQuery("#customer_phone").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Phone Numbers"
                });
                jQuery("#customer_machine").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the  Machine Numbers"
                });
                jQuery("#customer_email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
                jQuery("#customer_address").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Customer Address"
                });
                jQuery("#customer_description").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Customer Description"
                });
                
    // ===========================  customer form validation  ============================
    // ===========================  technician form validation  ============================
              
                jQuery("#technician_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Technician Name"
                });
                jQuery("#technician_tag").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Technician Tag"
                });
                 jQuery("#technician_phone").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Phone Numbers"
                });
                jQuery("#technician_email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
               
    // ===========================  technician form validation  ============================
    // ===========================  complaint_code form validation  ============================
              
                jQuery("#complaint_code_title").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Title"
                });
                jQuery("#complaint_code").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Short Code"
                });
                 jQuery("#complaint_code_description").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Complaint Code Description"
                });
                
    // ===========================  complaint_code form validation  ============================
     // ===========================  status_code form validation  ============================
              
                jQuery("#status_code_title").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Title"
                });
                jQuery("#status_code").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Short Code"
                });
    // ===========================  status_code form validation  ============================
    // ===========================  Compose for activation form validation  ============================
                jQuery("#customer_activation_code").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Customer Activation Code"
                });
    // ===========================  Compose for activation form validation  ============================
    // ===========================  Compose for Massage for Customer form validation  ============================
                 jQuery("#customer_message").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Customer Message"
                });
    // ===========================  Compose for Massage for Customer form validation  ============================
    // ===========================  Compose for Massage for Technician form validation  ============================
                 jQuery("#technician_message").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Technician Message"
                });
    // ===========================  Compose for Massage for Technician form validation  ============================
    // ===========================  forword Complaint To Technician form validation  ============================
                jQuery("#technician_id").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a Select Technician"
                });
    // ===========================  forword Complaint To Technician form validation  ============================
    // ===========================  machine form validation  ============================
    // ===========================  machine form validation  ============================
             jQuery("#send_activatio1n_code").validate({
                    expression: "if (isChecked(SelfID)) return true; else return false;",
                    message: "Please check atleast one checked "
                });

    // ===========================  machine form validation  ============================
    

                jQuery("#machine_key").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Machine Key"
                });
                jQuery("#datepicker").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter a valid Date"
                });
                jQuery("#datepickertwo").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter a valid Date"
                });
                
               
    // ===========================  machine form validation  ============================
                
                  
                 jQuery("#ValidFile").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required file"
                });
                jQuery("#ValidField1").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                 jQuery("#oldpassword").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#ValidField2").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                 jQuery("#ValidField3").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                 jQuery("#NrcStart").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                  jQuery("#NrcExpiry").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                  
                jQuery("#studentAddress").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                 jQuery("#studentCity").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });

                  jQuery("#ValidGuardianAddress").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                 jQuery("#ValidGuardianCity").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });

                jQuery("#ValidField4").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#ValidPreSchool").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                 jQuery("#ValidPreSchooladdress").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                  jQuery("#ValidPreSchoolclass").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                    jQuery("#ValidPreSchoolgrade").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                    jQuery("#ValidPreSchoolcommint").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                    jQuery("#ValidGuardianProfession").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });

                    jQuery("#ValidOrganization").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                }); 
                        
                    
                  
                
                jQuery("#ValidNumber").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                 jQuery("#ValidNumberCnic").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                 
                 jQuery("#ValidOfficePhoneNumber").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                jQuery("#ValidstudentPhone").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });

                
                jQuery("#PostalCode").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                 jQuery("#ValidNumber2").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                 jQuery("#ValidGrNumber").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                  jQuery("#ValidNfcNumber").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid number"
                });
                 
                 
                jQuery("#ValidInteger").validate({
                    expression: "if (VAL.match(/^[0-9]*$/) && VAL) return true; else return false;",
                    message: "Please enter a valid integer"
                });
                jQuery("#ValidDate").validate({
                    expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
                    message: "Please enter a valid Date"
                });
                 jQuery("#oldpin").validate({
                    expression: "if (VAL.length == 4 && VAL) return true; else return false;",
                    message: "Please enter of 4 characters in length"
                });
                
                jQuery("#ConfirmPin").validate({
                    expression: "if (VAL.length == 4 && VAL && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please enter of 4 characters in length"
                });
                jQuery("#ConfirmMobilePin").validate({
                    expression: "if ((VAL == jQuery('#ConfirmPin').val()) && VAL) return true; else return false;",
                    message: "Confirm password field doesn't match the password field"
                });
                  jQuery("#ValidPassword").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Please enter minimum of 6 characters in length"
                });
                jQuery("#ValidConfirmPassword").validate({
                    expression: "if ((VAL == jQuery('#ValidPassword').val()) && VAL) return true; else return false;",
                    message: "Confirm password field doesn't match the password field"
                });
                jQuery("#ValidSelection").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                  jQuery("#campus_list").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                    jQuery("#school_section_list").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                  jQuery("#school_class_list").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
                    
                jQuery("#ValidMultiSelection").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please make a selection"
                });

                jQuery("#studentHouse").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please make a selection"
                });
                jQuery("#selectClass").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please make a selection"
                });
                jQuery("#ValidRadio").validate({
                    expression: "if (isChecked(SelfID)) return true; else return false;",
                    message: "Please select a radio button"
                });
                jQuery("#ValidCheckbox").validate({
                    expression: "if (isChecked(SelfID)) return true; else return false;",
                    message: "Please check atleast one checkbox"
                });
				jQuery('.AdvancedForm').validated(function(){
					alert("Use this call to make AJAX submissions.");
				});
            });
            /* ]]> */
        </script>