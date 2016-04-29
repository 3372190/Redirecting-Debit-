var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

var providerList = [];
var uId;
var providerNames = [];

$(document).ready(function(){
$('.nav-tabs li.disabled > a[data-toggle=tab]').on('click', function(e) {
    e.stopImmediatePropagation();
});
    
    
    $("#submit").click(submitAjaxForm);
        
        $("#cancel").click(function(){
           //cancel and go back to main profile page. 
            window.location = "page_profile.php"
            
        });
    $("#providerBack").click(function(){
        showTab("profile");
    });
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //show selected tab / active
        console.log ( $(e.target).attr('href') );
        var tab = $(e.target).attr('href');
        
        if(tab == "#passwordTab"){
            for(var i = 0 ; i <  providerNames.length; i ++){
                console.log(providerNames[i].toLowerCase())
                getProviderDetails(providerNames[i].toLowerCase());
            }
        }
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



function getProviderDetails(child){
    
    var serviceProvidersRef = firebaseRef.child("serviceprovider");
    
    
    serviceProvidersRef.once("value", function(snap){
        snap.forEach(function(childSnapshot){

            var key = childSnapshot.key();
            
            if(childSnapshot.val().name == child){
                var result = childSnapshot.val();
                console.log(result);
                
                 $('#serviceresult > tbody:last-child').append('<tr><td><img width="150px" height="150px" class="rounded-x" src="'+result.img+'" alt=""></td><td class="td-width"><h3><a href="#">'+result.name+'</a></h3><p>'+result.description+'</p></td><td><input type="checkbox" checked="" name="checkbox[]"></td></tr>');
                
            }

        });
    });
}

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

