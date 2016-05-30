var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

var providerList = [];
var uId;
var providerNames = [];
var providerids = [];
var tabs = ["profile", "passwordTab", "settings"];

$(document).ready(function(){
    loadUserDetails();
    
    
    $('.nav-tabs li.disabled > a[data-toggle=tab]').on('click', function(e) {
        e.stopImmediatePropagation();
    });
    
    $("#selectproviders").click(selectProviders);
    $("#saveproviders").click(save);
    $("#submit").click(submitAjaxForm);
    $("#providerBack").click(cancel);
    
    $("#cancel").click(cancel);
    
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //show selected tab / active
        //console.log ( $(e.target).attr('href') );
        var tab = $(e.target).attr('href');
        
        if(tab == "#passwordTab"){
            for(var i = 0 ; i <  providerNames.length; i ++){
                getProviderDetails(providerNames[i].toLowerCase());
            }
        }else if(tab == "#settings"){
            for(var i = 0 ; i <  providerids.length; i ++){
                saveGetProviderDetails(providerids[i]);
            }
            
        }
    });
});

function selectProviders(){
    //get list of providers and display them on next tab
    
    $('input:checkbox[name="providerid"]').each(function () {
        if (this.checked) {
            providerids.push($(this).val());
        }
    });
    if(providerids.length >=1 ){
        showTab("settings");
    }else{
        document.getElementById("nomessage").innerHTML = "No provider selected";
        //messageDisplay("no providers selected");
    }
}

function save(){
    
    for(var i = 0 ; i < providerids.length; i ++){
        saveProvidersToUser(providerids[i])
    }
    //messageDisplay("updated");
   document.getElementById("upmessage").innerHTML = "updated <br> Redirecting you in 2 seconds";
    setTimeout(function () {
        window.location.href = "page_profile.php";
    }, 2000); //will call the function after 2 secs.
}

function saveProvidersToUser(id){
    
    usersRef = firebaseRef.child("users").child(uId).child("serviceproviders");
    pushRef =  usersRef.child(id);

    pushRef.set({
        notified: false,
        timestamp: Math.floor((new Date).getTime() / 1000),
        responded: false
    });
}

function cancel(){
    window.location = "page_profile.php";
}

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
}
function getProviderDetails(child){
    
    //this can be made cleaner
    
    var serviceProvidersRef = firebaseRef.child("serviceprovider");
    
    
    serviceProvidersRef.once("value", function(snap){
        snap.forEach(function(childSnapshot){

            var key = childSnapshot.key();
            
            if(childSnapshot.val().name == child){
                var result = childSnapshot.val();
                
                 $('#serviceresult > tbody:last-child').append('<tr><td><img width="150px" height="150px" class="rounded-x" src="'+result.img+'" alt=""></td><td class="td-width"><h3><a href="#">'+result.name+'</a></h3><p>'+result.description+'</p></td><td><input type="checkbox" checked="" name="providerid" value="'+ key+'"></td></tr>');
                
            }

        });
    });
}

function saveGetProviderDetails(id){
    var serviceProviderRef = firebaseRef.child("serviceprovider").child(id);
    
    
    serviceProviderRef.once("value", function(snap){
        
        var result = snap.val();
        
         $('#servicesave > tbody:last-child').append('<tr><td><img width="150px" height="150px" class="rounded-x" src="'+result.img+'" alt=""></td><td class="td-width"><h3><a href="#">'+result.name+'</a></h3><p>'+result.description+'</p></td></td></tr>');
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
		var bankNumber    	= $('#bankNumber option:selected').val();
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
                        
					}else{
                        
                        console.log(data);
                        providerNames = JSON.parse(data);
                        
                        if(providerNames['Type'] == "Error"){
                            messageDisplay(providerNames['Message']);
                        }else{
                            showTab('passwordTab');
                        }
					}		
				}
			 });
		  }
        return false;
}

