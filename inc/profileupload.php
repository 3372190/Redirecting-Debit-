<?php

include ('classes/upload.php');



if(isset($_FILES['fileToUpload']) && isset($_POST['uid'])){
    
    $uId = $_POST['uid'];
    
    $profileUpload = new upload($uId, $_FILES['fileToUpload']);
    $profileUpload->setUploadDir("images");
    //push file to local server after setting required upload settings
    //return correct json data with the url string to be displayed to user and to be put in firebase for future reference.
    
    if($profileUpload->checkFileType() && $profileUpload->checkFileExists()){
        //upload the file
        if($profileUpload->uploadFile()){
            echo json_encode(array("Type" =>"Success", "Message" => $profileUpload->getFilePath()), JSON_PRETTY_PRINT); 
        }else{
          echo json_encode(array("Type" => "Error", "Message" => "File Not Uploaded"),JSON_PRETTY_PRINT); 
        }
        
        
    }else if ($profileUpload->checkFileExists() == false){
        echo json_encode(array("Type" => "Error", "Message" => "File Exists"),JSON_PRETTY_PRINT);
    }else if($profileUpload->checkFileType() == false){
        echo json_encode(array("Type" => "Error", "Message" => "File must be CSV"),JSON_PRETTY_PRINT);
    }
    
    
    
    
    
}else{
    
    
    echo json_encode(array("type" => "Error", "Message" => "File Not Set"),JSON_PRETTY_PRINT);
}




?>