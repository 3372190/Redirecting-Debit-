var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");

$(document).ready(function() {
    
    loadUserDetails();
    

    
    
    
});
                  
                  
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