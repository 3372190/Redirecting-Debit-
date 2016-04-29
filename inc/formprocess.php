<?php




include ('classes/upload.php');
include ('classes/processor.php');
include ('classes/rdaspa.php');

if(isset($_FILES["fileToUpload"]) && isset($_POST["bankNumber"])) {
    
    //grab users uid to upload file in correstponding directory
    if(isset($_POST['uid'])){
        $uId = $_POST['uid'];
    }
    
    $fileUploader = new upload($uId, $_FILES["fileToUpload"]);
    if($fileUploader->checkFileType() && $fileUploader->checkFileExists()){
        $fileUploader->uploadFile();
        
        
        $providers = $_POST['providerList'];
        
        var_dump($providers);
        
        
        $processor = new Processor($fileUploader->getFilePath(), $_POST["bankNumber"]);
        
        if($processor->getServiceList() != null){
            //implement Algorithm here

            $rdaspa = new rdaspa($processor->getServiceList());
            //$rdaspa->setProviders($_POST['serviceproviders']);

            var_dump($rdaspa->getFoundList());

            /*foreach($rdaspa->getFoundList() as $obj){
                echo json_encode(array($obj->getTitle(), $obj->getDate()),JSON_PRETTY_PRINT);
            }*/
        
            
        }else{
           echo json_encode(array("Type" => "Error", "Message" => "File is empty" ),JSON_PRETTY_PRINT);
        }
        
    }else if ($fileUploader->checkFileExists() == false){
        echo json_encode(array("Type" => "Error", "Message" => "File Exists"),JSON_PRETTY_PRINT);
    }else if($fileUploader->checkFileType() == false){
        echo json_encode(array("Type" => "Error", "Message" => "File must be CSV"),JSON_PRETTY_PRINT);
    }
}else{
    echo json_encode(array("type" => "Error", "Message" => "Form Not processed"),JSON_PRETTY_PRINT);
}

?>