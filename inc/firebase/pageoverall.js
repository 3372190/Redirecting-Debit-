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


                /*create buttons here according to the firebase dataset*/

                var callBackButtonHTML = '<a nohref id="' + bCallbackId + '" name=" ' + bCallbackId + '" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs "></a>';
                var ccButtonHTML = '<a nohref id="' + bCcId + '" name=" ' + bCcId + '" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs "></a>';


                $('#serviceoverall > tbody:last-child').append('' +
                    '<tr><td><img class="rounded-x" src="' + serviceResults.img + '" alt=""><br>' +
                    '<span><a href="#">' + serviceResults.email + '</a></span><br><span><a href="#">' + serviceResults.website + '</a>' +
                    '</span></td><td class="td-width"><p>' + serviceResults.description + '</p></td>' +
                    '<td>Notified: <span class="label label-success">' + userResults.notified + '</span><br><br></td>' +
                    '<td><br><span class="label">' +
                    callBackButtonHTML +
                    '</span><br><br><span class="label">' +
                    ccButtonHTML +
                    '</span></td></tr>');

                var callBackButton = $('#' + bCallbackId + '');
                var ccButton = $('#' + bCcId + '');

                callBackButton.attr('onclick', 'notifyProviders(\'' + childSnapshot.key() + '\',\'' + "callback" + '\',\'' + bCallbackId + '\')');
                callBackButton.text("Send Callback");
                ccButton.attr('onclick', 'notifyProviders(\'' + childSnapshot.key() + '\',\'' + "cc" + '\',\'' + bCcId + '\')');
                ccButton.text("Send CC ");

                if (userResults.notified) {
                    if (userResults.method == "callback") {

                        callBackButton.attr('onclick', 'cancelNotify(\'' + childSnapshot.key() + '\',\'' + "callback" + '\',\'' + bCallbackId + '\')');
                        callBackButton.text("Cancel Send CallBack");
                    } else {
                        ccButton.attr('onclick', 'cancelNotify(\'' + childSnapshot.key() + '\',\'' + "cc" + '\',\'' + bCcId + '\')');
                        ccButton.text("Cancel Send cc");
                    }
                }

            });
        });
    });
}

function notifyProviders(providerId, method, buttonId) {
    var button = $('#' + buttonId + '');
    button.text("please wait");
    pushMethodToFirebase(providerId, method, button);

}

function cancelNotify(providerId, method, buttonId) {
    var button = $('#' + buttonId + '');
    button.text("please wait");
    cancelNotifyFirebase(providerId, method, button);
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
            button.text("Send " + method);
            messageDisplay(message);
        } else {
            message = "Service provider Notified";
            button.text("Cancel Send " + method);
            button.attr('onclick', 'cancelNotify(\'' + providerId + '\',\'' + method + '\',\'' + button.attr("id") + '\')');
            messageDisplay(message);
        }

    });
}

function changeNotifyMethod() {

}

function cancelNotifyFirebase(providerId, method, button) {

    var usersRef = firebaseRef.child("users").child(uId).child("serviceproviders");
    var pushRef = usersRef.child(providerId);

    pushRef.set({
        notified: false,
        timestamp: Math.floor((new Date).getTime() / 1000),
        responded: false
    }, function (error) {
        if (error) {
            message = "Failed to Cancel";
            messageDisplay(message);
        } else {
            message = "Cancelled Notify" + method;
            button.text("Send " + method);
            button.attr('onclick', 'notifyProviders(\'' + providerId + '\',\'' + method + '\',\'' + button.attr("id") + '\')');

            messageDisplay(message);
        }

    });
}
function deleteServiceProvider() {

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

function getUserId() {

    var authData = firebaseRef.getAuth();

    if (authData) {
        uId = authData.uid;
    } else {
        console.log("User is logged out");
    }
}