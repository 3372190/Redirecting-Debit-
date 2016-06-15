/**
 * Created by dylanaird on 10/06/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var message;


$(document).ready(function () {

    //TODO Turn this into a method that also updates the user red panel in real time, and notifications.
    var redirecteesRef = firebaseRef.child("redirectees");

    redirecteesRef.on("child_changed", function (snapshot) {
        $("#serviceoverall").find("tr:gt(0)").remove();
        $('#serviceProviderLoader').show();
        loadSummary();
    });
});

//This function loads the overall service provider and user summary for the admin to see.
function loadSummary() {

    firebaseRef.child("serviceprovider").once('value', function (spSnapshot) {
        spSnapshot.forEach(


        );
    });


}