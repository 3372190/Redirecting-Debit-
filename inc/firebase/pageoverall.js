var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var uId;
$(document).ready(function(){
    loadUserDetails();
    loadUserServiceProviders();
    loadProviders();
});


function loadUserServiceProviders(){
    
    firebaseRef.child('users').child(uId).child("serviceproviders").once('value', function(userSnap) {
        var numOfProviders = userSnap.numChildren();
        $("#numofproviders").html(numOfProviders);
        
        
        userSnap.forEach(function(childSnapshot){
            firebaseRef.child('serviceprovider').child(childSnapshot.key()).once('value', function(mediaSnap) {
                var serviceResults = mediaSnap.val();
                var userResults = childSnapshot.val();

                
                 $('#serviceoverall > tbody:last-child').append('<tr><td><img class="rounded-x" src="' + serviceResults.img + '" alt=""><br><span><a href="#">' + serviceResults.email + '</a></span><br><span><a href="#">' + serviceResults.website + '</a></span></td><td class="td-width"><p>' + serviceResults.description + '</p></td><td>Notified: <span class="label label-success">' + userResults.notified + '</span><br><br></td><td><br><span class="label"><a nohref onClick="notifyProviders(' + childSnapshot.key() + ');" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs ">Request Callback</a></span><br><br><span><a nohref onClick="notifyProviders(' + childSnapshot.key() + ');" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs ">Send Info</a></span></td></tr>');
            });
    
        });

    });
}

function notifyProviders(providerId){
    console.log(providerId)
    
    
}
function loadProviders(){
    providersRef = firebaseRef.child("serviceprovider");
    providersRef.limit(2).once('value', function(providerSnap){
        providerSnap.forEach(function(childSnapshot){
        var serviceResults = childSnapshot.val();
        
        $('#providerrow').append('<div class="col-sm-6"><div class="profile-blog blog-border"><img class="rounded-x" src="'+serviceResults.img+'" alt=""><div class="name-location"><strong>'+serviceResults.name+'</strong></div><div class="clearfix margin-bottom-20"></div><p>'+serviceResults.description+'</p><hr><ul class="list-inline share-list"><li><a href="'+serviceResults.email+'">website</a></li><li><i class="fa fa-facebook"></i><a href="#">54 Followers</a></li><li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li></ul></div></div>');
              
        });
    });
    
}

function getUserId(){
    
    auth = firebaseRef.getAuth();
}

function getUserId(){
    
    authData = firebaseRef.getAuth();
    
    if (authData) {
        uId = authData.uid;
    } else {
        console.log("User is logged out");
    }
}