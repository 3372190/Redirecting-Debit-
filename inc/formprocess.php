<?php




include ('classes/upload.php');
include ('classes/processor.php');
include ('classes/rdaspa.php');


if(isset($_POST["fileToUpload"]) && isset($_POST["bankNumber"])) {
    
    
    $fileUploader = new upload($uId, $_FILES["fileToUpload"]);
    if($fileUploader->checkFileType()){
        $fileUploader->uploadFile();
        
        
        
        
        $processor = new Processor($fileUploader->getFilePath(), $_POST["bankNumber"]);
        
        
        if($processor->getServiceList() != null){
        //implement Algorithm here
        // $rdaspa = new rdaspa($processor->getServiceList());
        json_encode($processor->getServiceList());
            
            
        //var_dump(processor->getServiceList());
            
        }else{
            json_encode(array("Type" => "Error", "Message" => "File is empty" ));
        }
        
    }else{
        return json_encode(array("Type" => "Error", "Message" => "File must be CSV"));
    }
}else{
    return json_encode(array("type" => "Error", "Message" => "Form Not processed"));
}

?>