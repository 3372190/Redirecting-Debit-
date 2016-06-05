/**
 * Created by dylanaird on 4/06/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
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
    firebaseRef.child("redirectees").once('value', function (redirecteesSnapShot) {
        var redirecteesKey = redirecteesSnapShot.key();

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