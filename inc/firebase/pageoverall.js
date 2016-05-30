var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var uId;
var message;
$(document).ready(function () {
    loadUserDetails();
    loadUserServiceProviders();
    loadProviders();
});


function loadUserServiceProviders() {

    firebaseRef.child('users').child(uId).child("serviceproviders").once('value', function (userSnap) {
        var numOfProviders = userSnap.numChildren();
        $("#numofproviders").html(numOfProviders);


        userSnap.forEach(function (childSnapshot) {
            firebaseRef.child('serviceprovider').child(childSnapshot.key()).once('value', function (mediaSnap) {
                var serviceResults = mediaSnap.val();
                var userResults = childSnapshot.val();
                var bCallbackId = childSnapshot.key() + "callback";
                var bCcId = childSnapshot.key() + "cc";

                //write method to set cancel button on method button if set.

                $('#serviceoverall > tbody:last-child').append('' +
                    '<tr><td><img class="rounded-x" src="' + serviceResults.img + '" alt=""><br>' +
                    '<span><a href="#">' + serviceResults.email + '</a></span><br><span><a href="#">' + serviceResults.website + '</a>' +
                    '</span></td><td class="td-width"><p>' + serviceResults.description + '</p></td>' +
                    '<td>Notified: <span class="label label-success">' + userResults.notified + '</span><br><br></td>' +
                    '<td><br><span class="label">' +
                    '<a id="' + bCallbackId + '" name=" ' + bCallbackId + '" nohref onClick="notifyProviders(\'' + childSnapshot.key() + '\',\'' + "callback" + '\',\'' + bCallbackId + '\');" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs ">Request Callback</a>' +
                    '</span><br><br><span class="label">' +
                    '<a nohref id="' + bCcId + '" name=" ' + bCcId + '" onClick="notifyProviders(\'' + childSnapshot.key() + '\',\'' + "cc" + '\',\'' + bCcId + '\');" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs ">Send Info</a>' +
                    '</span></td></tr>');
            });
        });
    });
}

function notifyProviders(providerId, method, buttonId) {
    var button = $('#' + buttonId + '');
    button.text("please wait");
    pushMethodToFirebase(providerId, method, button);

}

function pushMethodToFirebase(providerId, method, button) {

    var usersRef = firebaseRef.child("users").child(uId).child("serviceproviders");
    var pushRef = usersRef.child(providerId);

    pushRef.update({
        notified: true,
        timestamp: Math.floor((new Date).getTime() / 1000),
        responded: false,
        method: method
    }, function (error) {
        if (error) {
            message = "Failed to notify";
            button.text("request" + method);
            messageDisplay(message);
        } else {
            message = "Service provider Notified";
            button.text("cancel");
            messageDisplay(message);
        }

    });
}
function loadProviders() {
    var providersRef = firebaseRef.child("serviceprovider");
    providersRef.limitToFirst(2).once('value', function (providerSnap) {
        providerSnap.forEach(function (childSnapshot) {
            var serviceResults = childSnapshot.val();

            //check if method is set and create button appropriately.

            $('#providerrow').append('<div class="col-sm-6"><div class="profile-blog blog-border"><img class="rounded-x" src="' + serviceResults.img + '" alt=""><div class="name-location"><strong>' + serviceResults.name + '</strong></div><div class="clearfix margin-bottom-20"></div><p>' + serviceResults.description + '</p><hr><ul class="list-inline share-list"><li><a href="' + serviceResults.email + '">website</a></li><li><i class="fa fa-facebook"></i><a href="#">54 Followers</a></li><li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li></ul></div></div>');

        });
    });

}

function changeNotifyMethod() {

}

function cancelNotify() {

    var usersRef = firebaseRef.child("users").child(uId).child("serviceproviders");
    var pushRef = usersRef.child(providerId);

    pushRef.update({
        notified: false,
        timestamp: Math.floor((new Date).getTime() / 1000),
        responded: false
    }, function (error) {
        if (error) {
            message = "Failed to Cancel";
            button.text("request" + method);
            messageDisplay(message);
        } else {
            message = "Service provider Removed";
            button.text("cancel");
            messageDisplay(message);
        }

    });
}
function deleteServiceProvider() {

}

function getUserId() {

    var authData = firebaseRef.getAuth();

    if (authData) {
        uId = authData.uid;
    } else {
        console.log("User is logged out");
    }
}