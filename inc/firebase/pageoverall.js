var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var uId;
var message;
$(document).ready(function () {
    loadUserDetails();
    loadUserServiceProviders();
    loadProviders();

    //TODO Turn this into a method that also updates the user red panel in real time, and notifications.
    var redirecteesRef = firebaseRef.child("redirectees");

    redirecteesRef.on("child_changed", function (snapshot) {
        $("#serviceoverall").find("tr:gt(0)").remove();
        $('#serviceProviderLoader').show();
        loadUserServiceProviders();
    });
});


function loadUserServiceProviders() {
    //top level json tree
    firebaseRef.child("redirectees").orderByChild("userkey").equalTo(uId).once('value', function (redirecteesSnapShot) {
        var redirecteesKey = redirecteesSnapShot.key();
        console.log(redirecteesSnapShot.numChildren());

        //loop through each child in the redirectees table
        redirecteesSnapShot.forEach(function (redirecteesChild) {
            var redirecteeKey = redirecteesChild.key();

            var redirectChildData = redirecteesChild.val();



                firebaseRef.child("serviceprovider").child(redirectChildData.serviceproviderkey).once('value', function (spReference) {
                    //innner joining the user table
                    var serviceResults = spReference.val();


                    //These are used to create unique labels for every table row.
                    var bCallbackId = redirecteeKey + "callback";
                    var bCcId = redirecteeKey + "cc";
                    var lNotified = redirecteeKey + "notifiedLabel";
                    var delLabel = redirecteeKey + "del";
                    var lResponded = redirecteeKey + "res";


                    //create the html string to display the button in the table

                    var callBackButtonHTML = '<a nohref id="' + bCallbackId + '" name=" ' + bCallbackId + '" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs "></a>';
                    var ccButtonHTML = '<a nohref id="' + bCcId + '" name=" ' + bCcId + '" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs "></a>';
                    var delButtonHTML = '<a id="' + delLabel + '" name="' + delLabel + '" nohref onclick="" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs ">Delete ' + serviceResults.name + ' </a> ';

                    //adding the table row and all its appropriate fields and data.
                    $('#serviceoverall > tbody:last-child').append('' +
                        '<tr id="' + redirecteeKey + '" name="' + redirecteeKey + '">' +
                        '<td><img class="rounded-x" src="' + serviceResults.img + '" alt=""><br>' +
                        '<span><a href="#">' + serviceResults.email + '</a></span><br><span><a href="#">' + serviceResults.website + '</a>' +
                        '</span></td><td class="td-width"><p>' + serviceResults.description + '</p></td>' +
                        '<td>Notified <br> <span id="' + lNotified + '" >' + redirectChildData.notified + '</span><br><br>' +
                        'Responded <br> <span id="' + lResponded + '" class="label label-danger">' + redirectChildData.responded + '</span></td>' +
                        '<td><br><span class="label">' +
                        callBackButtonHTML +
                        '</span><br><br><span class="label">' +
                        ccButtonHTML +
                        '</span><br><br>' +
                        '<span class="label">' +
                        delButtonHTML +
                        '</span></td></tr>');

                    // grabing html elements and turning them into jquery objects
                    var callBackButton = $('#' + bCallbackId + '');
                    var ccButton = $('#' + bCcId + '');
                    var lNotifiedob = $('#' + lNotified + '');
                    var lRespondedob = $('#' + lResponded + '');
                    var delButton = $('#' + delLabel + '');

                    //add the relevant attributes and text to jquery elements from above
                    delButton.attr('onclick', 'confirmSpRemove(\'' + redirecteeKey + '\', \' ' + serviceResults.name + '\')');
                    callBackButton.attr('onclick', 'notifyProviders(\'' + redirecteeKey + '\',\'' + "callback" + '\',\'' + bCallbackId + '\')');
                    callBackButton.text("Send Callback");
                    ccButton.attr('onclick', 'notifyProviders(\'' + redirecteeKey + '\',\'' + "cc" + '\',\'' + bCcId + '\')');
                    ccButton.text("Send CC ");

                    if (redirectChildData.notified) {
                        lNotifiedob.text("Yes");
                        lNotifiedob.attr('class', 'label label-success');

                        if (redirectChildData.responded) {
                            lRespondedob.text("Yes");
                            lRespondedob.attr('class', 'label label-success');

                            } else {
                            lRespondedob.text("No");
                            lRespondedob.attr('class', 'label label-danger');
                            if (redirectChildData.method == "callback") {

                                callBackButton.attr('onclick', 'cancelNotify(\'' + redirecteeKey + '\',\'' + bCallbackId + '\')');
                                callBackButton.text("Cancel Send CallBack");
                            } else {
                                ccButton.attr('onclick', 'cancelNotify(\'' + redirecteeKey + '\',\'' + bCcId + '\')');
                                ccButton.text("Cancel Send cc");
                            }

                            }

                    } else {
                        lNotifiedob.text("No");
                        lNotifiedob.attr('class', 'label label-danger');
                        lRespondedob.text("No");
                        lRespondedob.attr('class', 'label label-danger');
                        }


                    //TODO Write code here to dynamically update mini dashboard counter and %
                    $('#serviceProviderLoader').hide();
                });


        });
    });


}


