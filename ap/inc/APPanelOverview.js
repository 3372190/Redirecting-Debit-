/**
 * Created by dylanaird on 4/06/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var message;


$(document).ready(function () {
    loadUserDetails();
    loadUserServiceProviders();

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


                firebaseRef.child("users").child(redirectChildData.userkey).once('value', function (userReference) {
                    var serviceResults = spReference.val();
                    var userResults = userReference.val();
                    var notifiedTimeStamp = new Date(0);
                    var respondedTimeStamp = new Date(0);
                    notifiedTimeStamp.setUTCSeconds(redirectChildData.notifiedtimestamp);
                    respondedTimeStamp.setUTCSeconds(redirectChildData.respondedtimestamp);


                    //adding the table row and all its appropriate fields and data.
                    $('#serviceoverall > tbody:last-child').append('' +
                        '<tr id="' + redirecteeKey + '" name="' + redirecteeKey + '">' +
                        '<td>' + userResults.firstname + ' ' + userResults.lastname + '</td>' +
                        '<td>' + redirectChildData.notified + '</td>' +
                        '<td>' + notifiedTimeStamp.getTimezoneOffset() + notifiedTimeStamp.getDay() + ' / ' + notifiedTimeStamp.getMonth() + ' / ' + notifiedTimeStamp.getFullYear() + '</td>' +
                        '<td>' + serviceResults.name + '</td>' +
                        '<td>' + redirectChildData.responded + '</td>' +
                        '<td>' + respondedTimeStamp.getFullYear() + '</td>' +
                        '</tr>');
                });

            });


        });
        $('#serviceProviderLoader').hide();
    });


}