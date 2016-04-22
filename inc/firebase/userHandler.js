/*
This file handles everything between firebase and users, such as login, registration, password retreival
TODO: add password recovery function
@param firebaseRef is the reference to the firebase users
*/

var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

$( document ).ready(function() {
    
    
    
    
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
    
    
    
    $('#registerButton').submit(function(){

        // if flag is false the form will not submit
        var flag = true;
        var message;

        // collect varibles from the form data.  
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var address = $('#address').val();
        var postcode = $('#postcode').val();
        var state = $('#state').val();
        var country = $('#country').val();
        var emailAddress = $('#emailAddress').val();
        var confirmEmail = $('#confirmEmail').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();
        
        
        if(firstName.length || lastName.length <1 ){
            if(firstName.length < 1){
                $('#firstName').css('border-color','red');
                message = "First name must be greater than 1 character"
                flag = false;
            }
       
            if(lastName.length < 1){
                $('#lastName').css('border-color','red');
                message = "last name must be greater than 1";
                flag = false;
            }
        }
        
        if(address.length < 1) {
            
            $('#address').css('border-color', 'red');
            message = "Address must be entered";
            flag = false;
        }
        if(postcode.length < 1 ){
            $('#postcode').css('border-color', 'red');
            message = "Postcode must be entered";
            flag = false;
        }else if(postcode.length > 4){
            $('#postcode').css('border-color', 'red');
            message = "Postcode must be less than 4 numbers";
        }
        
        //validate email and password   
        

        

        if(flag){
            if (userRegister(emailAddress,password)){
                if(addUserDataToFirebase()){
                    userLogin(emailAddress,password);
                }
            }


        }else if(!flag){
            //Display error message
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

function addUserDataToFirebase(){
    
    ref.onAuth(function(authData) {
      if (authData) {
        // save the user's profile into the database so we can list users,
        // use them in Security and Firebase Rules, and show profiles
        ref.child("users").child(authData.uid).set({
          provider: authData.provider,
          name: getName(authData)
        });
      }
    });
    
}

$("#loginFunction").click(function(){
   if (isUserLoggedIn){
       window.location = "page_profile.php"
   }else{
       window.location = "page_login.php"
   }
});