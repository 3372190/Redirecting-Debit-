var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

var providerList;
var uId;

$(document).ready(function(){
    
    
                      
                      
        
        /*$("form#data").submit(function() { 
		//get input field values
		var fileToUpload    = $('#fileToUpload').val(); 
		var bankNumber    	= $('#bankNumber option:selected').val()
		var flag = true;
        console.log(bankNumber);
        console.log(fileToUpload);
		/********validate all our form fields***********/
		/* Name field validation  
        if(bankNumber == 0){ 
            $('#bankNumber').css('border-color','red'); 
            flag = false;
        }
        if(fileToUpload == null){
            $('#fileToUpload').css('border-color', 'red');
            flag = false;
        }
        
        //use this to pass form providers and something similar for uId;
        var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "mydata").val("bla");
        $('#form1').append($(input));
		/********Validation end here ****/
		/* If all are ok then we send ajax request to email_send.php *******
		if(flag) {
            var formData = new FormData($(this)[0]);
			$.ajax({
				type: 'post',
				url: "inc/formprocess.php",
                processData: false,
				data: formData,
				beforeSend: function() {
					$('#submit').attr('disabled', true);
					$('#submit').after('<span class="wait">&nbsp;<img width="150px" height="150px" src="assets/img/loading.gif" alt="" /></span>');
				},
				complete: function() {
					$('#submit').attr('disabled', false);
					$('.wait').remove();
				},	
				success: function(data)
				{
					if(data.type == 'error')
					{
						output = '<div class="error">'+data.text+'</div>';
                        console.log(data.text);
					}else{
                        console.log(JSON.parse(data.text));
						output = '<div class="success">'+data.text+'</div>';
						$('input[type=text]').val(''); 
						$('#contactform textarea').val(''); 
					}
					
					$("#result").hide().html(output).slideDown();			
				}
			 });
		  }
        return false;
	   });*/
        
        $("#cancel").click(function(){
           //cancel and go back to main profile page. 
            window.location = "page_profile.php"
            
        });       
                      
    });
        
    //next button will continue
    
    
    
});


function getUserId(){
    
    
    
    
}

function getProviderList(){
    
    
}

