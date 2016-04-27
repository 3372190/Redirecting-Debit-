var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

$(document).ready(function() {
    
    loadUserDetails();
    
    $("#updatePassword").click(changeUserPassword);

    
    
    
});


function changeUserPassword(){
    var flag = true; 
    var e, op, np;
    
    var elements = document.getElementsByTagName("input");
    
    for(var i = 0; i < elements.length; i ++){
        listElement = elements[i];
        formInputName = listElement.getAttribute("name");
        
        
        switch(formInputName){
            case "oldPassword":
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
                var checkElement  = searchForElement(elements, "password");
            case "confirmPassword":
                checkElement = searchForElement(elements, "confirmPassword");
                
                
                
                
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