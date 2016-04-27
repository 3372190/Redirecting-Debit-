<?php




include ('classes/upload.php');
include ('classes/processor.php');
include ('classes/rdaspa.php');

if(isset($_FILES["fileToUpload"]) && isset($_POST["bankNumber"])) {
    $uId = "5d78119b-8736-4e8b-8591-da0b0f84761a";
    
    $fileUploader = new upload($uId, $_FILES["fileToUpload"]);
    if($fileUploader->checkFileType() && $fileUploader->checkFileExists()){
        $fileUploader->uploadFile();
        
        
        
        
        $processor = new Processor($fileUploader->getFilePath(), $_POST["bankNumber"]);
        
        if($processor->getServiceList() != null){
        //implement Algorithm here
<<<<<<< HEAD
        /* $rdaspa = new rdaspa($processor->getServiceList());
            $rdaspa->setProviders($_POST['serviceproviders']);
            if($rda->compareProviders()){
            
                foreach($rdaspa->getSpList() as $serviceProvider){
                    echo json_encode(array($serviceProvider->getName()), JSON_PRETTY_PRINT);
                }
            }else{
            
                
            }
        */
            
            foreach($processor->getServiceList() as $obj){
                echo json_encode(array($obj->getTitle(), $obj->getDate()),JSON_PRETTY_PRINT);
            }
=======
        $rdaspa = new rdaspa($processor->getServiceList());
        var_dump($rdaspa->printFound());
           /* foreach($rdaspa->printFound() as $obj)
			{
				var_dump($rdaspa);
                //echo json_encode(array($obj->getTitle(), $obj->getDate()),JSON_PRETTY_PRINT);
            }*/
>>>>>>> b1904f54ac64004bb760e2c4e9f828efadcf99ec
         //echo json_encode($processor->getServiceList());
            
            
        //var_dump(processor->getServiceList());
            
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