/*
This file handles everything between firebase and users, such as login, registration, password retreival
TODO: add password recovery function
@param firebaseRef is the reference to the firebase users
*/

var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

var userInfo;

$(document).ready(function() {
    
    $("#loginButton").click(function() {
    
    var email = $("#email").val();
    var p = $("#pword").val();
    
    
        if(email.length >0 && p.length > 0){

            userLogin(email, p);

        }else{
            console.log("TextFields Empty")
            return false;
        }
        return false;
    });
    
    
    
    $('#registerButton').click(function(){

        // if flag is false the form will not submit
        var flag = true;
        var message;
        var e, p;

        //  grab and Loop through all available elements in the list
        var elements = document.getElementsByTagName("input");
        
        
        for (var i = 0; i < elements.length; i++) {
            
            //Grab Current Node
            listElement = elements[i];
            var formInputName = listElement.getAttribute("name");
            
                
                         
                if(formInputName.localeCompare("postcode") == 0){
                    
                    if(listElement.value.length < 1){
                        listElement.style.borderColor = 'red';
                        message = formInputName + " needs to be longer than one character";
                        flag = false;
                        break;
                        
                        
                    }else if(listElement.value.length > 4){
                        listElement.style.borderColor = 'red';
                        message = formInputName + " Must be less than 4 digits";
                        flag = false;
                        break;
                    }
                        
                }else if ((formInputName == "emailAddress") ||(formInputName == "password") || formInputName == "confirmEmail" || formInputName == "confirmPassword"){
                    // create element
                     var checkElement;
                    
                    console.log(listElement.nodeValue + i);
                    if(formInputName == "emailAddress"){
                        checkElement = searchForElement(elements, "confirmEmail");
                        e = checkElement.value;
                    }else if(formInputName == "password"){
                        checkElement = searchForElement(elements, "confirmPassword");
                        p = checkElement.value;
                    }
                    
                    if(checkFieldLength(listElement) && checkFieldLength(checkElement)){
                        if(!checkFieldsMatch(listElement, checkElement)){
                            listElement.style.borderColor = 'red';
                            checkElement.style.borderColor = 'red';
                            message = formInputName + checkElement.getAttribute("name") + " Fields Must Match";
                            flag = false;
                            break;
                        }
                    }
                }else{
                    if(!checkFieldLength(listElement)) {
                        listElement.style.borderColor = 'red';
                        message = formInputName + " Must not be blank";  
                        flag = false;
                        break;
                    } 
                }
        }
        
        if(flag){
            userInfo = elements;
                //login and redirect
            if (userRegister(e,p)){
                console.log("Creating user");
                if(addUserDataToFirebase(elements)){
                    console.log("adding  user information to data base");
                    userLogin(e,p);
                }
            }


        }else if(!flag){
            document.getElementById("message").innerHTML = message;
        }
        return false; 
        
    }); 
});

function userLogin(e,p){
    
        firebaseRef.authWithPassword({
            email    : e,
            password : p
            }, function(error, authData) {
                 if (error) {
                    switch (error.code) {
                      case "INVALID_EMAIL":
                        console.log("The specified user account email is invalid.");
                        break;
                      case "INVALID_PASSWORD":
                        console.log("The specified user account password is incorrect.");
                        break;
                      case "INVALID_USER":
                        console.log("The specified user account does not exist.");
                        break;
                      default:
                        console.log("Error logging user in:", error);
                    }
                  } else {
                    console.log("Authenticated successfully with payload:", authData);
                      window.location = "page_profile.php";
                    return true;
                  }
            });
}
function userLogout(){
    
    if (isUserLoggedIn){
        firebaseRef.unauth();
       window.location = "index.php"
   }
    
}
function userRegister(email, pword){
    
    firebaseRef.createUser({
      email: email,
      password: pword
    }, function(error, userData) {
      if (error) {
        switch (error.code) {
          case "EMAIL_TAKEN":
            alert("The new user account cannot be created because the email is already in use.");
            break;
          case "INVALID_EMAIL":
            alert("The specified email is not a valid email.");
            break;
          default:
            alert("Error creating user:", error);
        }
      } else {
        console.log("Successfully created user account with uid:", userData.uid);
          addUserDataToFirebase(userData)
        return true;
      }
    });
    return false;
}

function isUserLoggedIn(){
    
    authData = firebaseRef.getAuth()
    
    if (authData) {
        console.log("User " + authData.uid + " is logged in with " + authData.provider);
        return true;
    } else {
        console.log("User is logged out");
        return false;
    }
}
    
function validateEmail(email){
    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email.value)) {
        // Yay! valid
        return true;
    }else{
        return false;
    }
}

function addUserDataToFirebase(elements){
    
    //this function can be made universal.
    if(isUserLoggedIn()){
        authData = firebaseRef.getAuth;
    
        
        
        
        firebaseRef.child("users").child(authData.uid).set({
            firstName: dylan, 
        }, onComplete);
            
        var onComplete = function(error) {
            if (error) {
                return false;
            }else {
                return true;
            }
        };
    }
    
}

function checkFieldLength(field){
    if(field.value.length < 1){
        return false;
    }
    return true;
}

function checkFieldsMatch(field1, field2){
    Element1 = field1;
    Element2 = field2;
    
    if(Element1.value != Element2.value){
        return false;
    }
    return true;
}
function searchForElement(nodeList, name){
     var checkElement;
    for(var j = 0; nodeList.length; j++){
        checkElement = nodeList[j];
        if(checkElement.getAttribute("name") == name){
            break;
        }
    }
    return checkElement;
}

$("#loginFunction").click(function(){
   if (isUserLoggedIn){
       window.location = "page_profile.php"
   }else{
       window.location = "page_login.php"
   }
});