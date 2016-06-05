/**
 * Created by dylanaird on 27/05/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var message;


function loadUserServiceProviders() {


    //get redirectees json tree
    firebaseRef.child("redirectees").orderByChild("serviceproviderkey").equalTo(uId).once('value', function (snapshot) {

        //loop through its children
        snapshot.forEach(function (redirecteeChild) {
            var redirecteeKey = redirecteeChild.key();

            var redirectChildData = redirecteeChild.val();

            firebaseRef.child("users").child(redirectChildData.userkey).once('value', function (userReference) {
                var userResults = userReference.val();

                if (!redirectChildData.responded) {

                    if (redirectChildData.method == "callback") {
                        var method = "Callback requested " + userResults.phonenumber;
                    } else {
                        var method = '<a href="google.com.au">Click Here</a>';
                    }

                    if (redirectChildData.notified) {
                        $('#serviceOverallTable > tbody:last-child')
                            .append('<tr id="' + redirecteeKey + '"><td><img src="./../' + userResults.profileimage + '" alt="./../assets/img/team/img32-md.jpg"/>' +
                                ' <br><h4>' + userResults.firstname + " " + userResults.lastname + '</h4></td>' +
                                '<td>' +
                                '<br>' + userResults.emailaddress +
                                '<br>' + userResults.address +
                                '<br>' + userResults.state + ", " + userResults.postcode +
                                '<br>' + userResults.country +
                                '</td><td>' + method + '</td>' +
                                '<td style="text-align: center;"><input type="image" width="40" height="40" src="./../assets/img/tick_unselected.png" onclick="confirmComplete(\'' + redirecteeKey + '\')" /></td></tr>');
                    }
                }
            });

        });
    });
}

function confirmComplete(redirecteeKey) {

    var x;
    if (confirm("Are You Sure?") == true) {
        updateUser(redirecteeKey);
        $('#' + redirecteeKey + '').remove();
    } else {
        x = "You pressed Cancel!";
        console.log(x);
    }
}

function updateUser(redirecteeKey) {

    var redirecteeRef = firebaseRef.child("redirectees").child(redirecteeId);

    redirecteeRef.update({
        respondedtimestamp: Math.floor((new Date).getTime() / 1000),
        responded: true
    }, function (error) {
        if (error) {
            message = "Notify Failed";
            messageDisplay(message)
        } else {
            message = "User Notified";
            messageDisplay(message);
        }
    });
}