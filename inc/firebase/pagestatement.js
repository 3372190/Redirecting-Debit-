var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

var providerList = [];
var uId;
var providerNames = [];

$(document).ready(function(){
    
    
    $("#submit").click(submitAjaxForm);
        
        $("#cancel").click(function(){
           //cancel and go back to main profile page. 
            window.location = "page_profile.php"
            
        });
    $("providerBack").click(function(){
        showTab("profile");
    });
                      
});

function getUserId(){
    var auth = firebaseRef.getAuth();
    
    if(auth){
        uId = auth.uid;
        return true;
    }else{
        return false;
    }
}

function showTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function getProviderList(){
    
    var serviceProvidersRef = firebaseRef.child("serviceprovider");

        serviceProvidersRef.once("value", function(snap){
            snap.forEach(function(childSnapshot){

                var key = childSnapshot.key();

                var data = childSnapshot.val().name;
                providerList.push(data)

            });
    }); 
}

function submitAjaxForm(){
    	//get input field values
		var fileToUpload    = $('#fileToUpload').val(); 
		var bankNumber    	= $('#bankNumber option:selected').val()
		var flag = true;

		/********validate all our form fields***********/
		//Name field validation  
        if(bankNumber == 0){ 
            $('#bankNumber').css('border-color','red'); 
            flag = false;
        }
        if(fileToUpload == null){
            $('#fileToUpload').css('border-color', 'red');
            flag = false;
        }
        //Create Form Data
        var formData = new FormData($('#fileprocess')[0]);
        //this gets all the providers from the prepopulated firebase list.
    
        formData.append("providerList", JSON.stringify(providerList));
        formData.append("uid", uId);
        //console.log(bankNumber);
        //console.log(fileToUpload);
        //console.log(formData);
        
		/********Validation end here ****/
		// If all are ok then we send ajax request to formprocess.php *******
		if(flag) {
            
            
			$.ajax({
				type: 'post',
				url: "inc/formprocess.php",
				data:  formData,
                cache: false,
                contentType: false,
                processData: false,
                
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
                        
                        providerNames = JSON.parse(data);
                        console.log(providerNames);
                        showTab('passwordTab');
                        $("#submit").after(data);
						output = '<div class="success">'+data+'</div>';
					}
					
					$("#result").hide().html(output).slideDown();			
				}
			 });
		  }
        return false;
}

