var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

var userInfo;
var message;
var uId;

$(document).ready(function() {

    $("#loader").hide(100);
    
    $("#loginButton").click(loginFunction);
    $('#registerButton').click(registerServiceProviderFunction);
    $('#adminRegisterButton').click(registerFunction);
});


function getUserToolbar(){
    var loggedIn = isUserLoggedIn();
    if(loggedIn){
        if(checkLocalStorageSupport){
            
        
            if(localStorage.getItem("userDetails") != null){
                var userDetails = JSON.parse(localStorage.getItem("userDetails"));
                var fullName = userDetails["firstname"] + " " +userDetails["lastname"];

                $("#loginFunction").html("<b><a href='index.php'>Welcome: " + fullName + "</a> | <a onClick='userLogout(); return false;' href='index.php'>Logout</a></b>");
            }
        
        
        }else{
                var a = firebaseRef.getAuth();

                firebaseRef.child("users").child(a.uid).once('value', function(snap){
                    var id  = snap.val();
                    var fullName = id.firstName + " " + id.lastName;
                    $("#loginFunction").html("<b><a href='index.php'>Welcome: " + id.firstname + "</a> | <a onClick='userLogout(); return false;' href='index.php'>Logout</a></b>");
                });
        }
        
    }else{
        $("#loginFunction").html("<a href='page_login.php'>Login</a>");
    }

}

