/**
 * Created by dylanaird on 4/06/2016.
 */
var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var message;
var logObjects = [];


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
    firebaseRef.child("redirectees").orderByChild("notified").equalTo(true).once('value', function (redirecteesSnapShot) {
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
                    notifiedTimeStamp.setTime(redirectChildData.notifiedtimestamp * 1000);
                    respondedTimeStamp.setTime(redirectChildData.respondedtimestamp * 1000);

                    var logObj = new LogObject(redirecteeKey, userResults.firstname + ' ' + userResults.lastname, redirectChildData.notified, redirectChildData.notifiedtimestamp,
                        serviceResults.name, redirectChildData.responded, redirectChildData.respondedtimestamp);
                    logObjects.push(logObj);


                    //adding the table row and all its appropriate fields and data.
                    $('#serviceoverall > tbody:last-child').append('' +
                        '<tr id="' + redirecteeKey + '" name="' + redirecteeKey + '">' +
                        '<td><img src="./../' + userResults.profileimage + '" alt="./../assets/img/team/img32-md.jpg"/>' +
                        '' + userResults.firstname + ' ' + userResults.lastname + '</td>' +
                        '<td>' + new Date(notifiedTimeStamp.getTime() + notifiedTimeStamp.getTimezoneOffset() * 60000) + '</td>' +
                        '<td><img src="' + serviceResults.img + '" alt="./../assets/img/team/img32-md.jpg"/>' +
                        serviceResults.name + '</td>' +
                        '<td>' + redirectChildData.responded + '</td>' +
                        '<td>' + new Date(respondedTimeStamp.getTime() + respondedTimeStamp.getTimezoneOffset() * 60000) + '</td>' +
                        '</tr>');
                });
            });
        });
        $('#serviceProviderLoader').hide();
    });
}

function downloadCsv(fileName, mimeType) {

    var topRow = 'Username,Notified,notified Date,Service Provider, Responded, Responded Date\n';
    var csvContent = topRow;
    for (var i = 0; i < logObjects.length; i++) {

        csvContent += logObjects[i].uName + ',' + logObjects[i].notified + ',' + logObjects[i].notifiedDate +
            ',' + logObjects[i].spName + ',' + logObjects[i].responded + ',' + logObjects[i].respondedDate + '\n';
    }

    var a = document.createElement('a');
    mimeType = mimeType || 'application/octet-stream';

    if (navigator.msSaveBlob) { // IE10
        return navigator.msSaveBlob(new Blob([csvContent], {type: mimeType}), fileName);
    } else if ('download' in a) { //html5 A[download]
        a.href = 'data:' + mimeType + ',' + encodeURIComponent(csvContent);
        a.setAttribute('download', fileName);
        document.body.appendChild(a);
        setTimeout(function () {
            a.click();
            document.body.removeChild(a);
        }, 66);
        return true;
    } else { //do iframe dataURL download (old ch+FF):
        var f = document.createElement('iframe');
        document.body.appendChild(f);
        f.src = 'data:' + mimeType + ',' + encodeURIComponent(csvContent);

        setTimeout(function () {
            document.body.removeChild(f);
        }, 333);
        return true;
    }


}
function LogObject(redirecteeKey, uName, notified, notifiedDate, spName, responded, respondedDate) {

    this.rKey = redirecteeKey;
    this.uName = uName;
    this.notified = notified;
    this.notifiedDate = notifiedDate;
    this.spName = spName;
    this.responded = responded;
    this.respondedDate = respondedDate;

}