function notifyProviders(redirecteeId, method, buttonId) {
    $('#serviceProviderLoader').show();
    var button = $('#' + buttonId + '');
    button.text("please wait");
    pushMethodToFirebase(redirecteeId, method, button);

}

function cancelNotify(redirecteeId, buttonId) {
    $('#serviceProviderLoader').show();
    var button = $('#' + buttonId + '');
    button.text("please wait");
    cancelNotifyFirebase(redirecteeId, button);
}

function pushMethodToFirebase(redirecteeId, method, button) {

    var redirecteeRef = firebaseRef.child("redirectees").child(redirecteeId);

    redirecteeRef.update({
        notified: true,
        notifiedtimestamp: Math.floor((new Date).getTime() / 1000),
        responded: false,
        method: method
    }, function (error) {
        if (error) {
            message = "Failed to notify";
            button.text("Send " + method);
            messageDisplay(message);
            $('#serviceProviderLoader').hide();
        } else {
            message = "Service provider Notified";
            button.text("Cancel Send " + method);
            button.attr('onclick', 'cancelNotify(\'' + redirecteeId + '\',\'' + button.attr("id") + '\')');
            messageDisplay(message);
            $('#serviceProviderLoader').hide();
        }

    });
}

function confirmSpRemove(spKey, spName) {
    if (confirm("Are You Sure?") == true) {
        deleteServiceProvider(spKey, spName);
    }

}

function cancelNotifyFirebase(redirecteeId, button) {

    var redirecteeRef = firebaseRef.child("redirectees").child(redirecteeId);

    redirecteeRef.update({
        notified: false,
        notifiedtimestamp: null,
        responded: false
    }, function (error) {
        if (error) {
            message = "Failed to Cancel";
            messageDisplay(message);

            $('#serviceProviderLoader').hide();
        } else {
            message = "Cancelled Notify" + method;
            button.text("Send " + method);
            button.attr('onclick', 'notifyProviders(\'' + redirecteeId + '\',\'' + method + '\',\'' + button.attr("id") + '\')');

            messageDisplay(message);

            $('#serviceProviderLoader').hide();
        }

    });
}
function deleteServiceProvider(redirecteeId, spName) {

    var redirecteeRef = firebaseRef.child("redirectees").child(redirecteeId);

    redirecteeRef.remove(function (error) {

        if (error) {
            message = 'Unable to Delete ' + spName + ' ';
            messageDisplay(message);
        } else {
            message = '' + spName + ' Deleted';
            messageDisplay(message);
            $('#' + spKey + '').remove();

        }
    });
}

function loadProviders() {
    var providersRef = firebaseRef.child("serviceprovider");
    providersRef.limitToFirst(2).once('value', function (providerSnap) {
        providerSnap.forEach(function (childSnapshot) {
            var serviceResults = childSnapshot.val();

            //TODO check if method is set and create button appropriately.

            $('#providerrow').append('<div class="col-sm-6">' +
                '<div class="profile-blog blog-border">' +
                '<img class="rounded-x" src="' + serviceResults.img + '" alt="">' +
                '<div class="name-location"><strong>' + serviceResults.name + '</strong></div>' +
                '<div class="clearfix margin-bottom-20"></div>' +
                '<p>' + serviceResults.description + '</p><hr>' +
                '<ul class="list-inline share-list"><li><a href="' + serviceResults.email + '">website</a></li>' +
                '<li><i class="fa fa-facebook"></i><a href="#">54 Followers</a></li>' +
                '<li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li></ul>' +
                '</div></div>');

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