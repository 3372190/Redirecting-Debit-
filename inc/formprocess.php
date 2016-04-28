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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dylans
        /* $rdaspa = new rdaspa($processor->getServiceList());
            $rdaspa->setProviders($_POST['serviceproviders']);
=======
         $rdaspa = new rdaspa($processor->getServiceList());
		 var_dump($rdaspa->printFound());
        /*  $rdaspa->setProviders($_POST['serviceproviders']);
>>>>>>> integratingAggr
            if($rda->compareProviders()){
            
                foreach($rdaspa->getSpList() as $serviceProvider){
                    echo json_encode(array($serviceProvider->getName()), JSON_PRETTY_PRINT);
                }
            }else{
            
                
            }
<<<<<<< HEAD
        */
=======
>>>>>>> integratingAggr
            
            foreach($processor->getServiceList() as $obj){
                echo json_encode(array($obj->getTitle(), $obj->getDate()),JSON_PRETTY_PRINT);
            }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> integratingAggr
        $rdaspa = new rdaspa($processor->getServiceList());
        */
           /* foreach($rdaspa->printFound() as $obj)
        var_dump($rdaspa->printFound());
			{
				var_dump($rdaspa);
                //echo json_encode(array($obj->getTitle(), $obj->getDate()),JSON_PRETTY_PRINT);
            }*/
>>>>>>> b1904f54ac64004bb760e2c4e9f828efadcf99ec
         //echo json_encode($processor->getServiceList());
            
=======
>>>>>>> dylans
            
            
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