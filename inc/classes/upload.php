<?php

class upload{
    private $baseUploadDir =  "../users/";
    private $uploadDir;
    private $uId;
    private $filetoUpload;
    private $targetFile; 
    
    
    function __construct($u, $f){
        $this->uId = $u;
        $this->fileToUpload = $f;
    }
    
    function checkFileType(){
        $fileType = pathinfo($this->fileToUpload['name'],PATHINFO_EXTENSION);
        //check the type

        if(($fileType == "csv" ) || ($fileType == "jpg") || ($fileType == "png")) {
            return true;
        }
        return false;    
    }
    
    function checkFileExists(){
        if (file_exists($this->targetFile)) {
            return false;
        }
        return true;
    }
    
    
    function uploadFile(){
        
        if (!is_dir($this->uploadDir)) {
            if (!mkdir($this->uploadDir, 0777, true)) {
                return false;
            }
        }
        
        if (move_uploaded_file($this->fileToUpload["tmp_name"], $this->targetFile)) {
            return true;
        } else {
            return false;
        }
    }
    
    function getFilePath(){
        return $this->targetFile;
    }
    function setUploadDir($upDir){
        $this->uploadDir = $upDir;
        $this->uploadDir = $this->baseUploadDir.$this->uId.'/'.$this->uploadDir.'/';
        $this->targetFile = $this->uploadDir.basename($this->fileToUpload['name']);
        
    }
}
?>
