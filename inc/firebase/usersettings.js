var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var uId;
var message;

$(document).ready(function() {
    
    loadUserDetails();
    
    $("#updatePassword").click(changeUserPassword);
    $("#uploadpp").click(changeUserPicture);
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
                    op = listElement.value;
                }else{
                    flag = false;
                    listElement.style.border = 'red';
                    message = "old password is empty";
                    break;   
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
                message = "The specified user account password is incorrect.";
                break;
              case "INVALID_USER":
                message = "The specified user account does not exist.";
                break;
              default:
                message = "Error changing password: " +error;
            }
          } else {
            message = "User password changed successfully!";
          }
        });
        
    }else{
        
        
    }
    
    document.getElementById("message").innerHTML = message;
    return false;
}

function changeUserPicture(){
        
        var flag = true;
        if($("#fileToUpload").val() == null){
            flag = false;
            
        }
        if(uId == null){
            flag = false;
        }
    
        
        //gather the form and post it to profileupload
        var formData = new FormData($('#profileupload')[0]);
        formData.append("uid", uId);
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
                    $('#profilepreview').attr("src", "assets/img/loading.gif");
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
						message = data.text;
                        
					}else{
                        
                       var response =  JSON.parse(data);
                        //console.log(response);
                        if(response['Type'] == "Error"){
                            message = response['Message'];
                            
                        }else{
                            updateProfilePicture(uId, response['Message']);
                            message = "File sucessfully updated";
                        }
                        $("#profilepreview").before("<h3>" + message+ "</h3>").css("color", "red");
                        
					}		
				}
			 });
		  }
        return false;
    $("#profilepreview").before("<h3>" + message+ "</h3>").css("color", "red");
}

function updateProfilePicture(uid, path){
    
    path = path.substring(3);
    
    profilepictureRef = firebaseRef.child("users").child(uId);
    profilepictureRef.update({ profileimage: path });
    $("#profileimage").attr("src", path);
    $("#profilepreview").attr("src", path);
    if(localStorage){
        
        var userDetails = JSON.parse(localStorage.getItem("userDetails"));
        userDetails['profileimage'] = path;
        localStorage.setItem("userDetails", JSON.stringify(userDetails));
    }
    
}

function changeUserDetails(){
    
    
    
}
                  
                  
