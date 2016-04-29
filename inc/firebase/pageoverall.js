var firebaseRef = new Firebase("https://redirectdebit.firebaseio.com");
var uId;
$(document).ready(function(){
    loadUserServiceProviders();
    
});


function loadUserServiceProviders(){
    
    firebaseRef.child('users').child(uId).child("serviceproviders").once('value', function(userSnap) {
        userSnap.forEach(function(childSnapshot){
            firebaseRef.child('serviceprovider').child(childSnapshot.key()).once('value', function(mediaSnap) {
                var serviceResults = mediaSnap.val();
                var userResults = childSnapshot.val();

                
                 $('#serviceoverall > tbody:last-child').append('<tr><td><img class="rounded-x" src="'+serviceResults.img+'" alt=""></td><td class="td-width"><p>'+serviceResults.description+'</p></td><td><span class="label label-success">'+userResults.notified+'</span></td><td><span><a href="#">'+serviceResults.email+'</a></span><span><a href="#">'+serviceResults.website+'</a></span></td></tr>');
            });
    
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
    
    /*
    spare code
    
    
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
    
    */