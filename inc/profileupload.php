<?php

include ('classes/upload.php');



if(isset($_FILES['fileToUpload'])){
    
    //push file to local server after setting required upload settings
    //return correct json data with the url string to be displayed to user and to be put in firebase for future reference.
    
    
    
    
    
    
}else{
    
    
    echo json_encode(array("type" => "Error", "Message" => "File Not Set"),JSON_PRETTY_PRINT);
}




?>