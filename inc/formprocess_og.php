<?php




include ('classes/upload.php');
include ('classes/processor.php');
include ('classes/rdaspa.php');

if(isset($_FILES["fileToUpload"]) && isset($_POST["bankNumber"])) {
    
    // grab the users id from the form to put make sure the file is uploaded in the right place
    if(isset($_POST['uid'])){
        $uId = $_POST['uid'];
    }
    
    //create a new fileuploader object and assign what kind of upload this is.
    $fileUploader = new upload($uId, $_FILES["fileToUpload"]);
    $fileUploader->setUploadDir("statements");
    
    //check to make sure its a supported file type and it doesnt already exist
    if($fileUploader->checkFileType() && $fileUploader->checkFileExists()){
        //upload the file
        $fileUploader->uploadFile();
        
        //get the array of providers from the form
        $providers = json_decode($_POST['providerList']);

        //process the uploaded csv according to what bank was selected.
        $processor = new Processor($fileUploader->getFilePath(), $_POST["bankNumber"]);
        
        //get the array of rows from the csv
        if($processor->getServiceList() != null){
            
            //create a new rdaspa object
            $rdaspa = new rdaspa($processor->getServiceList());
            //set the providers to compare the rows to
            $rdaspa->setProviders($providers);
            $rdaspa->compareProvider();
            foreach($rdaspa->getSpList() as $obj){
                echo json_encode(array($obj->getName()),JSON_PRETTY_PRINT);
            }
        
            
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