/**
 * Created by dylanaird on 27/05/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var message;



function loadUserServiceProviders(){


    firebaseRef.child('users').once("value", function(snapshot) {
        // The callback function will get called twice, once for "fred" and once for "barney"
        snapshot.forEach(function(childSnapshot) {
            // key will be "fred" the first time and "barney" the second time
            var userKey = childSnapshot.key();
            // childData will be the actual contents of the child
            if(childSnapshot.child("serviceproviders").child(getUserId()).val() != null){
                var childDataSP = childSnapshot.child("serviceproviders").child(getUserId()).val();
                var childDataSPKey = childSnapshot.child("serviceproviders").child(getUserId()).key();
                var childData = childSnapshot.val();
                var method;

                if (!childDataSP.responded) {

                    if (childDataSP.method == "callback") {
                        method = "Callback requested " + childData.phonenumber;
                    } else {
                        method = '<a href="google.com.au">Click Here</a>';
                    }

                    if (childDataSP.notified) {
                        $('#serviceOverallTable > tbody:last-child')
                            .append('<tr id="' + userKey + '"><td><img src="./../' + childData.profileimage + '" alt="./../assets/img/team/img32-md.jpg"/>' +
                                ' <br><h4>' + childData.firstname + " " + childData.lastname + '</h4></td>' +
                                '<td>' +
                                '<br>' + childData.emailaddress +
                                '<br>' + childData.address +
                                '<br>' + childData.state + ", " + childData.postcode +
                                '<br>' + childData.country +
                                '</td><td>' + method + '</td>' +
                                '<td style="text-align: center;"><input type="image" width="40" height="40" src="./../assets/img/tick_unselected.png" onclick="confirmComplete(\'' + childDataSPKey + '\',\'' + userKey + '\')" /></td></tr>');
                    }
                }

            }
        });
    });
}

function confirmComplete(spKey, uKey){

        var x;
        if (confirm("Are You Sure?") == true) {
            updateUser(spKey, uKey);
            $('#' + uKey + '').remove();
        } else {
            x = "You pressed Cancel!";
            console.log(x);
        }
}

function updateUser(spKey, uKey){

    firebaseRef.child("users").child(uKey).child("serviceproviders").child(spKey).update({
        timestamp: Math.floor((new Date).getTime()/1000),
        responded: true
    }, function(error){
        if(error){
            message = "Notify Failed";
            messageDisplay(message)
        }else{
            message = "User Notified";
            messageDisplay(message);
        }
    });
}