function loginFunction (){
    
        var flag = true;
        var e, p;
        
        var elements = document.getElementsByTagName("input");
        
        for(var i = 0; i < elements.length -1; i++ ){
            listElement = elements[i];
            var formInputName = listElement.getAttribute("name");

            if(formInputName == "emailAddress"){  
                if(checkFieldLength(listElement) && validateEmail(listElement.value)){
                    e = listElement.value;
                }else{
                    flag = false;
                    message = "Email is not valid, or email field is blank";
                    break;
                }

            }else if(formInputName == "password"){
                if(checkFieldLength(listElement)){
                    p = listElement.value;
                }else{
                    flag = false;
                    message = "Password cannot be blank";
                    break;
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
                document.getElementById("loginButton").innerHTML = "Logging in";
                userLogin(e, p);
            }else{
                messageDisplay(message);
            }
        return false;
    
}
function registerServiceProviderFunction(){
            // if flag is false the form will not submit
        var flag = true;
        var e, p;

        //  grab and Loop through all available elements in the list
        var elements = document.getElementsByTagName("input");
        
        
        for (var i = 0; i < elements.length; i++) {
            
            //Grab Current Node
            listElement = elements[i];
            var formInputName = listElement.getAttribute("name");
            
                
                         
                if ((formInputName == "emailAddress") ||(formInputName == "password") || formInputName == "confirmEmail" || formInputName == "confirmPassword"){
                    // create element
                     var checkElement;
                    if(formInputName == "emailAddress"){
                        checkElement = searchForElement(elements, "confirmEmail");
                        
                        if(validateEmail(listElement.value) && validateEmail(checkElement.value)){
                            e = checkElement.value;
                        }else{
                            listElement.style.borderColor = 'red';
                            flag = false;
                            message = "Email fields are not valid emails";
                            break;
                        }
                        
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
            $("#loader").show(100);
            //login and redirect
            serviceProviderRegister(e, p);
            document.getElementById("registerButton").innerHTML = "Loading...";


        }else if(!flag){
            messageDisplay(message);
        }
        return false; 
        
}
//TODO This Function can be deleted on deployment!!
function registerFunction() {
    // if flag is false the form will not submit
    var flag = true;
    var e, p;

    //  grab and Loop through all available elements in the list
    var elements = document.getElementsByTagName("input");


    for (var i = 0; i < elements.length; i++) {

        //Grab Current Node
        listElement = elements[i];
        var formInputName = listElement.getAttribute("name");


        if (formInputName == "postcode") {

            if (listElement.value.length < 1) {
                listElement.style.borderColor = 'red';
                message = formInputName + " needs to be longer than one character";
                flag = false;
                break;


            } else if (listElement.value.length > 4) {
                listElement.style.borderColor = 'red';
                message = formInputName + " Must be less than 4 digits";
                flag = false;
                break;
            }

        } else if ((formInputName == "emailAddress") || (formInputName == "password") || formInputName == "confirmEmail" || formInputName == "confirmPassword") {
            // create element
            var checkElement;
            if (formInputName == "emailAddress") {
                checkElement = searchForElement(elements, "confirmEmail");

                if (validateEmail(listElement.value) && validateEmail(checkElement.value)) {
                    e = checkElement.value;
                } else {
                    listElement.style.borderColor = 'red';
                    flag = false;
                    message = "Email fields are not valid emails";
                    break;
                }

            } else if (formInputName == "password") {
                checkElement = searchForElement(elements, "confirmPassword");
                p = checkElement.value;
            }

            if (checkFieldLength(listElement) && checkFieldLength(checkElement)) {
                if (!checkFieldsMatch(listElement, checkElement)) {
                    listElement.style.borderColor = 'red';
                    checkElement.style.borderColor = 'red';
                    message = formInputName + checkElement.getAttribute("name") + " Fields Must Match";
                    flag = false;
                    break;
                }
            }
        } else {
            if (!checkFieldLength(listElement)) {
                listElement.style.borderColor = 'red';
                message = formInputName + " Must not be blank";
                flag = false;
                break;
            }
        }
    }

    if (flag) {
        userInfo = elements;
        $("#loader").show(100);
        //login and redirect
        adminRegister(e, p);
        document.getElementById("adminRegisterButton").innerHTML = "Logging in";


    } else if (!flag) {
        messageDisplay(message);
    }
    return false;

}


function serviceProviderRegister(email, pword){
        firebaseRef.createUser({
      email: email,
      password: pword
    }, function(error, userData) {
      if (error) {
        switch (error.code) {
          case "EMAIL_TAKEN":
            message ="The new user account cannot be created because the email is already in use.";
            messageDisplay(message);
            break;
          case "INVALID_EMAIL":
            message = "The specified email is not a valid email.";
            messageDisplay(message);
            break;
          default:
            message ="Error creating user:", error;
            messageDisplay(message);
            break;
        }
      } else {
        message = "Successfully created user account with uid: "+  userData.uid;
          messageDisplay(message);
          addServiceProviderToDatabase(userInfo, userData.uid);
      }
    });
}

function addServiceProviderToDatabase(elements, userId){
    
        if(elements.length > 0){
       
    
            firebaseRef.child("serviceprovider").child(userId).set({
                name: elements[0].value,
                website: elements[1].value,
                img: elements[2].value,
                description: elements[3].value,
                email:elements[4].value,
                userlevel: "2",
            }, function(error){
                if (error) {
                    messageDisplay("failed adding user details")
                }else {
                    messageDisplay("User Data added To Database")
                }
            });
        }
    
    
}

function adminRegister(email, pword){
    
    
    firebaseRef.createUser({
      email: email,
      password: pword
    }, function(error, userData) {
      if (error) {
        switch (error.code) {
          case "EMAIL_TAKEN":
            message ="The new user account cannot be created because the email is already in use.";
            messageDisplay(message);
            break;
          case "INVALID_EMAIL":
            message = "The specified email is not a valid email.";
            messageDisplay(message);
            break;
          default:
            message ="Error creating user:", error;
            messageDisplay(message);
            break;
        }
      } else {
        message = "Successfully created user account with uid: "+  userData.uid;
          messageDisplay(message);
          addAdminDataToFirebase(userInfo, userData.uid);
      }
    });
}

function userLogin(e,p){
    
        firebaseRef.authWithPassword({
            email    : e,
            password : p
            }, function(error, authData) {
                 if (error) {
                    switch (error.code) {
                      case "INVALID_EMAIL":
                       message = "The specified user account email is invalid.";
                        messageDisplay(message);
                        break;
                      case "INVALID_PASSWORD":
                        message ="The specified user account password is incorrect.";
                            messageDisplay(message);
                        break;
                      case "INVALID_USER":
                        message = "The specified user account does not exist.";
                            messageDisplay(message);
                        break;
                      default:
                        message = "Error logging user in:";
                            messageDisplay(error);
                    }
                  }else{
                      message = "Authenticated successfully. <br> Redirecting in 2 seconds";
                      messageDisplay(message);
                          
                      
                      var usersRef = firebaseRef.child("adminacc").child(authData.uid);
                      usersRef.once("value", function(snap){

                        //because the data doesnt exist in local storage and it is supported, add it to local storage
                        var object = snap.val();
                        localStorage.setItem('userDetails', JSON.stringify(object));
                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 2000); //will call the function after 2 secs.
                
                      });

                    return true;
                  }
            });
    
}

function messageDisplay(msg){
    document.getElementById("message").innerHTML = msg;
}
function userLogout(){
    
    if (isUserLoggedIn()){
        localStorage.clear();
        firebaseRef.unauth();
       window.location = "index.php";
   }
    
}
function isUserLoggedIn(){
    
    authData = firebaseRef.getAuth();

    if (authData) {
        uId = authData.uid;
        //console.log(authData.uid);
        return true;
    } else {
        //console.log("User is logged out");
        return false;
    }
    
}
function getUserLev(){
    
    if(isUserLoggedIn()){
        var userDetails = JSON.parse(localStorage.getItem("userDetails"));
        return userDetails["userlevel"];
       
    }else{
        return 0;
    }
    
}

function addAdminDataToFirebase(elements, userId){
    
        if(elements.length > 0){
       
    
        firebaseRef.child("adminacc").child(userId).set({
            firstname: elements[0].value,
            lastname: elements[1].value,
            emailaddress: elements[6].value,
            address: elements[2].value,
            state:elements[3].value,
            postcode:elements[4].value,
            country:elements[5].value,
            userlevel: "1",
            profileimage: "assets/img/team/img32-md.jpg",
        }, function(error){
            if (error) {
                messageDisplay("failed adding user details")
            }else {
                messageDisplay("User Data added To Database")
            }
        });
    }
}

function loadUserDetails(){
    
    var isLocalSupported = checkLocalStorageSupport();
    
    //check if local storage exists
    if(isLocalSupported){
        
        
        if(localStorage.getItem("userDetails") != null){
            //console.log(localStorage.getItem('userdetails'));
            var userDetails = JSON.parse(localStorage.getItem("userDetails"));
            for (var property in userDetails) {
                if (userDetails.hasOwnProperty(property)) {
                    if(property == "profileimage"){
                        $("#" +property+ "").attr("src", userDetails[property]);
                        $("#profilepreview").attr("src", userDetails[property]);
                    }else{
                        $("#"+ property+"").replaceWith(userDetails[property]);
                    }
                
                }
            }
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


function checkFieldLength(field){
    if(field.value.length < 1){
        return false;
    }
    return true;
}

function validateEmail(email){
    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email)) {
        // Yay! valid
        return true;
    }else{
        return false;
    }
}


function checkFieldsMatch(field1, field2){
    Element1 = field1;
    Element2 = field2;
    
    if(Element1.value != Element2.value){
        return false;
    }
    return true;
}

function checkLocalStorageSupport(){
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
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