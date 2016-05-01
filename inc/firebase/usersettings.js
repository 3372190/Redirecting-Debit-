var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

$(document).ready(function() {
    
    loadUserDetails();
    
    $("#updatePassword").click(changeUserPassword);
    $("#updatepp").click(changeUserPicture);
});


function changeUserPassword(){
    var flag = true; 
    var e, op, np;
    
    var elements = document.getElementsByTagName("input");
    
    for(var i = 0; i < elements.length; i ++){
        listElement = elements[i];
        var checkElement;
        formInputName = listElement.getAttribute("name");
        
        
        switch(formInputName){
            case "oldPassword":
                
                if(checkFieldLength(listElement)){
                    
                }
                break;
            case "emailAddress":
                
                if(checkFieldLength(listElement)){
                    if(validateEmail(listElement.value)){
                        e = listElement.value;
                    }else{
                        flag = false;
                        listElement.style.borderColor = 'red';
                        message = "Email fields are not valid emails";
                        break;
                    }
                }
                
                
                

                break;
            case "password":
                
                //if the form input attribute name is password.
                checkElement  = searchForElement(elements, "confirmPassword");
                
            case "confirmPassword":
                checkElement = searchForElement(elements, "password");
                
                if(checkFieldLength(listElement) && checkFieldLength(checkElement)){
                    if(!checkFieldsMatch(listElement, checkElement)){
                        listElement.style.borderColor = 'red';
                        checkElement.style.borderColor = 'red';
                        message = formInputName + checkElement.getAttribute("name") + " Fields Must Match";
                        flag = false;
                        break;
                    }else{
                        np = listElement.value;
                    }   
                }else{
                    listElement.style.borderColor = 'red';
                    checkElement.style.borderColor = 'red';
                    message = formInputName + checkElement.getAttribute("name") + " Fields must not be empty";
                    flag = false;
                    break;
                }
                
                break;
        }
    }
    
    if(flag){
        
        firebaseRef.changePassword({
          email: e,
          oldPassword: op,
          newPassword: np
        }, function(error) {
          if (error) {
            switch (error.code) {
              case "INVALID_PASSWORD":
                console.log("The specified user account password is incorrect.");
                break;
              case "INVALID_USER":
                console.log("The specified user account does not exist.");
                break;
              default:
                console.log("Error changing password:", error);
            }
          } else {
            console.log("User password changed successfully!");
          }
        });
        
    }else{
        
        
    }
    

    
    document.getElementById("message").innerHTML = message;
    return false;
}

function changeUserPicture(){
    
        
        //gather the form and post it to profileupload
        var formData = new FormData($('#fileprocess')[0]);
		/********Validation end here ****/
		// If all are ok then we send ajax request to formprocess.php *******
		if(flag) {
            
            
			$.ajax({
				type: 'post',
				url: "inc/profileupload.php",
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
                        $("#submit").after(data);
					}		
				}
			 });
		  }
        return false;
    
    
    
}
                  
                  
function loadUserDetails(){
    
    var isLocalSupported = checkLocalStorageSupport;
    
    //check if local storage exists
    if(isLocalSupported){
        
        
        if(localStorage.getItem("userDetails") != null){
            //console.log(localStorage.getItem('userdetails'));
            var userDetails = JSON.parse(localStorage.getItem("userDetails"));
            for (var property in userDetails) {
            if (userDetails.hasOwnProperty(property)) {
                $("#"+ property+"").replaceWith(userDetails[property]);
            }
}
            
            
        }else{
            var authData = firebaseRef.getAuth();
            var usersRef = firebaseRef.child("users").child(authData.uid);

            usersRef.once("value", function(snap){

                //because the data doesnt exist in local storage and it is supported, add it to local storage
                var object = snap.val();
                localStorage.setItem('userDetails', JSON.stringify(object));
                
                snap.forEach(function(childSnapshot){

                    var key = childSnapshot.key();

                    var data = childSnapshot.val();

                    $("#"+key+"").replaceWith(data);

                });
            });
            
        }
    }else{
        var authData = firebaseRef.getAuth();
        var usersRef = firebaseRef.child("users").child(authData.uid);
        
        
        //because local storage is not supported load the data dynamically, this method creates visual delays.
        usersRef.once("value", function(snap){
            snap.forEach(function(childSnapshot){

                var key = childSnapshot.key();

                var data = childSnapshot.val();

                $("#"+key+"").replaceWith(data);

            });
        });
    }
}