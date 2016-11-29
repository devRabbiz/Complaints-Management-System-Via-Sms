
    
    function deleteRecord(id,url)
    {
        var confirmDelete = confirm("Are you sure you want to delete this Record ?");
        
        if (confirmDelete == true)
        {       
                    var container = $("#"+id);
                    
                    var postData = {'id': id };

                    $.ajax({
                        type: "POST",
                        url: url, //ajaxUrl,
                        data: postData,
                        cache: false,
                        dataType: 'text',
                        //contentType: "application/json; charset=utf-8",
                        success: function(response){
                            
                            if (response)
                            {
                                //alert(response);
                                container.hide('slow');
                            $("#mess").children('.success').hide('slow').remove();

                            $("#mess").append(' <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Record deleted successfully.</div>').html().show('slow');
                                //$("#message").children('.ui').remove();
                                //$("#message").append('<span class="ui" >'+response+'</span>').html();
                                //$("#ValidEmail").val("");
                            }else{ 
                               // alert(response);
                            // $("#message").children('.ui').remove();
                           //  alert('not');
                               $("#mess").append('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>An error occurred while deleteting the record. Please try Again.</div>').html();
                             }
                        }   
                    })
        }
        else
        {
            // alert("You pressed Cancel!")
        }
    }