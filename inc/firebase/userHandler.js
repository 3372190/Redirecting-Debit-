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

            firebaseRef.authWithPassword({
            email    : email,
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

        }else{
            console.log("TextFields Empty")
            return false;
        }
        return false;
    });
    
    
    
    $('#registerButton').click(function(){

        // if flag is false the form will not submit
        var flag = true;

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


        if(flag){
        



        }
        
        
        
    });
    
    
    
    
});





function processLoginForm(){}
function processRegisterForm(){}
function userLogin(){
    
    
    

}
function userLogout(){
    
    if (isUserLoggedIn){
        firebaseRef.unauth();
       window.location = "index.php"
   }
    
}
function userRegister(){}

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

$("#loginFunction").click(function(){
   if (isUserLoggedIn){
       window.location = "page_profile.php"
   }else{
       window.location = "page_login.php"
   }
});