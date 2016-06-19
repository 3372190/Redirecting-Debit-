/**
 * Created by dylanaird on 10/06/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var message;
var totalNotified = 0;
var totalResponded = 0;


$(document).ready(function () {

    //TODO Turn this into a method that also updates the user red panel in real time, and notifications.
    var redirecteesRef = firebaseRef.child("redirectees");

    redirecteesRef.on("child_changed", function (snapshot) {
        $("#serviceoverall").find("tr:gt(0)").remove();
        $('#serviceProviderLoader').show();
        loadSummary();
    });
    loadSummary();
});

//This function loads the overall service provider and user summary for the admin to see.
function loadSummary() {

    firebaseRef.child("serviceprovider").once('value', function (spSnapshot) {
        //number of service providers
        var totalSp = spSnapshot.numChildren();
        console.log(totalSp);
        spSnapshot.forEach(function (spSnapshotChild) {
            var spSnapshotChildData = spSnapshotChild.val();

            //get number of redirectees for current service provider.
            firebaseRef.child("redirectees").orderByChild("serviceproviderkey").equalTo(spSnapshotChild.key()).once('value', function (spRedirectee) {

                var totalRedirectees = spRedirectee.numChildren();
                totalNotified = 0;
                totalResponded = 0;


                spRedirectee.forEach(function (redirecteeSnapShot) {
                    var redirectChildData = redirecteeSnapShot.val();

                    if (redirectChildData.notified) {
                        console.log(spSnapshotChildData + "Notified");
                        totalNotified++;
                    }
                    if (redirectChildData.responded) {
                        console.log(spSnapshotChildData.val() + "responded");
                        totalResponded++;
                    }
                });
                $("#serviceProviderLoader").remove();
                $("#serviceoverall").append('<tr><td><img src="' + spSnapshotChildData.img + '">' + spSnapshotChildData.name + '</td><td>' + totalNotified + '</td><td>' + totalResponded + '</td><td>' + totalRedirectees + '</td></tr>');
            });
        });
    });
}