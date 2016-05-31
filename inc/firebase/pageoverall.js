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


        $("#serviceoverall > thead").append('<tr>' +
            '<th>Service Provider</th>' +
            '<th>About</th>' +
            '<th>Current Status</th>' +
            '<th>Contact</th> ' +
            '</tr>');

        if (numOfProviders == 0) {
            $("#serviceoverall > tbody:last-child").append(
                '<tr><td colspan="4"><h4>You have no service providers. <a href="page_statement.php#profile">Add Some Now</a></h4></td></tr>'
            );
        }

        userSnap.forEach(function (childSnapshot) {
            firebaseRef.child('serviceprovider').child(childSnapshot.key()).once('value', function (mediaSnap) {
                var serviceResults = mediaSnap.val();
                var userResults = childSnapshot.val();

                var bCallbackId = childSnapshot.key() + "callback";
                var bCcId = childSnapshot.key() + "cc";
                var lNotified = childSnapshot.key() + "notifiedLabel";
                var delLabel = childSnapshot.key() + "del";


                /*create buttons here according to the firebase dataset*/

                var callBackButtonHTML = '<a nohref id="' + bCallbackId + '" name=" ' + bCallbackId + '" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs "></a>';
                var ccButtonHTML = '<a nohref id="' + bCcId + '" name=" ' + bCcId + '" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs "></a>';
                var delButtonHTML = '<a id="' + delLabel + '" name="' + delLabel + '" nohref onclick="" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs ">Delete ' + serviceResults.name + ' </a> ';

                $('#serviceoverall > tbody:last-child').append('' +
                    '<tr id="' + childSnapshot.key() + '" name="' + childSnapshot.key() + '">' +
                    '<td><img class="rounded-x" src="' + serviceResults.img + '" alt=""><br>' +
                    '<span><a href="#">' + serviceResults.email + '</a></span><br><span><a href="#">' + serviceResults.website + '</a>' +
                    '</span></td><td class="td-width"><p>' + serviceResults.description + '</p></td>' +
                    '<td>Notified: <span id="' + lNotified + '" class="label label-success">' + userResults.notified + '</span><br><br></td>' +
                    '<td><br><span class="label">' +
                    callBackButtonHTML +
                    '</span><br><br><span class="label">' +
                    ccButtonHTML +
                    '</span><br><br>' +
                    '<span class="label">' +
                    delButtonHTML +
                    '</span></td></tr>');

                var callBackButton = $('#' + bCallbackId + '');
                var ccButton = $('#' + bCcId + '');
                var lNotifiedob = $('#' + lNotified + '');
                var delButton = $('#' + delLabel + '');

                delButton.attr('onclick', 'confirmSpRemove(\'' + childSnapshot.key() + '\', \' ' + serviceResults.name + '\')');
                callBackButton.attr('onclick', 'notifyProviders(\'' + childSnapshot.key() + '\',\'' + "callback" + '\',\'' + bCallbackId + '\')');
                callBackButton.text("Send Callback");
                ccButton.attr('onclick', 'notifyProviders(\'' + childSnapshot.key() + '\',\'' + "cc" + '\',\'' + bCcId + '\')');
                ccButton.text("Send CC ");

                if (userResults.notified) {
                    lNotifiedob.text("Yes");
                    if (userResults.method == "callback") {

                        callBackButton.attr('onclick', 'cancelNotify(\'' + childSnapshot.key() + '\',\'' + "callback" + '\',\'' + bCallbackId + '\')');
                        callBackButton.text("Cancel Send CallBack");
                    } else {
                        ccButton.attr('onclick', 'cancelNotify(\'' + childSnapshot.key() + '\',\'' + "cc" + '\',\'' + bCcId + '\')');
                        ccButton.text("Cancel Send cc");
                    }
                } else {
                    lNotifiedob.text("No");
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
//TODO change notify method
}

function confirmSpRemove(spKey, spName) {
    if (confirm("Are You Sure?") == true) {
        deleteServiceProvider(spKey, spName);
    }

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
function deleteServiceProvider(spKey, spName) {

    var usersRef = firebaseRef.child("users").child(uId).child("serviceproviders");
    var removeRef = usersRef.child(spKey);

    removeRef.remove(function (error) {

        if (error) {
            message = 'Unable to Delete ' + spName + ' ';
            messageDisplay(message);
        } else {
            message = '' + spName + ' Deleted';
            messageDisplay(message);
            $('#' + spKey + '').remove();
        }
    });

//TODO Create button that will delete service provider with a prompt asking the user if they are sure
}


function loadProviders() {
    var providersRef = firebaseRef.child("serviceprovider");
    providersRef.limitToFirst(2).once('value', function (providerSnap) {
        providerSnap.forEach(function (childSnapshot) {
            var serviceResults = childSnapshot.val();

            //TODO check if method is set and create button appropriately.

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